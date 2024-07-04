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
        <a href="/dashboard/pengeluarans/create" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-blue-600 text-white py-2 px-4 hover:bg-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:bg-blue-500 dark:hover:bg-blue-400">Tambah Pengeluaran</a>
        <a href="/dashboard/pengeluaran/export/pdf" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-red-500 text-white py-2 px-4 hover:bg-red-800 disabled:opacity-50 disabled:pointer-events-none dark:bg-red-500 dark:hover:bg-red-400"> Export PDF</a>
        <a href="/dashboard/pengeluaran/export/excel" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-green-500 text-white py-2 px-4 hover:bg-green-800 disabled:opacity-50 disabled:pointer-events-none dark:bg-green-500 dark:hover:bg-green-400"> Export Excel</a>
        <label for="selectRt" class="mr-2">Pilih RT:</label>
        <select id="selectRt" class="px-4 py-2 border rounded-full">
            <option value="all">Semua RT</option>
            @foreach ($rts as $rt)
                <option value="{{ $rt->id }}">{{ $rt->nama }}</option>
            @endforeach
        </select>
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
                <tbody id="pengeluaranTableBody" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($pengeluarans as $pengeluaran)
                        <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700" data-rt="{{ $pengeluaran->lingkungans->rts->id }}">
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
                                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400">Delete</button>
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
            const initialChartData = @json($chartData);
            const labels = initialChartData.map(data => data.nama || 'n/a');
            const totals = initialChartData.map(data => data.total);

            const maxTotal = Math.max(...totals);
            const maxY = Math.ceil(maxTotal / 1000000) * 1000000 + 1000000;

            const pengeluaranChart = new Chart(ctx, {
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

            document.getElementById('selectRt').addEventListener('change', function () {
                const selectedRt = this.value;
                const filteredData = selectedRt === 'all'
                    ? initialChartData
                    : initialChartData.filter(data => data.rt_id == selectedRt);

                pengeluaranChart.data.labels = filteredData.map(data => data.nama || 'n/a');
                pengeluaranChart.data.datasets[0].data = filteredData.map(data => data.total);

                const newMaxTotal = Math.max(...pengeluaranChart.data.datasets[0].data);
                const newMaxY = Math.ceil(newMaxTotal / 1000000) * 1000000 + 1000000;

                pengeluaranChart.options.scales.y.suggestedMax = newMaxY;

                pengeluaranChart.update();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectRt = document.getElementById('selectRt');
            const tableBody = document.getElementById('pengeluaranTableBody');
            const rows = tableBody.getElementsByTagName('tr');

            selectRt.addEventListener('change', function () {
                const selectedRt = this.value;
                for (let i = 0; i < rows.length; i++) {
                    const row = rows[i];
                    const rtId = row.getAttribute('data-rt');
                    if (selectedRt === 'all' || rtId === selectedRt) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
@endsection
