@extends('layoutadmin.main')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="container">
            <div class="text-xl font-bold mb-5">
                Tambah Data Mobil
            </div>
        </div>

        
<form action="{{ route('mobil.store') }}" method="post" enctype="multipart/form-data">   
    @csrf
    <div class="grid grid-cols-2 gap-5">
        <div>
            <label for="id_tipe" class="block mb-2 text-sm font-medium text-gray-900">Tipe Mobil</label>
            <select id="id_tipe" name="id_tipe" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Tipe Mobil</option>
                @foreach ($data as $d)  
                <option value="{{ $d->id }}">{{ $d->kode_tipe }}</option>
                @endforeach
            </select>
            <div class="mb-6">
            <label for="merk" class="block mb-2 text-sm font-medium text-gray-900">Merk Mobil</label>
            <input type="text" id="merk" name="merk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ex : Avanza" required>
            </div>
            <div class="mb-6">
                <label for="noplat" class="block mb-2 text-sm font-medium text-gray-900">No. Plat</label>
                <input type="text" id="noplat" name="noplat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ex : B 1446 DAG" required>
            </div>
            <div class="mb-6">
                <label for="warna" class="block mb-2 text-sm font-medium text-gray-900">Warna Mobil</label>
                <input type="text" id="warna" name="warna" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ex : Hitam" required>
            </div>
            <label for="ac" class="block mb-2 text-sm font-medium text-gray-900">AC Mobil</label>
            <select id="ac" name="ac" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option selected>Pilih</option>
            <option value="0">Tersedia</option>
            <option value="1">Tidak Tersedia</option>
            </select>
            <label for="sopir" class="block mb-2 text-sm font-medium text-gray-900">Sopir Mobil</label>
            <select id="sopir" name="sopir" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option selected>Pilih</option>
            <option value="0">Tersedia</option>
            <option value="1">Tidak Tersedia</option>
            </select>
        </div>
        <div>
            <div class="mb-6">
                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga Sewa Mobil</label>
                <input type="text" id="harga" name="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required>
            </div>
            <div class="mb-6">
                <label for="denda" class="block mb-2 text-sm font-medium text-gray-900">Denda keterlambatan / hari</label>
                <input type="text" id="denda" name="denda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required>
            </div>
            <div class="mb-6">
                <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tahun</label>
                <input type="text" id="tahun" name="tahun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required>
            </div>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option selected>Pilih Status</option>
            <option value="0">Tersedia</option>
            <option value="1">Tidak Tersedia</option>
            </select>
            <label class="block mb-2 text-sm font-medium text-gray-900" for="gambar">Gambar</label>
            <input name="gambar" class="block w-full mb-5 text-sm py-2 px-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="gambar" type="file">

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </div>
  </form>
  
    </div>
</div>
@endsection