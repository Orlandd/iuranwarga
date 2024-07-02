@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container px-3 mb-6">
        <h3 class="text-4xl font-bold mb-4 text-center ">Update Tagihan</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


    <section class="container mx-auto px-3">
        <form action="/dashboard/tagihans/{{ $tagihan->id }}" class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 m-3"
            method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <label for="warga_id">Warga</label><br>
            @error('warga_id')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="warga_id" id="warga_id" disabled value="{{ $warga->nama }}"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="jenis">Jenis Tagihan</label><br>
            @error('jenis')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <select id="jenis" name="jenis"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                <option selected="Iuran Bulanan" value="Iuran Bulanan">Iuran Bulanan</option>
                <option selected="Biaya Listrik" value="Biaya Listrik">Biaya Listrik</option>
                <option selected="Biaya Air" value="Biaya Air">Biaya Air</option>
                <option selected="Iuran Sampah" value="Iuran Sampah">Iuran Sampah</option>
                <option selected="Iuran Keamanan" value="Iuran Keamanan">Iuran Keamanan</option>
                <option selected="Lain-lain" value="Lain-lain">Lain-lain</option>
            </select><br>

            <label for="nominal">Nominal</label><br>
            @error('nominal')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="nominal" id="nominal" value="{{ $tagihan->nominal }}"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="deskripsi">Deskripsi</label><br>
            @error('deskripsi')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="deskripsi" id="deskripsi" value="{{ $tagihan->deskripsi }}"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>


            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>

        </form>
    </section>
@endsection
