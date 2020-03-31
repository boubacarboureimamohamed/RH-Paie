@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Mofication d\'un stagiaire') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('stagiaires.update', $stagiaire) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control form-control-user" value="" placeholder="Veillez entrer la référence du recrutement" name="stagiaires_themes_id" id="">
                            @foreach ($themes as $theme)
                               <option @if($theme->id == $stagiaire->stagiaires_themes_id)
                                {{ 'selected' }}
                                @endif value="{{$theme->id}}">{{$theme->intitule}}</option>
                            @endforeach
                       </select>                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control form-control-user" value="" placeholder="Veillez entrer la référence du recrutement" name="stagiaires_recrutements_id" id="">
                                <option value="">******Selectionner********</option>
                            @foreach ($recrutements as $recrutement)
                                <option @if($recrutement->id == $stagiaire->stagiaires_recrutements_id)
                                    {{ 'selected' }}
                                    @endif value="{{$recrutement->id}}">{{$recrutement->description}}</option>
                             @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="nom" value="{{ $stagiaire->nom }}" autofocus placeholder="Veillez entrer le nom du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="prenom" value="{{ $stagiaire->prenom }}" autofocus placeholder="Veillez entrer le prénom du stagiaire">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date_naiss" value="{{ $stagiaire->date_naiss }}" autofocus placeholder="Veillez entrer la date de naissance">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="lieu_naiss" value="{{ $stagiaire->lieu_naiss }}" autofocus placeholder="Veillez entrer le lieu de naissance">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="nationalite" value="{{ $stagiaire->nationalite }}" autofocus placeholder="Veillez entrer la nationnalité du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="sexe" value="{{ $stagiaire->sexe }}" autofocus placeholder="Veillez entrer le sexe du stagiaire">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="telephone" value="{{ $stagiaire->telephone }}" autofocus placeholder="Veillez entrer le numéro de téléphone">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="email" value="{{ $stagiaire->email }}" autofocus placeholder="Veillez entrer l'adresse mail">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="adresse" value="{{ $stagiaire->adresse }}" autofocus placeholder="Veillez entrer l'adresse du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control form-control-user" value="" placeholder="Veillez choisir le service" name="stagiaires_services_id" id="">
                                <option value="">******Selectionner********</option>
                            @foreach ($services as $service)
                                <option @if($service->id == $stagiaire->stagiaires_services_id)
                                    {{ 'selected' }}
                                    @endif value="{{$service->id}}">{{$service->libelle}}</option>
                            @endforeach
                         </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date_debut_stage" value="{{ $stagiaire->date_debut_stage }}" autofocus placeholder="Veillez entrer la date début du stage">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="date" class="form-control form-control-user" name="date_fin_stage" value="{{ $stagiaire->date_fin_stage }}" autofocus placeholder="Veillez entrer la date fin du stage">
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
