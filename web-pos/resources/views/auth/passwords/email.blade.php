@extends('layouts.login')

@section('content')
    {{-- <div class="card-header">{{ __('Reset Password') }}</div> --}}
    <!-- Logo -->
    <div class="app-brand justify-content-center">
        <a href="index.html" class="app-brand-link gap-2 img-fluid">

            <span class="app-brand-Logo demo">
                <img class=" img-fluid" src="/img/logo/logo-ptba-2021-trans.png" alt="">

            </span>
        </a>
    </div>
    <p class="mb-2">Masukan email yang sudah terdaftar, kami akan mengirimkan link untuk mereset password</p>
    <p class="mb-4">Anda juga bisa meminta bantuan kepada admin untuk melakukan reet password</p>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            {{-- <div class="d-flex justify-content-between">
                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                <a href="{{ route('password.request') }}">
                    <small>Login?</small>
                </a>
            </div> --}}
            <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary d-grid w-100">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>
    {{-- </div>
            </div>
        </div>
    </div> --}}
@endsection
