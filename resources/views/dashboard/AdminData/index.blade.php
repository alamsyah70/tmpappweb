@extends('...layouts.main')

@section('container')

<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
    @can('admin')
    <a href="{{ route('export.pdf') }}?search={{ request('search') }}&tanggal_pembuatan={{ request('tanggal_pembuatan') }}&driverDropdown={{ request('driverDropdown') }}&unitDropdown={{ request('unitDropdown') }}&tujuan_penggunaan={{ request('tujuan_penggunaan') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Eksport Data
        </span>
    </a>        
    @endcan
    {{-- <form action="/admin-data">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Nama, lv - 1001, 2023-09-19..." value="{{ request('search') }}">
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form> --}}    
    <form method="GET" action="/admin-data" class="mb-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="mb-4">
                <label for="tanggal_pembuatan" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pembuatan:</label>
                <input type="text" name="tanggal_pembuatan" id="tanggal_pembuatan" class="w-full px-3 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2023-09-19" value="{{ request('tanggal_pembuatan') }}">
            </div>
    
            <div class="mb-4">
                <label for="driverDropdown" class="block text-gray-700 text-sm font-bold mb-2">Driver Dropdown:</label>
                <input type="text" name="driverDropdown" id="driverDropdown" class="w-full px-3 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" value="{{ request('driverDropdown') }}">
            </div>
    
            <div class="mb-4">
                <label for="unitDropdown" class="block text-gray-700 text-sm font-bold mb-2">Unit Dropdown:</label>
                <input type="text" name="unitDropdown" id="unitDropdown" class="w-full px-3 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="LV - 1001" value="{{ request('unitDropdown') }}">
            </div>
    
            <div class="mb-4">
                <label for="tujuan_penggunaan" class="block text-gray-700 text-sm font-bold mb-2">Tujuan Penggunaan:</label>
                <input type="text" name="tujuan_penggunaan" id="tujuan_penggunaan" class="w-full px-3 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Antar Jemput..." value="{{ request('tujuan_penggunaan') }}">
            </div>
    
            <div class="mb-4">
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </div>
    </form>
    
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Driver
                </th>
                <th scope="col" class="px-6 py-3">
                    Nomor Unit
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Waktu Keluar
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Waktu Masuk
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Kilometer Keluar
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Kilometer Masuk
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Waktu Tempuh
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Kilometer Tempuh
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Tujuan/Keperluan
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($penggunaan_units->count())
            @foreach ($penggunaan_units as $penggunaan_unit)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                {{-- ... Bagian lain dari baris tabel ... --}}
                {{-- 1 --}}
                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>
                {{-- 2 --}}
                <td class="px-6 py-4">
                    {{ $penggunaan_unit->tanggal_pembuatan }}
                </td>
                {{-- 2 --}}
                <td class="px-6 py-4">
                    {{ $penggunaan_unit->driverDropdown }}
                </td>
                {{-- 3 --}}
                <td class="px-6 py-4">
                    {{ $penggunaan_unit->unitDropdown }}
                </td>
                {{-- 4 --}}
                <td class="px-6 py-4">
                    {{ $penggunaan_unit->jam_first }}
                </td>
                {{-- 5 --}}
                {{-- 6 --}}
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{ $penggunaan_unit->jam_last }}
                </td>
                {{-- 7 --}}
                <td class="px-6 py-4">
                    {{ $penggunaan_unit->km_first }}
                </td>
                {{-- 8 --}}
                <td class="px-6 py-4">
                    {{ $penggunaan_unit->km_last }}
                </td>
                {{-- 9 --}}
                {{-- Lama Waktu Perjalanan --}}
                <td class="px-6 py-4">
                    {{ Carbon\Carbon::parse($penggunaan_unit->jam_first)->diffInHours(Carbon\Carbon::parse($penggunaan_unit->jam_last)) }} jam
                </td>
                {{-- Kilometer Ditempuh --}}
                <td class="px-6 py-4">
                    {{ $penggunaan_unit->km_last - $penggunaan_unit->km_first }} km
                </td>
                <td class="px-6 py-4">
                    {{ $penggunaan_unit->tujuan_penggunaan }}
                </td>
                {{-- Tombol Delete --}}
                <td class="px-6 py-4">
                    <form action="/admin-management/delete-penggunaan-unit/{{ $penggunaan_unit->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <tr>
        <td colspan="12" class="text-center">Tidak ada data yang ditemukan.</td>
    </tr>
    @endif
</div>
</div>
@endsection