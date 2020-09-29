@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification des informations d\'un employé') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form class="user" method="POST" action="{{ route('agents.update', $agent) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                  <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Matricule : </label>
                        <input class="multisteps-form__input form-control @error('matricule') is-invalid @enderror" type="text" name="matricule" value="{{ $agent->matricule }}" placeholder="Veillez entrer le matricule"/>
                        @error('matricule')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6 col-sm-6">
                        <label for="inputEmail4">Nom : </label>
                        <input class="multisteps-form__input form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{ $agent->nom }}" placeholder="Veillez entrer le nom de lagent"/>
                        @error('nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Prénom : </label>
                        <input class="multisteps-form__input form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" value="{{ $agent->prenom }}" placeholder="Veillez entrer le prénom de lagent"/>
                        @error('prenom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Date Naissance : </label>
                        <input class="multisteps-form__input form-control @error('date_naiss') is-invalid @enderror" type="date" name="date_naiss" value="{{ $agent->date_naiss }}" placeholder="Veillez entrer la date de naissance"/>
                        @error('date_naiss')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Lieu Naissance : </label>
                        <input class="multisteps-form__input form-control @error('lieu_naiss') is-invalid @enderror" type="text" name="lieu_naiss" value="{{ $agent->lieu_naiss }}" placeholder="Veillez entrer le lieu de naissance"/>
                        @error('lieu_naiss')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Nationalité : </label>
                        <select class="form-control @error('nationalite_id') is-invalid @enderror" name="nationalite_id">
                            @foreach ($nationalites as $nationalite)
                                <option @if($nationalite->id == $agent->nationalite_id) {{ 'selected' }} @endif value="{{ $nationalite->id }}">{{ $nationalite->nationalite }}</option>
                            @endforeach
                        </select>
                        @error('nationalite_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Sexe : </label>
                        <select class="multisteps-form__input form-control @error('sexe') is-invalid @enderror" name="sexe" id="">
                               <option value="HOMME" @if($agent->sexe == 'HOMME') {{ 'selected' }} @endif>HOMME</option>
                               <option value="FEMME" @if($agent->sexe == 'FEMME') {{ 'selected' }} @endif>FEMME</option>
                        </select>
                        @error('sexe')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Situation matrimoniale : </label>
                        <select class="multisteps-form__input form-control @error('situation_matrimoniale') is-invalid @enderror" name="situation_matrimoniale">
                            <option value="Célibataire" @if($agent->situation_matrimoniale == 'Célibataire') {{ 'selected' }} @endif>Célibataire</option>
                            <option value="Divorcé(e)" @if($agent->situation_matrimoniale == 'Divorcé(e)') {{ 'selected' }} @endif>Divorcé(e)</option>
                            <option value="Marié(e)" @if($agent->situation_matrimoniale == 'Marié(e)') {{ 'selected' }} @endif>Marié(e)</option>
                            <option value="Veuf(ve)" @if($agent->situation_matrimoniale == 'Veuf(ve)') {{ 'selected' }} @endif>Veuf(ve)</option>
                        </select>
                        @error('situation_matrimoniale')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6 col-sm-6">
                        <label for="inputEmail4">Téléphone : </label>
                        <input class="multisteps-form__input form-control @error('telephone') is-invalid @enderror" type="text" name="telephone" value="{{ $agent->telephone }}" placeholder="Veillez entrer le numéro de téléphone"/>
                        @error('telephone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Email : </label>
                        <input class="multisteps-form__input form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $agent->email }}" placeholder="Veillez entrer ladresse mail"/>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Adresse : </label>
                        <input class="multisteps-form__input form-control @error('adresse') is-invalid @enderror" type="text" name="adresse" value="{{ $agent->adresse }}" placeholder="Veillez entrer ladresse de lagent"/>
                        @error('adresse')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Occupation : </label>
                        <input class="multisteps-form__input form-control @error('fonction') is-invalid @enderror" type="text" name="fonction" value="{{ $agent->fonction }}" autofocus placeholder="Veillez entrer la fonction de lagent"/>
                        @error('fonction')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                  <hr>
                  <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('agents.index') }}" class="btn btn-default btn-user btn-block">
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
    </div>

  </div>

</div>

@endsection

@section('js')

@endsection
