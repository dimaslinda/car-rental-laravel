@extends('layoutadmin.main')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="container">
            <div class="text-xl font-bold mb-5">
                Konfirmasi Pembayaran
            </div>
        </div>
        
<div class="relative overflow-x-auto">
    
    <div class="block w-1/2 p-6 border  rounded-lg shadow bg-gray-800 border-gray-700 hover:bg-gray-700">
        <h5 class="mb-5 text-2xl font-bold tracking-tight text-white">Konfirmasi Pembayaran</h5>
        <form action="/transterbuktibayar/{{ $data->id }}" method="post" class="flex flex-col gap-5">
            @csrf
            <div class="flex gap-5">
                <a href="/transdownloadbukti/{{ $data->id }}" class="bg-green-500 px-5 py-2 text-white rounded-lg">Download Bukti Pembayaran</a>
                <div class="flex items-center mb-4">
                    <input id="default-checkbox" type="checkbox" value="1" name="status_pembayaran" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Konfirmasi Pembayaran</label>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
        </form>
    </div>
</div>

    </div>
</div>
@endsection