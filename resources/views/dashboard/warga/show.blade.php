@extends('dashboard.layouts.main')

@section('container')
    <section class="flex flex-col min-h-screen bg-gray-100">
        <div class="container mx-auto mt-8 px-4">
            <h4 class="text-2xl font-semibold text-black mb-6 text-left">Profile Warga</h4>
        </div>
        <div class="container mx-auto mt-8 px-4">
            <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col md:flex-row">
                <div class="md:w-1/4 flex flex-col justify-center rounded-2xl overflow-hidden">
                    <img src="/storage/warga/{{ $warga->image }}" class="rounded-2xl object-cover w-full h-full">
                </div>
                <div class="md:w-3/4 flex flex-col justify-between ml-6 mt-4 md:mt-0">
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <td class="font-semibold py-2 pr-4 w-40">Nama</td>
                                <td class="py-2">: {{ $warga->nama }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold py-2 pr-4 w-40">NIK</td>
                                <td class="py-2">: {{ $warga->nik }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold py-2 pr-4 w-40">KK</td>
                                <td class="py-2">: {{ $warga->kk }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold py-2 pr-4 w-40">Jenis Kelamin</td>
                                <td class="py-2">: {{ $warga->gender }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold py-2 pr-4 w-40">Agama</td>
                                <td class="py-2">: {{ $warga->agama }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold py-2 pr-4 w-40">Tempat Lahir</td>
                                <td class="py-2">: {{ $warga->tempatLahir }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold py-2 pr-4 w-40">Tanggal Lahir</td>
                                <td class="py-2">: {{ $warga->tanggalLahir }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold py-2 pr-4 w-40">RT</td>
                                <td class="py-2">: {{ $warga->rts->nama }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
