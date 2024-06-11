@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container px-3 mb-6">
        <h3 class="text-4xl font-bold mb-4 text-center ">Tambah RT</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


    <section class="container mx-auto ">
        <form action="/dashboard/rukun-tetanggas/" class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 m-3"
            method="post" enctype="multipart/form-data">
            @csrf
            <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
            @error('nama')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="nama" id="nama"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>
            {{-- 
            <label for="ketua">Ketua RT</label><br>
            @error('ketua')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="ketua" id="ketua"
                class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br> --}}



            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>

        </form>
    </section>
@endsection
