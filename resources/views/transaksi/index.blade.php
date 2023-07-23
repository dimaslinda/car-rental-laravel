@extends('layoutadmin.main')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="container">
            <div class="text-xl font-bold mb-5">
                Data Transaksi
            </div>
        </div>
        
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Customer
                </th>
                <th scope="col" class="px-6 py-3">
                    Mobil
                </th>
                <th scope="col" class="px-6 py-3">
                    Tgl. Rental
                </th>
                <th scope="col" class="px-6 py-3">
                    Tgl. Kembali
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga / Hari
                </th>
                <th scope="col" class="px-6 py-3">
                    Denda / Hari
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Denda
                </th>
                <th scope="col" class="px-6 py-3">
                    Tgl. Dikembalikan
                </th>
                <th scope="col" class="px-6 py-3">
                    Status Pengembalian
                </th>
                <th scope="col" class="px-6 py-3">
                    Status Rental
                </th>
                <th scope="col" class="px-6 py-3">
                    Cek Pembayaran
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Pembayaran
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $m)          
            <tr class="bg-gray-800 border-gray-700">
                <td class="px-6 py-4">
                    {{ $m->users->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $m->mobils->merk }}
                </td>
                <td class="px-6 py-4">
                    {{ $m->tgl_rental }}
                </td>
                <td class="px-6 py-4">
                    {{ $m->tgl_kembali }}
                </td>
                <td class="px-6 py-4">
                   Rp. {{ number_format($m->harga , 0, ',','.') }},-
                </td>
                <td class="px-6 py-4">
                    Rp. {{ number_format($m->denda , 0, ',','.') }},-
                </td>
                <td class="px-6 py-4">
                    Rp. {{ number_format($m->total_denda , 0, ',','.') }},-
                </td>
                <td class="px-6 py-4">
                    @if ($m->tgl_pengembalian == NULL)
                        -
                    @else
                        {{ date('d/m/Y', strtotime($m->tgl_pengembalian)) }}
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{ $m->status_pengembalian }}
                </td>
                <td class="px-6 py-4">
                    {{ $m->status_rental }}
                </td>
                <td class="px-6 py-4">
                    @if ($m->status_pembayaran == '0')
                        @if (empty($m->bukti_pembayaran))
                        <div class="bg-red-500 rounded-lg text-center text-white px-1 py-2">
                            belum upload bukti
                        </div>    
                        @else
                        <a href="/transkonfirmasi/{{ $m->id }}">
                            <div class="bg-yellow-500 rounded text-center text-white px-6 py-2">
                               Cek Pembayaran
                            </div>
                        </a>
                        @endif
                    @elseif ($m->status_pembayaran == '1')
                    <div class="bg-green-500 rounded-lg text-center text-white px-1 py-2">
                        sudah dikonfirmasi
                    </div>
                    @elseif ($m->status_pembayaran == '3')
                    <div class="bg-green-500 rounded-lg text-center text-white px-1 py-2">
                        Transaksi Close
                    </div>
                    @endif
                </td>
                <td class="px-6 py-4">
                    Rp. {{ number_format($m->harga + $m->total_denda , 0, ',','.') }},-
                </td>
                <td class="px-6 py-4">
                    @if ($m->status_pembayaran == '1')
                        <div class="flex">
                            <a href="/transdone/{{ $m->id }}" class="bg-green-500 mr-4 px-4 py-2 rounded-lg"><svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                              </svg></a>
                              <form action="/transbatal/{{ $m->id }}" method="post">
                                @csrf
                                @method('post')
                                <button onclick="return confirm('Yakin Batal?')" type="submit" class="bg-red-500 px-4 py-2 rounded-lg"><svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                  </svg></button>
                            </form>
                              
                        </div>
                    @else
                    -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    </div>
</div>
@endsection