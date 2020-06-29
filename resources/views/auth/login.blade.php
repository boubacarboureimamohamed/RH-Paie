@extends('layouts.app')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                @csrf
                <span class="login100-form-title">
                    Authentification
                </span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                    <input class="input100 @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="Username" value="{{ old('email') }}" autocomplete="off">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                    <input class="input100 @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-right p-t-13 p-b-23">

                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Se connecter
                    </button>
                </div>

                <div class="flex-col-c p-t-100 p-b-30">
                    <span class="txt1 p-b-9">
                        Forgot
                    </span>

                    <a href="#" class="txt3">
                        Username / Password ?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
