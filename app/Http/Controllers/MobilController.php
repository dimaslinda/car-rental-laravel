<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Http\Requests\StoreMobilRequest;
use App\Http\Requests\UpdateMobilRequest;
use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobil = Mobil::with('tipes')->get();
        return view('mobil.index', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Tipe::with('mobils')->get();

        return view('mobil.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $namagambar = $request->file('gambar')->getClientOriginalName();
        Storage::putFileAs('/mobil', $request->file('gambar'), $namagambar);
        $data['gambar'] = $namagambar;
        
        Mobil::create($data);

        return redirect()->route('mobil');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Mobil::find($id);

        return view('mobil.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Mobil::find($id);

        return view('mobil.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Mobil::find($id);
        $input = $request->all();

        if($request->has('gambar')) {
            $namafilelama = $data->gambar;
            $file = Storage::exists('mobil/'.$namafilelama);

            if(!empty($file)) {
                $path = public_path() . '/storage/mobil/';
                $path_file_delete = $path . $namafilelama;

                unlink($path_file_delete);

                $namabaru = $request->file('gambar')->getClientOriginalName();
                $input['gambar'] = Storage::putFileAs('/mobil', $request->file('gambar'), $namabaru);
            }
        } else {
            $namabaru = $data->gambar;
        }
        $dataupdate = [
            'id_tipe' => $input['id_tipe'],
            'merk' => $input['merk'],
            'noplat' => $input['noplat'],
            'warna' => $input['warna'],
            'tahun' => $input['tahun'],
            'status' => $input['status'],
            'harga' => $input['harga'],
            'denda' => $input['denda'],
            'ac' => $input['ac'],
            'sopir' => $input['sopir'],
            'gambar' => $namabaru,
        ];
        Mobil::where('id', $id)->update($dataupdate);
        return Redirect::back()->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Mobil::find($id);
            $namafile = $data->gambar;
            $path = public_path() . '/storage/mobil/';

        $file_old = $path . $namafile;
        unlink($file_old);
        $data->Delete();
        return Redirect::back()->with('success', 'Data Berhasil di hapus');
    }
}
