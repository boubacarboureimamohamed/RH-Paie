@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Ajout d\'un nouveau agent') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('agents.store') }}">
                    @csrf
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="matricule" value="" autofocus placeholder="Veillez entrer le matricule">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control form-control-user" value="" placeholder="Veillez entrer la référence du recrutement" name="agents_recrutements_id" id="">
                                <option value="">******Selectionner********</option>
                            @foreach ($recrutements as $recrutement)
                                <option value="{{$recrutement->id}}">{{$recrutement->description}}</option>
                             @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="nom" value="" autofocus placeholder="Veillez entrer le nom de l'agent">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="prenom" value="" autofocus placeholder="Veillez entrer le prénom de l'agent">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date_naiss" value="" autofocus placeholder="Veillez entrer la date de naissance">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="lieu_naiss" value="" autofocus placeholder="Veillez entrer le lieu de naissance">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="nationalite" value="" autofocus placeholder="Veillez entrer la nationnalité de l'agent">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="sexe" value="" autofocus placeholder="Veillez entrer le sexe de l'agent">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="telephone" value="" autofocus placeholder="Veillez entrer le numéro de téléphone">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="email" value="" autofocus placeholder="Veillez entrer l'adresse mail">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="fonction" value="" autofocus placeholder="Veillez entrer la fonction de l'agent">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="adresse" value="" autofocus placeholder="Veillez entrer l'adresse de l'agent">
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
                            {{ ('Enregistrer') }}
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
