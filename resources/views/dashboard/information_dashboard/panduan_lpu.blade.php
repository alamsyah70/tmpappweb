@extends('layouts.main')

@section('container')
<div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-md mt-14">
    <h2 class="text-2xl font-semibold mb-4">Panduan Penggunaan Unit</h2>
    <ol class="list-decimal pl-6 text-gray-500 dark:text-gray-300">
        <li class="mb-2">Pilih menu "Penggunaan Unit" pada Dashboard.</li>
        <li class="mb-2">Inputkan data yang sesuai pada halaman "Penggunaan Unit".</li>
        <li class="mb-2">Jika berhasil input data, Anda akan kembali ke halaman Dashboard.</li>
    </ol>
    <a href="/dashboard" class="text-blue-500 hover:text-blue-700 mr-4">Kembali</a>
</div>
@endsection