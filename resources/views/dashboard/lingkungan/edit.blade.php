@extends('dashboard.layouts.main')

@section('container')
    <section class="container px-3 mb-6">
        <h3 class="text-4xl font-bold mb-4 text-center">Edit Kegiatan</h3>
    </section>

    @if (session('status'))
        <section class="container">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container mx-auto px-3">
        <form action="{{ route('lingkungans.update', $lingkungan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="nama">Nama Kegiatan</label><br>
            @error('nama')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="nama" id="nama" value="{{ old('nama', $lingkungan->nama) }}" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="tanggal">Tanggal Kegiatan</label><br>
            @error('tanggal')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $lingkungan->tanggal) }}" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="rukun_tetangga_id">RT</label><br>
            @error('rukun_tetangga_id')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <select id="rukun_tetangga_id" name="rukun_tetangga_id" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach ($rts as $rt)
                    <option value="{{ $rt->id }}" {{ $lingkungan->rukun_tetangga_id == $rt->id ? 'selected' : '' }}>{{ $rt->nama }}</option>
                @endforeach
            </select>
            <br>

            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Update</button>
        </form>
    </section>
@endsection
