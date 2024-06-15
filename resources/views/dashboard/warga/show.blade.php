@extends('dashboard.layouts.main')

@section('container')
    <section class="flex flex-col min-h-screen">
        <div class="container mx-auto mt-8 px-4">
            <h4 class="text-2xl font-semibold text-black mb-6 text-left">Profile Warga</h4>
        </div>
        <div class="container mx-auto mt-8 px-4">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/4 flex flex-col justify-center rounded-2xl">
                    <img src="/storage/warga/{{ $warga->image }}" class="rounded-2xl">
                </div>
                <div class="md:w-1/2 flex flex-col justify-between ml-6 mt-4 md:mt-0">
                    <table class="table-fixed">
                        <tbody>
                            <tr>
                                <td class="font-semibold">Nama</td>
                                <td>{{ $warga->nama }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">NIK</td>
                                <td>{{ $warga->nik }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">KK</td>
                                <td>{{ $warga->kk }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Jenis Kelamin</td>
                                <td>{{ $warga->gender }}</td>

                            </tr>
                            <tr>
                                <td class="font-semibold">Agama</td>
                                <td>{{ $warga->agama }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Tempat Lahir</td>
                                <td>{{ $warga->tempatLahir }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Tanggal Lahir</td>
                                <td>{{ $warga->tanggalLahir }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">RT</td>
                                <td>{{ $warga->rts->nama }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
