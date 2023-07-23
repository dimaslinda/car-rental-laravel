@extends('layoutadmin.main')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="grid grid-cols-3 gap-4 mb-4">
            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Data Mobil</h5>
                    <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $jmlmobil }}</p>
                </div>
            </a>

          
            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Transaksi</h5>
                    <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $jmltran }}</p>
                </div>
            </a>


            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Customer</h5>
                    <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $user }}</p>
                </div>
            </a>
        </div>
    </div>
 </div>
@endsection