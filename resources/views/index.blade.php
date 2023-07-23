@extends('layout.main')
  
@section('content')
<div class="my-10"></div>
<div class="container mx-auto">
    
    <div class="grid grid-cols-3 gap-5">
        @foreach ($data as $d)      
        <div class="w-full max-w-sm border rounded-lg shadow bg-gray-800 border-gray-700">
                <img class="p-8 rounded-t-lg" src="{{ asset('storage/mobil').'/'.$d->gambar }}" alt="product image" />
            <div class="px-5 pb-5">
                    <h5 class="text-xl font-semibold tracking-tight text-white">{{ $d->merk }}</h5>
                <div class="flex flex-col items-start mt-2.5 mb-5">
                    <div class="flex">
                        <div>
                            @if ($d->ac == '0')
                            <span class="bg-green-500 text-white mt-2 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">AC</span>  
                            @else
                            <span class="bg-red-500 text-white mt-2 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                AC
                            </span>  
                            @endif
                        </div>
                        <div>
                            @if ($d->sopir == '0')
                            <span class="bg-green-500 text-white mt-2 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Sopir</span>  
                            @else
                            <span class="bg-red-500 text-white mt-2 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                Sopir
                            </span>  
                            @endif
                        </div>
                    </div>
                    <div class="mt-5">
                        @if ($d->status == '1')
                            <span class="text-green-500">Tersedia</span>
                        @else
                            <span class="text-red-500">Tidak Tersedia</span>      
                        @endif
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xl font-bold text-orange-400">Rp. {{ number_format($d->harga,0,',','.') }},- / hari</span>
                    @if ($d->status == '1')  
                    <a href="/booking/{{ $d->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Booking</a>
                    @else    
                    <a href="#" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tidak Tersedia</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection