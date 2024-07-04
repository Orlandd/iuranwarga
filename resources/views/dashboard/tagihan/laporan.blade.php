@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container ">
        <h3 class="text-3xl font-bold m-6 text-center">Laporan Pembayaran Warga</h3>
    </section>

    {{-- <section class="container mx-6 my-4">

        <a href="/dashboard/tagihan/laporan/exportpdf" class="px-4 py-2 bg-sky-500 rounded-full text-white"> Export PDF</a>
    </section>
    <section class="container mx-6 my-4">

        <a href="/dashboard/tagihan/laporan/exportexcel" class="px-4 py-2 bg-sky-500 rounded-full text-white"> Export Excel</a>
    </section> --}}
    <section class="container mx-6 my-4 flex">
        <a href="/dashboard/tagihan/laporan/exportpdf" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-red-500 text-white py-2 px-4 hover:bg-red-800 disabled:opacity-50 disabled:pointer-events-none dark:bg-red-500 dark:hover:bg-red-400">Export PDF</a>
        <a href="/dashboard/tagihan/laporan/exportexcel" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-green-500 text-white py-2 px-4 hover:bg-green-800 disabled:opacity-50 disabled:pointer-events-none dark:bg-green-500 dark:hover:bg-green-400">Export Excel</a>
    </section>


    <section class="container px-3 ">
        <div class=" flex flex-col w-full ">
            <div class="m-1.5 overflow-x-auto">
                <div class="p-1.5  inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class=" divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-stalingkungan text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Nama Warga</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Nominal</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Deskripsi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Tanggal Bayar</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        RT</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($tagihans as $tagihan)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $tagihan->wargas->nama }}

                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $tagihan->status }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $tagihan->nominal }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $tagihan->deskripsi }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $tagihan->tanggalBayar }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $tagihan->wargas->rts->nama }}
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
