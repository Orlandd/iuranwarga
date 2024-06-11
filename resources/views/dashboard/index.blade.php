@extends('dashboard.layouts.main')

@section('container')
    <div class="container px-4 mx-auto mt-3">
        <h1 class="text-2xl font-medium">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>

    <section class="flex flex-col min-h-screen">
        <div class="container mx-auto mt-8 px-4">
            <h4 class="text-2xl font-semibold text-black mb-6 text-left">Dashboard</h4>
            <div class="flex justify-between gap-8">
                <!-- Left Column -->
                <div
                    class="bg-white shadow rounded-2xl p-6 w-full md:w-1/2 border-2 border-sky-800 hover:bg-gray-100 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-sky-800">Daftar RT</div>
                    </div>
                    <div class="text-center mt-4">
                        @foreach ($rts as $rt)
                            @if (isset($rt->warga->nama))
                                <span class="text-gray-600 font-medium">{{ $rt->nama }} |
                                    {{ $rt->warga->nama }}</span><br>
                            @else
                                <span class="text-gray-600 font-medium">{{ $rt->nama }} |
                                    Lakukan Update Data</span><br>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- Right Column -->
                <div
                    class="bg-white shadow rounded-2xl p-6 w-full md:w-1/2 border-2 border-sky-800 hover:bg-gray-100 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-sky-800">Lingkungan</div>
                    </div>
                    <div class="text-center mt-4">
                        @foreach ($lingkungans as $lingkungan)
                            <span class="text-gray-600 font-medium">{{ $lingkungan->nama }} |
                                {{ $lingkungan->rts->nama }}</span><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <hr class="mt-8">
        <div class="container mx-auto px-4 mt-8" id="data">
            <h4 class="text-2xl font-semibold text-black mb-6 text-left">Data</h4>
            <select id="rt"
                class="py-3 px-4 pe-9 block lg:w-1/2 w-full border-2 border-yellow-500 rounded-full text-sm bg-white dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                @foreach ($rts as $rt)
                    <option value="{{ $rt->id }}">{{ $rt->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="container mx-auto mt-8 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
                <div class="flex flex-col justify-center items-center border-2 border-yellow-500 p-4 rounded-2xl shadow-lg">
                    <h2 class="text-yellow-500 text-lg font-semibold mb-4">Pengeluaran</h2>
                    <div class="w-full h-64 bg-white" id="grafik-pengeluaran">
                        <canvas id="pengeluaran"></canvas>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center border-2 border-yellow-500 p-4 rounded-2xl shadow-lg">
                    <h2 class="text-yellow-500 text-lg font-semibold mb-4">Pemasukan</h2>
                    <div class="w-full h-64 bg-white">
                        <canvas id="pemasukan"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function() {
                let pengeluaranChart;
                let pemasukanChart;

                function fetchAndRenderCharts(rt) {
                    $.ajax({
                        url: "/dashboard",
                        method: 'POST',
                        data: {
                            rt: rt
                        },
                        success: function(response) {
                            if (pengeluaranChart) {
                                pengeluaranChart.destroy();
                            }



                            if (response.length > 0) {
                                let labels = [];
                                let data = [];

                                response.forEach(kegiatan => {
                                    labels.push(kegiatan.nama);
                                    data.push(kegiatan.total_pengeluaran);
                                });

                                const ctx = document.getElementById('pengeluaran').getContext('2d');
                                pengeluaranChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Total Pengeluaran',
                                            data: data,
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            } else {
                                const ctx = document.getElementById('pengeluaran').getContext('2d');
                                pengeluaranChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [],
                                        datasets: [{
                                            label: 'Total Pengeluaran',
                                            data: [],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            }
                        }
                    });

                    $.ajax({
                        url: "/dashboard/pemasukan",
                        method: 'POST',
                        data: {
                            rt: rt
                        },
                        success: function(response) {
                            if (pemasukanChart) {
                                pemasukanChart.destroy();
                            }

                            if (response.length > 0) {
                                let labels = [];
                                let data = [];

                                response.forEach(pemasukan => {
                                    labels.push(pemasukan.month);
                                    data.push(pemasukan.total_nominal);
                                });

                                const ctx = document.getElementById('pemasukan').getContext('2d');
                                pemasukanChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Total Pemasukan',
                                            data: data,
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            } else {
                                const ctx = document.getElementById('pemasukan').getContext('2d');
                                pemasukanChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [],
                                        datasets: [{
                                            label: 'Total Pemasukan',
                                            data: [],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            }
                        }
                    });
                }

                var rt = $('#rt').val();
                fetchAndRenderCharts(rt);

                $('#rt').change(function() {
                    rt = $(this).val();
                    fetchAndRenderCharts(rt);
                });
            });
        </script>
    </section>
@endsection
