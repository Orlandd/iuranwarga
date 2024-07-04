@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container ">
        <h3 class="text-3xl font-bold m-6">List RT</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container mx-6 my-4">
        <a href="/dashboard/rukun-tetanggas/create" class="px-4 py-2 bg-sky-500 rounded-full text-white">Tambah RT</a>
        <a href="/dashboard/rukun-tetanggas/export/pdf" class="px-4 py-2 bg-red-500 rounded-full text-white"> Export PDF</a>
        <a href="/dashboard/rukun-tetanggas/export/excel" class="px-4 py-2 bg-green-500 rounded-full text-white"> Export Excel</a>
    </section>

    <section class="container px-3 mt-10">
        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
            @foreach ($rts as $rt)
                <div class="border-2 rounded-xl p-3">
                    <p class="text-center text-2xl mb-3">{{ $rt->nama }}</p>
                    <div class="border-2 rounded-xl p-4 text-center">
                        <h4 class="font-medium text-xl">Ketua</h4>
                        <p>

                            @if (isset($rt->warga->nama))
                                {{ $rt->warga->nama }}
                            @else
                                Lakukan update data
                            @endif
                        </p>
                        <div class="mt-5">
                            <a href="/dashboard/rukun-tetanggas/{{ $rt->id }}"
                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-green-800 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:hover:text-green-400">Detail</a>
                            <a href="/dashboard/rukun-tetanggas/{{ $rt->id }}/edit"
                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400">Update</a>

                            <form action="/dashboard/rukun-tetanggas/{{ $rt->id }}" method="post"
                                class="inline-flex">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure delete ?')"
                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- 
    <section class="container px-3">
        <div class=" flex flex-col w-full ">
            <div class="m-1.5 overflow-x-auto">
                <div class="p-1.5  inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class=" divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Nama RT</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Ketua</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($rts as $rt)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $rt->nama }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">

                                            @if (isset($rt->warga->nama))
                                                {{ $rt->warga->nama }}
                                            @else
                                                Lakukan update data
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a href="/dashboard/rukun-tetanggas/{{ $rt->id }}"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-green-800 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:hover:text-green-400">Detail</a>
                                            <a href="/dashboard/rukun-tetanggas/{{ $rt->id }}/edit"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400">Update</a>

                                            <form action="/dashboard/rukun-tetanggas/{{ $rt->id }}" method="post"
                                                class="inline-flex">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Are you sure delete ?')"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
