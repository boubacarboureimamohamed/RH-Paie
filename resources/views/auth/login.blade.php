@extends('layouts.app')

@section('content')

<div class="col-xl-6 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 shadow-lg my-5">
         <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h1 text-gray-900 mb-4"> <strong>{{ ('Authentification') }}</strong> </h1>
                    </div>
                    <form class="user" method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Veillez enter votre addresse mail s'il vous plaît!" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                      <div class="form-group">
                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Veillez enter votre mot de passe s'il vous plaît!" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                        </div>
                      </div>
                      <hr>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ ('Se connecter') }}
                      </button>
                      <hr>
                    </form>
                    <div class="text-center">
                        @if (Route::has('password.request'))
                          <a class="small" href="{{ route('password.request') }}">{{ ('Mot de passe oublié?') }}</a>
                        @endif
                        </div>
                    <div class="text-center">
                        @if (Route::has('register'))
                          <a class="small" href="{{ route('register') }}">{{ ('Créer un nouveau compte!') }}</a>
                        @endif
                     </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
