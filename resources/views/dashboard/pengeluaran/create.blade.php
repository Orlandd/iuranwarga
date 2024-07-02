@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container px-3 mb-6">
        <h3 class="text-4xl font-bold mb-4 text-center ">Tambah Pengeluaran</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


    <section class="container mx-auto px-3">
        <form action="/dashboard/pengeluarans/" class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 m-3" method="post"
            enctype="multipart/form-data">
            @csrf
            <label for="nama">Jenis Pengeluaran</label><br>
            @error('nama')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="nama" id="nama"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="nominal">Nominal Biaya</label><br>
            @error('nominal')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="number" name="nominal" id="nominal" min="0" value="0"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="deskripsi">Deskripsi</label><br>
            @error('deskripsi')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="deskripsi" id="deskripsi"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="tanggal">Tanggal</label><br>
            @error('tanggal')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="date" name="tanggal" id="tanggal"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>


            <label for="lingkungan_id">Kegiatan</label><br>
            @error('lingkungan_id')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <select id="lingkungan_id" name="lingkungan_id"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach ($lingkungans as $lingkungan)
                    <option selected="{{ $lingkungan->nama }}" value="{{ $lingkungan->id }}">{{ $lingkungan->nama }}
                    </option>
                @endforeach

            </select><br>

            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>

        </form>
    </section>
@endsection
