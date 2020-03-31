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
                    <h1 class="h1 text-gray-900 mb-4"> <strong> {{ ('Création d\'un compte') }}</strong> </h1>
                </div>
                <form class="user" method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="firstname" type="text" class="form-control form-control-user @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus placeholder="Veillez entrer le nom">
                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input id="secondname" type="text" class="form-control form-control-user @error('secondname') is-invalid @enderror" name="secondname" value="{{ old('secondname') }}" required autocomplete="secondname" autofocus placeholder="Veillez entrer le prénom">
                        @error('secondname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Veillez enter l'adresse mail s'il vous plaît!">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Confirmer mot de passe">
                        @error('password')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                    </div>
                    <div class="col-sm-6">
                      <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer mot de passe">
                    </div>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ ('Enregistrer') }}
                  </button>
                  <hr>
                </form>
                <div class="text-center">
                  <a class="small" href="#">{{ ('Mot de passe oublié?') }}</a>
                </div>
                <div class="text-center">
                  <a class="small" href="{{ route('login') }}">{{ ('J\'ai déja un compte d\'utilisateur!') }}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
