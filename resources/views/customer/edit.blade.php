@extends('layoutadmin.main')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="container">
            <div class="text-xl font-bold mb-5">
                Edit Data Mobil
            </div>
        </div>

        
<form action="/customerupdate/{{ $data->id }}" method="post" enctype="multipart/form-data">   
    @csrf
    <div class="grid grid-cols-2 gap-5">
        <div>
            <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ex : Avanza" value="{{ old('name', $data->name) }}" required>
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $data->email) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ex : B 1446 DAG" required>
            </div>
            <div class="mb-6">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $data->alamat) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ex : Hitam" required>
            </div>
            <div class="mb-6">
                <label for="tlp" class="block mb-2 text-sm font-medium text-gray-900">No. TLP / Whatsapp</label>
                <input type="text" id="tlp" name="tlp" value="{{ old('tlp', $data->tlp) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ex : Hitam" required>
            </div>
        </div>
        <div>
            <div class="mb-6">
                <label for="nosim" class="block mb-2 text-sm font-medium text-gray-900">No. SIM</label>
                <input type="text" id="nosim" name="nosim" value="{{ old('nosim', $data->nosim) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="text" id="password" name="password" value="{{ old('password', $data->password) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </div>
  </form>
  
    </div>
</div>
@endsection