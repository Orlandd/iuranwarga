@extends('layouts.main')

@section('container')
    {{-- Hero --}}
    <section id="hero">
        <div class="container my-4 mx-auto">
            <div class="flex flex-wrap-reverse px-4 md:flex-wrap">
                <div class="w-full self-center pt-3 md:w-1/2 ">
                    <h1 class="text-3xl">Do you want to get a Dorm</h1>
                    <h4>Let's search your near location</h4>
                    <div class="search flex w-full mt-1 md:w-80 lg:w-96">
                        <input type="text"
                            class="px-3 rounded-full border-2 w-full border-rose-600 focus:shadow-lg focus:border-slate-600"
                            name="" id="" placeholder="search location ...">
                        <button class="py-2 px-4 bg-red-600 rounded-full ms-3">Search</button>
                    </div>
                </div>
                <div class="w-full self-end h-56 bg-slate-300 md:w-1/2 ">

                </div>
            </div>
        </div>
    </section>
    {{-- Hero --}}

    {{-- facility --}}
    <section class="">
        <div class="my-4  bg-[#FFBF69]">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-3xl text-center mb-4">Facility</h1>

                <div class="flex gap-2 justify-center flex-wrap">
                    <div class="flex flex-col w-40 shadow-sm rounded-xl  ">
                        <img class="w-full h-auto rounded-xl shadow-md"
                            src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                            alt="Image Description">
                        <div class="p-4 md:p-5">
                            <h3 class="text-lg font-bold text-center text-gray-800 dark:text-white">
                                Card title
                            </h3>

                        </div>
                    </div>

                    <div class="flex flex-col w-40 shadow-sm rounded-xl  ">
                        <img class="w-full h-auto rounded-xl shadow-md"
                            src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                            alt="Image Description">
                        <div class="p-4 md:p-5">
                            <h3 class="text-lg font-bold text-center text-gray-800 dark:text-white">
                                Card title
                            </h3>

                        </div>
                    </div>

                    <div class="flex flex-col w-40 shadow-sm rounded-xl  ">
                        <img class="w-full h-auto rounded-xl shadow-md"
                            src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                            alt="Image Description">
                        <div class="p-4 md:p-5">
                            <h3 class="text-lg font-bold text-center text-gray-800 dark:text-white">
                                Card title
                            </h3>

                        </div>
                    </div>

                    <div class="flex flex-col w-40 shadow-sm rounded-xl  ">
                        <img class="w-full h-auto rounded-xl shadow-md"
                            src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                            alt="Image Description">
                        <div class="p-4 md:p-5">
                            <h3 class="text-lg font-bold text-center text-gray-800 dark:text-white">
                                Card title
                            </h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Fasility --}}

    {{-- room --}}

    <section class="container mx-auto py-6">
        <div class="px-4">
            <h1 class="text-3xl mb-4">Room</h1>
            <div class=" relative grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-7 lg:gap-2">
                <a
                    class="w-full shadow-xl border-1 border-stone-700 h-64 rounded-xl overflow-hidden scale-100 hover:scale-105 transition-all ease-in-out max-w-48">
                    <div class="bg-slate-500 w-full h-28 "></div>
                    <div class="mx-3 mt-2 ">
                        <div class=" w-full">

                        </div>

                        <div class="w-full ">
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="absolute bottom-2">1000/bulan</div>
                    </div>
                </a>

                <a
                    class="w-full shadow-xl border-1 border-stone-700 h-64 rounded-xl overflow-hidden scale-100 hover:scale-105 transition-all ease-in-out max-w-48">
                    <div class="bg-slate-500 w-full h-28 "></div>
                    <div class="mx-3 mt-2 ">
                        <div class=" w-full">

                        </div>

                        <div class="w-full ">
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="absolute bottom-2">1000/bulan</div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- room --}}

    {{-- Location --}}

    <section class="container mx-auto py-6">
        <div class="px-4">
            <h1 class="text-3xl mb-4">Location</h1>
            <div class="flex gap-3 justify-center flex-wrap">
                <a class=" relative flex flex-col w-40 shadow-sm rounded-xl md:w-52 lg:w-64">
                    <img class="w-full h-auto rounded-xl shadow-md"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                        alt="Image Description">
                    <div class=" absolute inset-0 flex items-center justify-center">
                        <h3 class="text-lg font-bold text-center text-gray-800 dark:text-white">
                            Card title
                        </h3>

                    </div>
                </a>

                <a class=" relative flex flex-col w-40 shadow-sm rounded-xl md:w-52 lg:w-64">
                    <img class="w-full h-auto rounded-xl shadow-md"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                        alt="Image Description">
                    <div class=" absolute inset-0 flex items-center justify-center">
                        <h3 class="text-lg font-bold text-center text-gray-800 dark:text-white">
                            Card title
                        </h3>

                    </div>
                </a>

                <a class=" relative flex flex-col w-40 shadow-sm rounded-xl md:w-52 lg:w-64">
                    <img class="w-full h-auto rounded-xl shadow-md"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                        alt="Image Description">
                    <div class=" absolute inset-0 flex items-center justify-center">
                        <h3 class="text-lg font-bold text-center text-gray-800 dark:text-white">
                            Card title
                        </h3>

                    </div>
                </a>

                <a class=" relative flex flex-col w-40 shadow-sm rounded-xl md:w-52 lg:w-64">
                    <img class="w-full h-auto rounded-xl shadow-md"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                        alt="Image Description">
                    <div class=" absolute inset-0 flex items-center justify-center">
                        <h3 class="text-lg font-bold text-center text-gray-800 dark:text-white">
                            Card title
                        </h3>

                    </div>
                </a>

                <a class=" relative flex flex-col w-40 shadow-sm rounded-xl md:w-52 lg:w-64">
                    <img class="w-full h-auto rounded-xl shadow-md"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                        alt="Image Description">
                    <div class=" absolute inset-0 flex items-center justify-center">
                        <h3 class="text-lg font-bold text-center text-gray-800 dark:text-white">
                            Card title
                        </h3>

                    </div>
                </a>

            </div>

        </div>

    </section>
    {{-- Location --}}

    <footer class="bg-cyan-500 py-4 h-56">
        <div class="container mx-auto px-4">
            <h1 class="text-center text-3xl">Contact Us</h1>

        </div>

    </footer>
@endsection
