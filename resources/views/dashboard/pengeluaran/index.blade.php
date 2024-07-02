@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container">
        <h3 class="text-3xl font-bold m-6">List Pengeluaran Kegiatan</h3>
    </section>

    @if (session('status'))
        <section class="container mx-auto">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container my-4">
        <a href="/dashboard/pengeluarans/create" class="px-4 py-2 bg-sky-500 rounded-full text-white">Tambah Pengeluaran</a>
        <a href="/dashboard/pengeluaran/export/pdf" class="px-4 py-2 bg-red-500 rounded-full text-white"> Export PDF</a>
        <a href="/dashboard/pengeluaran/export/excel" class="px-4 py-2 bg-green-500 rounded-full text-white"> Export Excel</a>
    </section>

    {{-- Chart --}}
    <section class="container mx-auto my-4 flex justify-center">
        <div class="w-full max-w-9xl">
            <canvas id="pengeluaranChart" style="height: 400px;"></canvas>
        </div>
    </section>

    {{-- Tabel --}}
    <section class="container mx-auto px-3 my-4 flex justify-center">
        <div class="w-full max-w-6xl overflow-x-auto rounded-lg">
            <table id="pengeluaranTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Jenis Pengeluaran
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Nominal
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Tanggal Pengeluaran
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Kegiatan
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Tanggal Kegiatan
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            RT
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($pengeluarans as $pengeluaran)
                        <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                {{ $pengeluaran->nama }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                {{ $pengeluaran->nominal }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                {{ $pengeluaran->deskripsi }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                {{ $pengeluaran->tanggal }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                {{ $pengeluaran->lingkungans->nama }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                {{ $pengeluaran->lingkungans->tanggal }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                {{ $pengeluaran->lingkungans->rts->nama }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                <a href="/dashboard/pengeluarans/{{ $pengeluaran->id }}/edit"
                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400">Update</a>

                                <form action="/dashboard/pengeluarans/{{ $pengeluaran->id }}" method="post" class="inline-flex">
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
    </section>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('pengeluaranChart').getContext('2d');
            const chartData = @json($chartData);
            const labels = chartData.map(data => data.nama || 'n/a');
            const totals = chartData.map(data => data.total);

            const maxTotal = Math.max(...totals);
            const maxY = Math.ceil(maxTotal / 1000000) * 1000000 + 1000000;

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Pengeluaran',
                        data: totals,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMin: 0,
                            suggestedMax: maxY,
                            ticks: {
                                callback: function(value, index, values) {
                                    return value.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    maintainAspectRatio: false
                }
            });
        });
    </script>
@endsection
