@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container ">
        <h3 class="text-3xl font-bold m-6">List Warga</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container mx-auto my-4">
        <div class="mx-6">
            {{-- <a id="exportLink" href="/dashboard/warga/laporan/export/all"
                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white py-2 px-4 hover:bg-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:bg-blue-500 dark:hover:bg-blue-400">Export PDF</a>
                <a id="exportLink" href="/dashboard/warga/laporan/export/all"
                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white py-2 px-4 hover:bg-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:bg-blue-500 dark:hover:bg-blue-400">Export Excel</a>
            <br><br> --}}
            <a id="exportPDFLink" href="{{ route('export.pdf', ['rt' => 'all']) }}"
                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-500 text-white py-2 px-4 hover:bg-blue-800">Export PDF</a>
             <a id="exportExcelLink" href="{{ route('export.excel', ['rt' => 'all']) }}"
                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white py-2 px-4 hover:bg-green-800">Export Excel</a>

            <select id="rt" name="rt"
                class="w-full py-3 px-4 mb-4 lg:mb-0 lg:mr-4 lg:w-1/4 border-2 border-yellow-500 rounded-full text-sm bg-white dark:bg-gray-800 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option selected="" value="all">Select RT</option>
                @foreach ($rts as $rt)
                    <option value="{{ $rt->id }}">{{ $rt->nama }}</option>
                @endforeach
            </select>
        </div>
    </section>

    <section class="container px-3">
        <div class=" flex flex-col w-full ">
            <div class="m-1.5 overflow-x-auto">
                <div class="p-1.5  inline-block align-middle">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class=" min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Nama</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        NIK</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        No KK</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Gender</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Agama</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Tempat Lahir</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Tanggal Lahir</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        RT</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700"
                                id='result'>
                                @foreach ($wargas as $warga)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $warga->nama }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $warga->nik }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $warga->kk }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $warga->gender }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $warga->agama }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $warga->tempatLahir }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $warga->tanggalLahir }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $warga->rts->nama }}
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

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#rt').change(function() {
                var rt = $(this).val();
                console.log(rt);

                $.ajax({
                    url: "/dashboard/warga/rt",
                    method: 'POST',
                    data: {
                        rt: rt,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#result').empty();
                        if (response.length > 0) {
                            $.each(response, function(index, warga) {
                                $('#result').append(
                                    `
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            ${warga.nama}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.nik}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.kk}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.gender}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.agama}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.tempatLahir}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.tanggalLahir}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.rts.nama}
                                        </td>

                                    </tr>
                                    `
                                );
                            });
                        } else {
                            $('#result').append(
                                `<div class="text-3xl text-center mt-5 mx-auto">Data Tidak Ditemukan!</div>`
                            );
                        }

                        // Update export links
                        $('#exportPDFLink').attr('href', '/dashboard/warga/export/pdf/' + rt);
                        $('#exportExcelLink').attr('href', '/dashboard/warga/export/excel/' + rt);
                    }
                });
            });

            $('#search').on('keyup', function() {
                let query = $(this).val();
                console.log(query);
                if (query.length > 0) {
                    $.ajax({
                        url: `/dashboard/warga/search/${query}`,
                        type: 'GET',
                        success: function(data) {
                            console.log(data); // Log data yang diterima dari server
                            $('#result').empty();

                            let html = '';
                            if (data.length > 0) {
                                $.each(data, function(index, warga) {
                                    $('#result').append(`
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            ${warga.nama}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.nik}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.kk}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.gender}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.agama}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.tempatLahir}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.tanggalLahir}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${warga.rts.nama}
                                        </td>

                                    </tr>
                                    `);
                                });

                            } else {
                                $('#result').append(
                                    /*HTML*/
                                    `<h1 class="text-4xl text-center">Data Not Found</h1>`
                                ); // Pesan jika data kosong
                            }
                        }
                    });
                }
            });


        });
    </script>

    <script>
        document.getElementById('rt').addEventListener('change', function() {
            var selectedValue = this.value;
            var exportLink = document.getElementById('exportLink');
            exportLink.href = '/dashboard/warga/laporan/export/' + selectedValue;
        });
    </script>
@endsection
