@extends('layouts.template')

@section('css')
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/scss/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/multiselect/css/multi-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/css/select2.min.css') }}">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification des informations d\'un utilisateur') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10">
              <div>
                <form class="user" method="POST" action="{{ route('users.update', $user) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Nom : </label>
                      <input id="firstname" type="text" class="form-control  @error('firstname') is-invalid @enderror" name="firstname" value="{{ $user->firstname }}" required autocomplete="firstname" autofocus placeholder="Veillez entrer le nom">
                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="inputEmail4">Prénom : </label>
                        <input id="secondname" type="text" class="form-control  @error('secondname') is-invalid @enderror" name="secondname" value="{{ $user->secondname }}" required autocomplete="secondname" autofocus placeholder="Veillez entrer le prénom">
                        @error('secondname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail4">Email : </label>
                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="Veillez enter l'adresse mail s'il vous plaît!">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Mot de pass : </label>
                        <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{ $user->password }}" required autocomplete="new-password" placeholder="Confirmer mot de passe">
                        @error('password')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="inputEmail4">Confirmer  mot de pass: </label>
                      <input id="password-confirm" type="password" class="form-control " name="password_confirmation" value="{{ $user->password }}" required autocomplete="new-password" placeholder="Confirmer mot de passe">
                    </div>
                  </div>
                  <div class="form-group">
                    <!-- Multi-select start -->
                    <h4 class="sub-title">Veillez choisir un rôle</h4>
                    <select id='custom-headers' title="Selectionner le ou les roles de l'utilisateur" data-toggle="tooltip" class="searchable" name="roles[]" multiple='multiple'>
                        @foreach ($roles as $role)
                            <option @if (in_array($role->id, $user->roles->pluck('id')->toArray()))
                                selected
                            @endif value='{{ $role->id }}'>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <!-- Multi-select end -->
                  </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('users.index') }}" class="btn btn-default btn-user btn-block">
                            {{ ('Annuler') }}
                    </a>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ ('Modifier') }}
                        </button>
                    </div>
                    <div class="col-lg-3">

                    </div>
                   </div>
                  <hr>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-1">

          </div>
      </div>
    </div>

  </div>

</div>

@endsection

@section('js')
    <!-- Multiselect js -->
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap-multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/multiselect/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/multiselect/js/jquery.quicksearch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/select2/js/select2-custom.js') }}"></script>
@endsection
