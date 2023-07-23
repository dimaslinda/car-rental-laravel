@extends('layout.main')
@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
@endsection
@section('content')
    <div class="my-10"></div>
    <div class="container mx-auto min-h-[100vh]">
        
        <div>
            <div class="p-5 text-xl font-semibold">Booking Mobil</div>
            <div class="relative overflow-x-auto">
                
                <form action="/bookingaksi/{{ $data->id }}" method="post">
                    @csrf
                    <div class="mb-6">
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga Sewa / Hari</label>
                    <input type="text" id="harga" name="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $data->harga }}" readonly required>
                    </div>

                    <div class="mb-6">
                        <label for="denda" class="block mb-2 text-sm font-medium text-gray-900">Denda / Hari</label>
                        <input type="text" id="denda" name="denda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $data->denda }}" readonly required>
                    </div>

                    

                    <div date-rangepicker class="flex items-center mb-5">
                        <div class="relative">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                              </svg>
                          </div>
                          <input name="tgl_rental" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  " placeholder="Tanggal Rental">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                              </svg>
                          </div>
                          <input name="tgl_kembali" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Tanggal Kembali">
                        </div>
                    </div>
                      
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Booking</button>
                </form>
  
            </div>
        </div>

    </div>
@endsection