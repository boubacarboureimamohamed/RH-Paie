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
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10">
                <form class="user" method="POST" action="{{ route('agents.update', $agent) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                  <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Matricule : </label>
                        <input class="multisteps-form__input form-control" type="text" name="matricule" value="{{ $agent->matricule }}" placeholder="Veillez entrer le matricule"/>
                    </div>
                    <div class="form-group col-6 col-sm-6">
                        <label for="inputEmail4">Nom : </label>
                        <input class="multisteps-form__input form-control" type="text" name="nom" value="{{ $agent->nom }}" placeholder="Veillez entrer le nom de lagent"/>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Prénom : </label>
                        <input class="multisteps-form__input form-control" type="text" name="prenom" value="{{ $agent->prenom }}" placeholder="Veillez entrer le prénom de lagent"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Date Naissance : </label>
                        <input class="multisteps-form__input form-control" type="date" name="date_naiss" value="{{ $agent->date_naiss }}" placeholder="Veillez entrer la date de naissance"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Lieu Naissance : </label>
                        <input class="multisteps-form__input form-control" type="text" name="lieu_naiss" value="{{ $agent->lieu_naiss }}" placeholder="Veillez entrer le lieu de naissance"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Nationalité : </label>
                        <input class="multisteps-form__input form-control" type="text" name="nationalite" value="{{ $agent->nationalite }}" placeholder="Veillez entrer la nationnalité de lagent"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Sexe : </label>
                        <select class="multisteps-form__input form-control" name="sexe" id="">
                               <option value="HOMME" @if($agent->sexe == 'HOMME') {{ 'selected' }} @endif>HOMME</option>
                               <option value="FEMME" @if($agent->sexe == 'FEMME') {{ 'selected' }} @endif>FEMME</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Situation matrimoniale : </label>
                        <select class="multisteps-form__input form-control" name="situation_matrimoniale">
                            <option value="CELIBATAIRE" @if($agent->situation_matrimoniale == 'CELIBATAIRE') {{ 'selected' }} @endif>Célibataire</option>
                            <option value="DIVORCE" @if($agent->situation_matrimoniale == 'DIVORCE') {{ 'selected' }} @endif>Divorcé(e)</option>
                            <option value="MARIE" @if($agent->situation_matrimoniale == 'MARIE') {{ 'selected' }} @endif>Marié(e)</option>
                            <option value="VEUF" @if($agent->situation_matrimoniale == 'VEUF') {{ 'selected' }} @endif>Veuf(ve)</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6 col-sm-6">
                        <label for="inputEmail4">Téléphone : </label>
                        <input class="multisteps-form__input form-control" type="text" name="telephone" value="{{ $agent->telephone }}" placeholder="Veillez entrer le numéro de téléphone"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Email : </label>
                        <input class="multisteps-form__input form-control" type="email" name="email" value="{{ $agent->email }}" placeholder="Veillez entrer ladresse mail"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Adresse : </label>
                        <input class="multisteps-form__input form-control" type="text" name="adresse" value="{{ $agent->adresse }}" placeholder="Veillez entrer ladresse de lagent"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Occupation : </label>
                        <input class="multisteps-form__input form-control" type="text" name="fonction" value="{{ $agent->fonction }}" autofocus placeholder="Veillez entrer la fonction de lagent"/>
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
            <div class="col-lg-1">

            </div>
          </div>
      </div>
    </div>

  </div>

</div>

@endsection

@section('js')

@endsection
