@extends('...layouts.main')

@section('container')

<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">    
    <a href="/standar-operasional-prosedur/create" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Post
        </span>
      </a>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($s_o_p_s as $sop)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                {{-- ... Bagian lain dari baris tabel ... --}}
                {{-- 1 --}}
                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>
                {{-- 2 --}}
                <td class="px-6 py-4">
                    {{ $sop->image }}
                </td>
                {{-- 2 --}}
                <td class="px-6 py-4">
                    {{ $sop->description }}
                </td>
                {{-- Tombol Delete --}}
                <td class="px-6 py-4">
                    <form action="/standar-operasional-prosedur/{{ $sop->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection