@extends('layoutadmin.main')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="container">
            <div class="text-xl font-bold mb-5">
                Edit Data Tipe
            </div>
        </div>

        
        <form action="/tipeupdate/{{ $data->id }}" method="post" enctype="multipart/form-data">   
            @csrf
            <div>
                    <div class="mb-6">
                    <label for="kode_tipe" class="block mb-2 text-sm font-medium text-gray-900">Kode Tipe</label>
                    <input type="text" id="kode_tipe" name="kode_tipe" value="{{ old('kode_tipe', $data->kode_tipe) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ex : SDN, MNV" required>
                    </div>
                    <div class="mb-6">
                        <label for="name_tipe" class="block mb-2 text-sm font-medium text-gray-900">Nama Tipe</label>
                        <input type="text" id="name_tipe" name="name_tipe" value="{{ old('name_tipe', $data->name_tipe) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ex : Sedan, MiniVan" required>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </div>
          </form>
  
    </div>
</div>
@endsection