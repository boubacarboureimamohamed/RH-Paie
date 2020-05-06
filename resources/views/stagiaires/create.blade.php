@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Ajout d\'un nouveau stagiaire') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('stagiaires.store') }}">
                    @csrf
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control form-control-user" value="" placeholder="Veillez entrer la référence du recrutement" name="theme_id" id="">
                            @foreach ($themes as $theme)
                               <option value="{{$theme->id}}">{{$theme->intitule}}</option>
                            @endforeach
                       </select>                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control form-control-user" value="" placeholder="Veillez entrer la référence du recrutement" name="recrutement_id" id="">
                                <option value="">******Selectionner********</option>
                            @foreach ($recrutements as $recrutement)
                                <option value="{{$recrutement->id}}">{{$recrutement->description}}</option>
                             @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="nom" value="" autofocus placeholder="Veillez entrer le nom du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="prenom" value="" autofocus placeholder="Veillez entrer le prénom du stagiaire">
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
                      <input id="" type="text" class="form-control form-control-user" name="nationalite" value="" autofocus placeholder="Veillez entrer la nationnalité du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="sexe" value="" autofocus placeholder="Veillez entrer le sexe du stagiaire">
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
                        <input id="" type="text" class="form-control form-control-user" name="adresse" value="" autofocus placeholder="Veillez entrer l'adresse du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control form-control-user" value="" placeholder="Veillez choisir le service" name="service_id" id="">
                                <option value="">******Selectionner********</option>
                            @foreach ($services as $service)
                                <option value="{{$service->id}}">{{$service->libelle}}</option>
                            @endforeach
                         </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date_debut_stage" value="" autofocus placeholder="Veillez entrer la date début du stage">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="date" class="form-control form-control-user" name="date_fin_stage" value="" autofocus placeholder="Veillez entrer la date fin du stage">
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('stagiaires.index') }}" class="btn btn-default btn-user btn-block">
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
