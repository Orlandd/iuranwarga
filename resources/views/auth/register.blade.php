@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="key" class="col-md-4 col-form-label text-md-end">Key</label>

                                <div class="col-md-6">
                                    <input id="key" type="password"
                                        class="form-control @error('key') is-invalid @enderror" name="key" required
                                        autocomplete="new-key">

                                    @error('key')
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
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
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
            <h1 class="text-3xl block text-center font-semibold">Sign in</h1>
            <hr class="mt-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="block text-base mb-2">{{ __('Name') }}</label>

                    <div class="">
                        <input id="name" type="text"
                            class="rounded-full border w-full text-base shadow-md shadow-sky-300/20 px-4 py-2 outline-2 ring-0 border-gray-600 @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="block text-base mb-2">{{ __('Email Address') }}</label>

                    <div class="">
                        <input id="email" type="email"
                            class="rounded-full border w-full text-base shadow-md shadow-sky-300/20 px-4 py-2 outline-2 ring-0 border-gray-600 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="key" class="block text-base mb-2">Key</label>

                    <div class="">
                        <input id="key" type="password"
                            class="rounded-full border w-full text-base shadow-md shadow-sky-300/20 px-4 py-2 outline-2 ring-0 border-gray-600 @error('key') is-invalid @enderror"
                            name="key" required autocomplete="new-key">

                        @error('key')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="block text-base mb-2">{{ __('Password') }}</label>

                    <div class="">
                        <input id="password" type="password"
                            class="rounded-full border w-full text-base shadow-md shadow-sky-300/20 px-4 py-2 outline-2 ring-0 border-gray-600 @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="block text-base mb-2">{{ __('Confirm Password') }}</label>

                    <div class="">
                        <input id="password-confirm" type="password"
                            class="rounded-full border w-full text-base shadow-md shadow-sky-300/20 px-4 py-2 outline-2 ring-0 border-gray-600"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div>
                    <a href="/login" class="text-indigo-800 font-semibold text-center">Already have an account? Log
                        in</a>
                </div>

                <div class="mt-3">
                    <div class="">
                        <button type="submit"
                            class="border-2 border-blue-500 bg-blue-500 text-white py-1 w-full rounded-full font-semibold">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
