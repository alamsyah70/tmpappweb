@extends('layouts.mainL')

@section('container')
    <section>
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 relative z-10">
        
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <div class="flex items-center justify-center mb-4 text-lg font-semibold text-gray-900 dark:text-white bg-white rounded-full p-2 sm:p-3">
                <img class="w-12 sm:w-16 mr-2" src="{{ asset('images/tmp.png') }}" alt="logo">
                Trasindo Murni Perkasa    
            </div>              
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Buat Akun
                </h1>

                @if(session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                  <span class="block sm:inline">{{ session('success') }}</span>
                  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a.5.5 0 0 1 0 .707L10.05 10l4.293 4.293a.5.5 0 0 1-.708.708L9.343 10 5.05 14.293a.5.5 0 0 1-.708-.708L8.637 10 4.05 5.707a.5.5 0 0 1 0-.707L8.637 5 12.95 9.293a.5.5 0 0 1 .708 0z"/></svg>
                  </span>
                </div>
                @endif

                @if(session()->has('loginError'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                  <span class="block sm:inline">{{ session('loginError') }}</span>
                  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a.5.5 0 0 1 0 .707L10.05 10l4.293 4.293a.5.5 0 0 1-.708.708L9.343 10 5.05 14.293a.5.5 0 0 1-.708-.708L8.637 10 4.05 5.707a.5.5 0 0 1 0-.707L8.637 5 12.95 9.293a.5.5 0 0 1 .708 0z"/></svg>
                  </span>
                </div>
                @endif

                <form class="space-y-4 md:space-y-6" action="/register" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="name" name="name" id="name" class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" required="">
                        @error('name')
                   <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                    </div>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama User</label>
                        <input type="username" name="username" id="username" class="@error('username') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required="">
                        @error('username')
                   <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        @error('email')
                   <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="@error('password') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        @error('password')
                   <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                        </div>
                    </div>
                    <button type="submit" class="w-full text-black bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                </form>
            </div>
        </div>
    </div>
  </section>
  @endsection