@extends('...layouts.main')

@section('container')
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
<div>
    <p class="text-2xl font-semibold text-gray-900 dark:text-white pb-4">Form Tambah Driver</p>
</div>
<div class="bg-gray-100 p-8 rounded-lg">
    <form method="POST" action="/admin-management/create-nama-driver" enctype="multipart/form-data">
<div class="grid gap-6 mb-6 md:grid-cols-2">
    @csrf
    @if(session()->has('success'))
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 col-lg-6" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.293 5.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.293a1 1 0 111.414-1.414L10 8.586l4.293-4.293a1 1 0 011.414 0z"/></svg>
    </span>
  </div>
@endif
    <div>
        <label for="nama_driver" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Driver :</label>
        <input type="teks" id="nama_driver" name="nama_driver" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name" required value="{{ old('nama_driver') }}">
        @error('nama_driver')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK :</label>
        <input type="teks" id="nik" name="nik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="TMP - " required value="{{ old('nik') }}">
        @error('nik')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</div>
</form>
</div>
</div>
@endsection 