@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container ">
        <h3 class="text-3xl font-bold m-6">Daftar Admin</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container mx-6 my-4">
        <a href="/dashboard/users/create" class="px-4 py-2 bg-sky-500 rounded-full text-white">Tambah Admin</a>
    </section>

    <section class="container px-3">
        <div class=" flex flex-col w-full ">
            <div class="m-1.5 overflow-x-auto">
                <div class="p-1.5  inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class=" divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-stalingkungan text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Nama</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-stalingkungan text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Email</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $user->name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <form action="/dashboard/users/{{ $user->id }}" method="post"
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
@endsection
