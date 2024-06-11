@extends('dashboard.layouts.main')

@section('container')
    <section class="flex flex-col min-h-screen">
        <div class="container mx-auto mt-8 px-4">
            <h4 class="text-2xl font-semibold text-black mb-6 text-left">Ketua RT</h4>
        </div>
        <div class="container mx-auto mt-8 px-4">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/4 flex flex-col justify-center rounded-2xl">
                    <img src="/storage/warga/{{ $rt->warga->image }}" class="rounded-2xl">
                </div>
                <div class="md:w-1/2 flex flex-col justify-between ml-6 mt-4 md:mt-0">
                    <table class="table-fixed">
                        <tbody>
                            <tr>
                                <td class="font-semibold">NIK</td>
                                <td>{{ $rt->warga->nik }}</td>

                            </tr>
                            <tr>
                                <td class="font-semibold">Nama</td>
                                <td>{{ $rt->warga->nama }}</td>

                            </tr>
                            <tr>
                                <td class="font-semibold">Jenis Kelamin</td>
                                <td>{{ $rt->warga->gender }}</td>

                            </tr>
                            <tr>
                                <td class="font-semibold">Agama</td>
                                <td>{{ $rt->warga->agama }}</td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <br>
        <hr class="mt-8 border-gray-300">
        <div class="container mx-auto mt-8 px-4">
            <div class="flex flex-col">
                <h4 class="text-xl font-semibold text-black mb-6 text-left">Pengeluaran</h4>
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y  divide-gray-200 dark:divide-neutral-700 ">
                                <thead class="bg-sky-800">
                                    <tr class="">
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-white uppercase dark:text-neutral-500">
                                            Nama</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-white uppercase dark:text-neutral-500">
                                            Nominal</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-white uppercase dark:text-neutral-500">
                                            Deskripsi</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-white uppercase dark:text-neutral-500">
                                            Tanggal</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-white uppercase dark:text-neutral-500">
                                            Kegiatan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-white uppercase dark:text-neutral-500">
                                            Tanggal Kegiatan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-white uppercase dark:text-neutral-500">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach ($pengeluarans as $pengeluaran)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                {{ $pengeluaran->nama }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $pengeluaran->nominal }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $pengeluaran->deskripsi }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $pengeluaran->tanggal }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $pengeluaran->lingkungans->nama }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $pengeluaran->lingkungans->tanggal }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a href="/dashboard/pengeluarans/{{ $pengeluaran->id }}"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-green-800 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:hover:text-green-400">Detail</a>
                                                <a href="/dashboard/pengeluarans/{{ $pengeluaran->id }}/edit"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400">Update</a>

                                                <form action="/dashboard/pengeluarans/{{ $pengeluaran->id }}"
                                                    method="post" class="inline-flex">
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
        </div>

    </section>
@endsection
