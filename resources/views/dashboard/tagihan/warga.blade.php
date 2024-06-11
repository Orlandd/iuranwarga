@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container ">
        <h3 class="text-3xl font-bold m-6">List Tagihan {{ $tagihans[0]->wargas->nama }}</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


    <section class="container px-3">

        <form id="filterForm" class="flex gap-7">
            <div class="form-group">
                <input type="number" class="w-30 px-6 py-2 border-blue-400 border-2 rounded-lg ml-5" id="id"
                    name="id" value="{{ $tagihans[0]->wargas->id }}" hidden required>
            </div>
            <div class="form-group">
                <label for="bulan">Bulan:</label>
                <select class="w-30 px-6 py-2 border-blue-400 border-2 rounded-lg ml-5" id="bulan" name="bulan"
                    required>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <select class="w-30 px-6 py-2 border-blue-400 border-2 rounded-lg ml-5" id="tahun" name="tahun"
                    required>
                    @for ($i = date('Y'); $i >= 2000; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div><br>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="w-30 px-6 py-2 border-blue-400 border-2 rounded-lg ml-5" id="status" name="status"
                    required>

                    <option value="Sudah">Sudah</option>
                    <option value="Belum">Belum</option>

                </select>
            </div>
        </form>

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
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700" id="result">
                                @foreach ($tagihans as $tagihan)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">

                                            <a href="/dashboard/tagihans/warga/{{ $tagihan->wargas->id }}">
                                                {{ $tagihan->wargas->nama }}</a>

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
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a href="/dashboard/tagihans/approve/{{ $tagihan->id }}"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-green-800 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:hover:text-green-400">Setujui</a>
                                            <a href="/dashboard/tagihans/{{ $tagihan->id }}/edit"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400">Update</a>

                                            <form action="/dashboard/tagihans/{{ $tagihan->id }}" method="post"
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
            $('#filterForm').on('click', function(e) {
                e.preventDefault();

                var id = $('#id').val();
                var bulan = $('#bulan').val();
                var tahun = $('#tahun').val();
                var status = $('#status').val();

                $.ajax({
                    url: "/dashboard/tagihan/warga/{{ $tagihans[0]->wargas->id }}",
                    method: 'POST',
                    data: {

                        id: id,
                        bulan: bulan,
                        tahun: tahun,
                        status: status
                    },
                    success: function(response) {
                        $('#result').empty();
                        if (response.length > 0) {
                            console.log(response);
                            $.each(response, function(index, tagihan) {
                                $('#result').append(
                                    `
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">

                                            <a href="/dashboard/tagihans/warga/${tagihan.wargas.id}">
                                                ${tagihan.wargas.nama} </a>

                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${tagihan.status} 
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${tagihan.nominal} 
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${tagihan.deskripsi} 
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${tagihan.tanggalBayar} 
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            ${tagihan.wargas.rts.nama}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a href="/dashboard/tagihans/approve/${tagihan.id}"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-green-800 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:hover:text-green-400">Setujui</a>
                                            <a href="/dashboard/tagihans/${tagihan.id}/edit"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400">Update</a>

                                            <form action="/dashboard/tagihans/${tagihan.id} " method="post"
                                                class="inline-flex">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Are you sure delete ?')"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    `
                                );
                            });
                        } else {
                            $('#result').append( /*HTML*/ `
                                <div class="text-3xl text-center mt-5 mx-auto">
                                    Data Tidak Ditemukan!
                                </div>
                            `);
                        }
                    }
                });
            });
        });
    </script>
@endsection
