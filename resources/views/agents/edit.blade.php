@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'un agent') }}</strong></h1>
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
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="matricule" value="{{ $agent->matricule }}" autofocus placeholder="Veillez entrer le matricule">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control form-control-user" value="" placeholder="Veillez entrer la référence du recrutement" name="agents_recrutements_id" id="">
                                <option value="">******Selectionner********</option>
                            @foreach ($recrutements as $recrutement)
                                <option @if($recrutement->id == $agent->agents_recrutements_id)
                                    {{ 'selected' }}
                                    @endif value="{{$recrutement->id}}">{{$recrutement->description}}</option>
                             @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="nom" value="{{ $agent->nom }}" autofocus placeholder="Veillez entrer le nom de l'agent">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="prenom" value="{{ $agent->prenom }}" autofocus placeholder="Veillez entrer le prénom de l'agent">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date_naiss" value="{{ $agent->date_naiss }}" autofocus placeholder="Veillez entrer la date de naissance">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="lieu_naiss" value="{{ $agent->lieu_naiss }}" autofocus placeholder="Veillez entrer le lieu de naissance">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="nationalite" value="{{ $agent->nationalite }}" autofocus placeholder="Veillez entrer la nationnalité de l'agent">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="sexe" value="{{ $agent->sexe }}" autofocus placeholder="Veillez entrer le sexe de l'agent">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="telephone" value="{{ $agent->telephone }}" autofocus placeholder="Veillez entrer le numéro de téléphone">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="email" value="{{ $agent->email }}" autofocus placeholder="Veillez entrer l'adresse mail">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="fonction" value="{{ $agent->fonction }}" autofocus placeholder="Veillez entrer la fonction de l'agent">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="adresse" value="{{ $agent->adresse }}" autofocus placeholder="Veillez entrer l'adresse de l'agent">
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
