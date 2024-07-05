@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container px-3 mb-6">
        <h3 class="text-4xl font-bold mb-4 text-center ">Update Warga</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <div class="container mx-auto px-6 rounded-xl overflow-hidden">
        <img src="/storage/warga/{{ $warga->image }}" class="rounded-xl w-28 mx-auto" alt="">
    </div>

    <section class="container mx-auto px-3">
        <form action="/dashboard/wargas/{{ $warga->id }}" class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 m-3"
            method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="nama">Nama</label><br>
            @error('nama')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="nama" id="nama" value="{{ $warga->nama }}"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="nik">NIK</label><br>
            @error('nik')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="nik" id="nik" value="{{ $warga->nik }}"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="kk">No KK</label><br>
            @error('kk')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="kk" id="kk" value="{{ $warga->kk }}"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="gender">Gender</label><br>
            <span class="text-rose-500 font-medium">*Lakukan pengecekan</span>
            @error('gender')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <select id="gender" name="gender"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="Perempuan" {{ $warga->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                <option value="Laki Laki" {{ $warga->gender == 'Laki Laki' ? 'selected' : '' }}>Laki Laki</option>
            </select><br>

            <label for="agama">Agama</label><br>
            <span class="text-rose-500 font-medium">*Lakukan pengecekan</span>
            @error('agama')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <select id="agama" name="agama"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="Islam" {{ $warga->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Protestan" {{ $warga->agama == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                <option value="Katolik" {{ $warga->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Hindu" {{ $warga->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Budha" {{ $warga->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                <option value="Konghucu" {{ $warga->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                <option value="Lainnya" {{ $warga->agama == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select><br>

            <label for="tempatLahir">Tempat Lahir</label><br>
            @error('tempatLahir')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="tempatLahir" id="tempatLahir" value="{{ $warga->tempatLahir }}"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="tanggalLahir">Tanggal Lahir</label><br>
            @error('tanggalLahir')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="date" name="tanggalLahir" id="tanggalLahir" value="{{ $warga->tanggalLahir }}"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"><br>

            <label for="rukun_tetangga_id">RT</label><br>
            <span class="text-rose-500 font-medium">*Lakukan pengecekan</span>
            @error('rukun_tetangga_id')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <select id="rukun_tetangga_id" name="rukun_tetangga_id"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach ($rts as $rt)
                    <option value="{{ $rt->id }}" {{ $warga->rukun_tetangga_id == $rt->id ? 'selected' : '' }}>
                        {{ $rt->nama }}</option>
                @endforeach
            </select><br>

            <label for="image">Foto</label><br>
            @error('image')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="file" name="image" id="image"
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <br>

            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>
        </form>
    </section>
@endsection
