@extends('layoutadmin.main')
@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
@endsection
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="container">
            <div class="text-xl font-bold mb-5">
                Tanggal Pengembalian
            </div>
        </div>
        
<div class="relative overflow-x-auto">
    
    <div class="block w-1/2 p-6 border  rounded-lg shadow bg-gray-800 border-gray-700 hover:bg-gray-700">
        <h5 class="mb-5 text-2xl font-bold tracking-tight text-white">Tanggal Pengembalian</h5>
        <form action="/transfinal/{{ $data->id }}" method="post" class="flex flex-col gap-5">
            @csrf
            <input type="hidden" name="tgl_kembali" value="{{ $data->tgl_kembali }}">
            <input type="hidden" name="denda" value="{{ $data->denda }}">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
                </div>
                <input datepicker name="tgl_pengembalian" value="{{ $data->tgl_pengembalian }}" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
            </div>
  
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
        </form>
    </div>
</div>

    </div>
</div>
@endsection