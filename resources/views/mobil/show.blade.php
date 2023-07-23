@extends('layoutadmin.main')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="container">
            <div class="text-xl font-bold mb-5">
                Detail Data Mobil
            </div>
        </div>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex justify-around">
                <div class="p-4">
                    <img src="{{ asset('storage/mobil'). '/'. $data->gambar }}" class="w-full" alt="">
                </div>
                <div>
                    <div>
                        Tipe Mobil
                    </div>
                    <div>
                        Merk Mobil
                    </div>
                    <div>
                        No. Plat
                    </div>
                    <div>
                        Warna
                    </div>
                    <div>
                        Tahun
                    </div>
                    <div>
                        Harga
                    </div>
                    <div>
                        Denda
                    </div>
                    <div class="mb-4">
                        status
                    </div>
                    <div class="mb-4">
                        AC
                    </div>
                    <div>
                        Supir
                    </div>
                </div>
                <div>
                    <div>
                        {{ $data->tipes->name_tipe }}
                    </div>
                    <div>
                        {{ $data->merk }}
                    </div>
                    <div>
                        {{ $data->noplat }}
                    </div>
                    <div>
                        {{ $data->warna }}
                    </div>
                    <div>
                        {{ $data->tahun }}
                    </div>
                    <div>
                        Rp. {{ number_format($data->harga,0, ',', '.') }},-
                    </div>
                    <div>
                        Rp. {{ number_format($data->denda,0, ',', '.') }},-
                    </div>
                    <div>
                        @if ($data->status == 0)
                        <div class="bg-red-500 text-center rounded-lg px-5 py-1 mb-2">
                            Tidak Tersedia
                        </div>
                        @else
                        <div class="bg-green-500 text-center rounded-lg px-5 py-1 mb-2">
                            Tersedia
                        </div>
                        @endif
                    </div>
                    <div>
                        @if ($data->ac == 0)
                           <div class="bg-red-500 text-center rounded-lg px-5 py-1 mb-2">
                            Tidak Tersedia
                           </div>
                        @else
                        <div class="bg-green-500 text-center rounded-lg px-5 py-1 mb-2">
                            Tersedia
                        </div>
                        @endif
                    </div>
                    <div>
                        @if ($data->sopir == 0)
                        <div class="bg-red-500 text-center rounded-lg px-5 py-1 mb-2">
                            Tidak Tersedia
                        </div>
                        @else
                        <div class="bg-green-500 text-center rounded-lg px-5 py-1 mb-2">
                            Tersedia
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="text-center my-10">
                <a href="/mobil" class="bg-yellow-400 text-white px-5 py-2 rounded-lg mr-5">Kembali</a>
                <a href="/mobiledit/{{ $data->id }}" class="bg-green-500 text-white px-5 py-2 rounded-lg">Update</a>
            </div>

        </div>
    </div>
</div>
@endsection