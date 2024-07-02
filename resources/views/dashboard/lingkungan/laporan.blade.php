@extends('dashboard.layouts.main')

@section('container')
    <section class="container ">
        <h3 class="text-3xl font-bold m-6 text-center">Laporan Kegiatan</h3>
    </section>

    <section class="container mx-6 my-4">
        <a href="/dashboard/lingkungan/laporan/export/pdf" class="px-4 py-2 bg-red-500 rounded-full text-white"> Export PDF</a>
        <a href="/dashboard/lingkungan/laporan/export/excel" class="px-4 py-2 bg-green-500 rounded-full text-white"> Export Excel</a>
    </section>

    <section class="container px-3 ">
        <div class="flex flex-col w-full">
            <div class="m-1.5 overflow-x-auto">
                <div class="p-1.5 inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Nama Kegiatan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Tanggal Kegiatan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        RT</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($lingkungans as $lingkungan)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $lingkungan->nama }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $lingkungan->tanggal }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $lingkungan->rts->nama }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
