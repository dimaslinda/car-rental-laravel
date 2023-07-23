<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Mobil;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Transaksi::all();
        return view('transaksi.index', compact('data'));
    }

    public function transkonfirmasi($id)
    {
        $data = Transaksi::find($id);

        return view('transaksi.buktipembayaran', compact('data'));
    }

    public function transdownloadbukti($id)
    {
        $data = Transaksi::find($id);

        $file = public_path() . '/storage/buktipembayaran/' . $data['bukti_pembayaran'];

        return response()->download($file);

    }

    public function transterbuktibayar(Request $request, $id)
    {
        $data = Transaksi::find($id);
        $id_mobil = $data->id_mobil;
        $input = $request->all();

        $dataupdate = [
            'status_pembayaran' => $input['status_pembayaran']
        ];
        $dataupdate2 = [
            'status' => '0'
        ];

        Transaksi::where('id', $id)->update($dataupdate);
        Mobil::where('id', $id_mobil)->update($dataupdate2);

        return redirect()->route('trans');

    }
    
    public function transbatal($id)
    {
        $data = Transaksi::find($id);

        $id_mobil = $data->id_mobil;

        $updatemobil = [
            'status' => '1'
        ];

        Mobil::where('id', $id_mobil)->update($updatemobil);
        $data->delete();

        return redirect()->route('trans');
    }

    public function transdone($id)
    {
        $data = Transaksi::find($id);
        return view('transaksi.transaksidone', compact('data'));
    }

    public function transfinal(Request $request, $id)
    {
        $data = Transaksi::find($id);
        $input = $request->all();

        $id_mobil = $data->id_mobil;

        $tglpengembalian = strtotime($input['tgl_pengembalian']);
        $tglkembali = strtotime($input['tgl_kembali']);
        $selisih = abs($tglpengembalian - $tglkembali)/(60*60*24);
        $total_denda = $selisih * $input['denda'];

        $dataupdatetransaksi = [
            'tgl_pengembalian' => date('d/m/y', strtotime($input['tgl_pengembalian'])),
            'status_rental' => 'Selesai',
            'status_pengembalian' => 'Kembali',
            'status_pembayaran' => 3,
            'total_denda' => $total_denda
        ];

        $dataupdatemobil = [
            'status' => 1
        ];

        Transaksi::where('id', $id)->update($dataupdatetransaksi);
        Mobil::where('id', $id_mobil)->update($dataupdatemobil);

        return redirect()->route('trans');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
