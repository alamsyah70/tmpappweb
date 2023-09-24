@extends('layouts.main')

@section('container')
<div class="mt-14">
    
<div class="grid gap-4">
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    @foreach ($s_o_p_s as $sop)
    <div class="mb-5">
        <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $sop->image) }}" alt="">
    </div>
    @endforeach
</div>
@endsection