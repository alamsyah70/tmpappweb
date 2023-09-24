@extends('...layouts.main')

@section('container')
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
  <form method="POST" action="/dashboard/standar-operasional-prosedur/create" enctype="multipart/form-data">
    @csrf
    {{-- <div class="mb-6">
      <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File PDF</label>
      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
      name="pdf" id="file" type="file" multiple>
    </div> --}}
    <div class="mb-6">
      <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Foto</label>
      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
      name="image" id="file" type="file" multiple>
    </div>
    <div class="mb-6">
      <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
      name="description" id="text" type="text" multiple>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
  </form>
</div>
@endsection