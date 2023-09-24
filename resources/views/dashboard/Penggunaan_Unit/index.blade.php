@extends('...layouts.main')

@section('container')
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
    @if (session()->has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M6.293 6.293a1 1 0 011.414 0L10 10.586l2.293-2.293a1 1 0 111.414 1.414L11.414 12l2.293 2.293a1 1 0 01-1.414 1.414L10 13.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 12 6.293 9.707a1 1 0 010-1.414z"></path></svg>
        </span>
    </div>
    @endif
<div>
    <p class="text-2xl font-semibold text-gray-900 dark:text-white pb-4">Form Penggunaan Unit</p>
</div>
<div class="bg-gray-100 p-8 rounded-lg">
    <form method="POST" action="/dashboard/penggunaan-unit" enctype="multipart/form-data">
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
        <div class="pb-5">
            <label for="tanggal_pembuatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal :</label>
            <input type="date" id="tanggal_pembuatan" name="tanggal_pembuatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="10/07/23" required value="{{ old('tanggal_pembuatan') }}">
            @error('tanggal_pembuatan')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    <label for="driverDropdown" class="block text-gray-700 text-sm font-bold mb-2">Pilih Nama Driver :</label>
    <select id="driverDropdown" name="driverDropdown" class="form-select w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 transition" required>
        <option value="">Pilih Nama Driver</option>
        @foreach ($dataNamaDriver as $nama_driver)
        <option value="{{ $nama_driver->nama_driver }}">{{ $nama_driver->nama_driver }}</option>
        @endforeach
    </select>
        @error('driverDropdown')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
    <label for="unitDropdown" class="block text-gray-700 text-sm font-bold mb-2">Pilih Nomor Unit :</label>
    <select id="unitDropdown" name="unitDropdown" class="form-select w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 transition" required>
        <option value="">Pilih Nomor Unit</option>
        @foreach ($dataNomorUnit as $nomor_unit)
        <option value="{{ $nomor_unit->nomor_unit }}">{{ $nomor_unit->nomor_unit }}</option>
        @endforeach
    </select>
        @error('unitDropdown')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="jam_first" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Mulai :</label>
        <input type="time" id="jam_first" name="jam_first" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12:00" required value="{{ old('jam_first') }}">
        @error('jam_first')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="jam_last" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Akhir :</label>
        <input type="time" id="km_last" name="jam_last" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12:00" required value="{{ old('jam_last') }}">
        @error('jam_last')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="km_first" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kilo Meter Mulai :</label>
        <input type="number" id="km_first" name="km_first" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00000" required value="{{ old('km_first') }}">
        @error('km_first')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="km_last" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kilo Meter Akhir :</label>
        <input type="number" id="km_last" name="km_last" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00000" required value="{{ old('km_last') }}">
        @error('km_last')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="tujuan_penggunaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan Penggunaan :</label>
        <input type="text" id="tujuan_penggunaan" name="tujuan_penggunaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Antar Jemput..." required value="{{ old('tujuan_penggunaan') }}">
        @error('tujuan_penggunaan')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
<div class="flex items-start mb-6">
    <div class="flex items-center h-5">
        <input id="remember" type="checkbox" name="remember" value="1" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saya sudah siap bekerja dan sudah memenuhi <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">SOP</a> yang ada.</label>
        @error('remember')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</div>
</form>
</div>
</div>
@endsection 