@extends('layouts.main')

@section('container')
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
<div id="defaultTabContent">
    <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
        <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Dibuat dan di support team General Affair PT. Trasindo</h2>
        <p class="mb-3 text-gray-500 dark:text-gray-400">
            Website ini dibuat untuk membantu efisiensi pekerjaan admin maupun driver, selain itu dengan adanya website ini dapat mengurangi risiko kehilangan data karena sudah menggunakan teknologi database.
        </p>
        <p class="mb-3 text-gray-500 dark:text-gray-400">
            Adapun fitur-fitur pada website ini adalah :
        </p>
        <ul class="list-disc list-inside mb-3 text-gray-500 dark:text-gray-400">
            <li>Dapat Menginputkan Data Pemakaian Unit.</li>
            <li>Dapat Melihat Jadwal Tugas Driver.</li>
            <li>Dapat Melihat SOP dengan desain menarik dari PT (Program Sedulur).</li>
            <li>Dapat Melihat Riwayat Kondisi Unit.</li>
        </ul>        
    </div>
    <a href="/dashboard" class="text-blue-500 hover:text-blue-700 mr-4">Kembali</a>
</div>
</div>
@endsection