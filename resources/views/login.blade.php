@extends('layouts.main')

@section('container')
    <section class="container m-auto px-4 mt-4">
        <div class="max-w-[600px] mx-auto">
            <div class="bg-slate-500 w-full h-28"></div>
            <h1 class="text-center text-3xl my-4">Login</h1>
            <form action="" method="post">
                @csrf
                <label for="email" class="">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full h-8 px-4 border-2 mb-5 rounded-full border-orange-400 focus:shadow-lg"
                    placeholder="Your email ...">

                <label for="password" class="">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full h-8 px-4 border-2 rounded-full border-orange-400 focus:shadow-lg">

                <p class="text-center mt-6">Doesn't have an account? <a href="/signup" class="font-bold">Sign up</a></p>
                <div class="flex justify-center mt-2 flex-wrap">
                    <button type="submit"
                        class="px-5 py-2 bg-white border-2 rounded-full  border-orange-400 active:bg-orange-400 active:shadow-lg">Login</button>
                </div>

            </form>
        </div>
    </section>
@endsection
