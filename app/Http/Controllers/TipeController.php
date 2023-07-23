<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Http\Requests\StoreTipeRequest;
use App\Http\Requests\UpdateTipeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipe = Tipe::all();
        return view('tipe.index', compact('tipe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Tipe::create($data);

        return redirect()->route('tipe');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipe $tipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Tipe::find($id);
        return view('tipe.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $dataupdate = [
            'kode_tipe' => $data['kode_tipe'],
            'name_tipe' => $data['name_tipe'],
        ];

        Tipe::where('id', $id)->update($dataupdate);

        return redirect()->route('tipe')->with('success', 'berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
      //
    }
}
