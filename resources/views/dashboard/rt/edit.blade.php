@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container px-3 mb-6">
        <h3 class="text-3xl font-bold ">Edit RT</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif




    <section class="container mx-auto px-3">
        <form action="/dashboard/rukun-tetanggas/{{ $rt->id }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="nama">Nama</label><br>
            @error('nama')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="nama" id="nama" class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"
                value="{{ $rt->nama }}"><br>

            {{-- <label for="ketua">Ketua RT</label><br>
            @error('ketua')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <input type="text" name="ketua" id="ketua" class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"
                value="{{ $rt->ketua }}"><br> --}}

            <label for="warga_id">Ketua RT</label><br>
            @error('warga_id')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
            <select id="warga_id" name="warga_id"
                class="w-full py-2 px-3 mb-3 pe-9 block border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                @foreach ($wargas as $warga)
                    <option selected="{{ $warga->nama }}" value="{{ $warga->id }}">{{ $warga->nama }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>

        </form>
    </section>
@endsection
