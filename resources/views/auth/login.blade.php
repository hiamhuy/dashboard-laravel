@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-container">
        <div class="login-form">
            <div class="login-form-inner">
              <div class="logo">
                    <svg height="512" viewBox="0 0 192 192" width="512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m155.109 74.028a4 4 0 0 0 -3.48-2.028h-52.4l8.785-67.123a4.023 4.023 0 0 0 -7.373-2.614l-63.724 111.642a4 4 0 0 0 3.407 6.095h51.617l-6.962 67.224a4.024 4.024 0 0 0 7.411 2.461l62.671-111.63a4 4 0 0 0 .048-4.027z" />
                    </svg>
                </div>

              <h1>{{ __('login.login',[],'vi') }}</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3 login-form-group">
                        <label for="email" class="col-form-label">{{ __('login.email_address',[],'vi') }}</label>

                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 login-form-group">
                        <label for="password" class="col-form-label">{{ __('login.password',[],'vi') }}</label>

                        <div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-0">
                        <div class="login-form-group single-row">
                            <div class="custom-check">
                                <input autocomplete="off" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }} id="remember">
                                <label for="remember">{{ __('login.remember_me',[],'vi') }}</label>

                            </div>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link link forgot-link" href="{{ route('password.request') }}">
                                    {{ __('login.forgot_password',[],'vi') }}
                                </a>
                            @endif
                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary rounded-button login-cta">
                            {{ __('login.login',[],'vi') }}
                        </button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
