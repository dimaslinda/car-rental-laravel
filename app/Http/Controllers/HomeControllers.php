<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeControllers extends Controller
{
    public function index() {
        $data = Mobil::all();
        return view('index',compact('data'));
    }

    public function transaksi(){
        $user = Auth()->User()->id;
        $data = Transaksi::with('users', 'mobils')->where('id_customer', '=', $user)->get();
        return view('transaksi', compact('data'));
    }

    public function admin() {
        $customer = User::where('role', '=', 1)->get();
        $transaksi = Transaksi::where('status_pembayaran', '=', '0')->get();
        $mobil = Mobil::all();

        $user = $customer->count();
        $jmltran = $transaksi->count();
        $jmlmobil = $mobil->count();
        return view('dashboard', compact('user', 'jmltran', 'jmlmobil'));
    }

    public function pembayaran($id) {
        $data = Transaksi::find($id);
        return view('pembayaran', compact('data'));
    }

    public function pembayaranaksi(Request $request, $id)
    {
        $input = $request->all();
        $namabaru = $request->file('bukti_pembayaran')->getClientOriginalName();
        $input['bukti_pembayaran'] = Storage::putFileAs('/buktipembayaran', $request->file('bukti_pembayaran'), $namabaru);

        $dataupdate = [
            'bukti_pembayaran' => $namabaru
        ];
        
        Transaksi::where('id', $id)->update($dataupdate);

        return redirect()->route('transaksi');
    }

    public function booking($id)
    {
        $data = Mobil::find($id);
        return view('booking', compact('data'));
    }

    public function bookingaksi(Request $request, $id)
    {
        $data = Mobil::find($id);
        $input = $request->all();
        // dd($input);

        $datatransaksi = [
            'id_customer' => Auth()->User()->id,
            'id_mobil' => $data->id,
            'tgl_rental' => date('y/m/d', strtotime($input['tgl_rental'])),
            'tgl_kembali' => date('y/m/d', strtotime($input['tgl_kembali'])),
            'denda' => $input['denda'],
            'harga' => $input['harga'],
            'status_rental' => 'Belum Selesai',
            'status_pengembalian' => 'Belum Kembali',
            'status_pembayaran' => 0,
            'total_denda' => '0'
        ];

        Transaksi::create($datatransaksi);
        $datamobil = [
            'status' => '0'
        ];

        Mobil::where('id', $id)->update($datamobil);

        return redirect()->route('transaksi');
    }
}
