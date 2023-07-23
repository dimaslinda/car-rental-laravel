@extends('layout.main')
@section('content')
    <div class="my-10"></div>
    <div class="container mx-auto min-h-[100vh]">
        
        <div class="flex flex-row justify-around gap-5">
            <div class="w-1/2">
                <div class="p-5 text-xl font-semibold text-center">Invoice Pembayaran Anda</div>
                        
                    <div class="relative overflow-x-auto">
                        
                        <div class="block p-6 w-full border rounded-lg shadow bg-gray-800 border-gray-700 hover:bg-gray-700 text-white">
                            <div class="flex flex-row justify-around">
                                <div>
                                    <div class="mb-5">Merk Mobil</div>
                                    <div class="mb-5">Tanggal Rental</div>
                                    <div class="mb-5">Tanggal Kembali</div>
                                    <div class="mb-5">Biaya Sewa Perhari</div>
                                    <div class="mb-5">Jumlah Hari Sewa</div>
                                    <div class="mb-5">Jumlah Pembayaran</div>
                                </div>
                                <div>
                                    <div class="mb-5">:</div>
                                    <div class="mb-5">:</div>
                                    <div class="mb-5">:</div>
                                    <div class="mb-5">:</div>
                                    <div class="mb-5">:</div>
                                    <div class="mb-5">:</div>
                                </div>
                                <div>
                                    <div class="mb-5">{{ $data->mobils->merk }}</div>
                                    <div class="mb-5">{{ date('d/m/Y', strtotime($data->tgl_rental)) }}</div>
                                    <div class="mb-5">{{ date('d/m/Y', strtotime($data->tgl_kembali)) }}</div>
                                    <div class="mb-5">Rp. {{ number_format($data->harga, 0,',','.') }},-</div>
                                    @php
                                        $tglkembali = strtotime($data->tgl_kembali);
                                        $tglrental = strtotime($data->tgl_rental);
                                        $jmlhari = abs(($tglkembali - $tglrental)/(60*60*24));
                                    @endphp
                                    <div class="mb-5">{{ $jmlhari }} Hari</div>
                                    <div class="mb-5">Rp. {{ number_format($data->harga * $jmlhari, 0,',','.') }},-</div>
                                    <a href="/customer/cetakinvoice/{{ $data->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        Print
                                    </a>
                                </div>
                            </div>
                        </div>

                        
                    </div>
            </div>

            <div class="w-1/2">
                <div class="p-5 text-xl font-semibold text-center">Informasi Pembayaran</div>
                        
                    <div class="relative overflow-x-auto">
                        <div class="block p-6 w-full border rounded-lg shadow bg-gray-800 border-gray-700 hover:bg-gray-700 text-white">
                                <div class=>
                                    <div class="mb-5">Silakan Melakukan pembayaran melalui nomor rekening dibawah ini :</div>
                                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                                    <div class="mb-5 mt-2">Bank Mandiri 1212423344</div>
                                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                                    <div class="mb-5 mt-2">Bank BCA 645623534</div>
                                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                                    <div class="mb-5 mt-2">Bank BNI 56435645</div>
                                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                                    @if (empty($data->bukti_pembayaran))
                                        
                                        
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="mt-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                            Upload Bukti Pembayaran
                                        </button>
                                        
                                        <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-6 text-center">
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Upload Bukti Pembayaran</h3>
                                                        <form action="/customer/pembayaranaksi/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input name="bukti_pembayaran" class="block w-full mb-2 text-sm border rounded-lg cursor-pointer  text-gray-400 focus:outline-none bg-gray-700 border-gray-600placeholder-gray-400" id="file_input" type="file" required>
                                                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
  
  
                                    @elseif ($data->status_pembayaran == '0')
                                    <button type="button" class="focus:outline-none mt-2 text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:ring-yellow-900">
                                        Menunggu Konfirmasi
                                    </button>
                                    @elseif ($data->status_pembayaran == '1')
                                    <button type="button" class="focus:outline-none mt-2 text-white bg-green-400 hover:bg-green-500 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:ring-yellow-900">Pembayaran dikonfirmasi</button>
                                    @endif
                                </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>
@endsection