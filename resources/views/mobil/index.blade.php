@extends('layoutadmin.main')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="container">
            <div class="text-xl font-bold mb-5">
                Data Mobil
            </div>
            <a href="{{ route('mobil.create') }}">
                <div class="mb-5 bg-green-500 w-52 text-center text-white px-5 py-3 rounded-lg">
                    Tambah Data Mobil
                </div>
            </a>
        </div>
        
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipe
                </th>
                <th scope="col" class="px-6 py-3">
                    Merk Mobil
                </th>
                <th scope="col" class="px-6 py-3">
                    No. PLat
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mobil as $m)          
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   <img src="{{ asset('storage/mobil'). '/'. $m->gambar }}" class="w-[70px]" alt="">
                </th>
                <td class="px-6 py-4">
                    {{ $m->tipes->kode_tipe }}
                </td>
                <td class="px-6 py-4">
                    {{ $m->merk }}
                </td>
                <td class="px-6 py-4">
                    {{ $m->noplat }}
                </td>
                <td class="px-6 py-4">
                    @if ($m->status == 0)
                    <div class="bg-red-500 px-5 py-2 rounded-full text-center text-white font-bold 2xl:w-1/2">
                        Tidak Tersedia
                    </div>
                    @else    
                    <div class="bg-green-500 px-5 py-2 rounded-full text-center text-white font-bold 2xl:w-1/2">
                        Tersedia
                    </div>
                    @endif    
                </td>
                <td class="px-6 py-10 flex gap-2">
                    <a href="/mobiledit/{{ $m->id }}" class="bg-yellow-500 text-white px-2 py-2 rounded font-bold">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                          </svg>
                    </a>
                    <form action="/mobildelete/{{ $m->id }}" method="POST">
                        @csrf
                        @method('post')
                        <button onclick="return confirm('Yakin hapus?')" type="submit" class="bg-red-500 text-white px-2 py-2 rounded font-bold">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
                          </svg>
                        </button>
                    </form>
                    
                    <a href="/mobilshow/{{ $m->id }}" class="bg-green-500 text-white px-2 py-2 rounded font-bold">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                              <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                              <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                            </g>
                          </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    </div>
</div>
@endsection