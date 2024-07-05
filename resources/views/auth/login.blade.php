@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="flex justify-center items-center h-screen bg-white">
        <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            <div class="px-6 text-center">
                <div class="flex-none text-xl bg-cover rounded-full mx-auto w-20 h-20 font-semibold dark:text-white"
                    style="background-image: url('/storage/image.jpg')"></div>
                <p class="flex-none text-xl font-semibold text-center dark:text-white" aria-label="Brand">
                    SI-MALING
                    RT</p>
            </div>
            <h1 class="text-3xl block text-center font-semibold">Log in</h1>
            <hr class="mt-3">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Email</label>
                    <input type="email" id="email"
                        class="rounded-full border w-full text-base px-3 py-2 outline-2 ring-0 border-gray-600"
                        placeholder="Enter Email..." name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus />
                </div>
                <div class="mt-3">
                    <label for="password" class="block text-base mb-2">Password</label>
                    <input type="password" id="password"
                        class="rounded-full border w-full text-base px-3 py-2 outline-2 ring-0 border-gray-600"
                        placeholder="Enter Password..." name="password" required autocomplete="current-password" />
                </div>

                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
                <div class="mt-3">
                    <a href="/register" class="text-indigo-800 font-semibold text-center">Doesn't haven an account?
                        Regiser</a>
                </div>
                <div class="mt-3">
                    <button type="submit"
                        class="border-2 border-blue-500 bg-blue-500 text-white py-1 w-full rounded-full font-semibold">Log
                        in</button>
                </div>
            </form>
        </div>
    </div>
@endsection
