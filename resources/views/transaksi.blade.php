@extends('layout.main')
@section('content')
    <div class="my-10"></div>
    <div class="container mx-auto min-h-[100vh]">
        
        <div>
            <div class="p-5 text-xl font-semibold">Data Transaksi</div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Customer
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Merk Mobil
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No. Plat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga Sewa
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Batal
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $d->users->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $d->mobils->merk }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $d->mobils->noplat }}
                            </td>
                            <td class="px-6 py-4">
                                Rp. {{ number_format($d->harga , 0, ',','.') }},-
                            </td>
                            <td class="px-6 py-4">
                                @if ($d->status_rental == 'Selesai')
                                    <div class="bg-red-500 text-white text-center px-5 py-2 rounded-lg">Rental Selesai</div>
                                @else
                                <a href="/customer/pembayaran/{{ $d->id }}" class="bg-green-500 px-5 py-2 text-white rounded-lg text-center">Cek Pembayaran</a>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex flex-col gap-2">
                                @if ($d->status_rental == 'Belum Selesai')    
                                <a onclick="return confirm('Yakin Batal?')" href="/customer/batal/{{ $d->id }}" class="bg-red-500 px-5 py-2 text-white rounded-lg text-center">batal</a>
                                @else
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-red-500 px-5 py-2 text-white rounded-lg text-center" type="button">
                                    Batal
                                  </button>
                                  
                                  <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                      <div class="relative w-full max-w-md max-h-full">
                                          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                  </svg>
                                                  <span class="sr-only">Close modal</span>
                                              </button>
                                              <div class="p-6 text-center">
                                                  <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                  </svg>
                                                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                                                  <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                      Yes, I'm sure
                                                  </button>
                                                  <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
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