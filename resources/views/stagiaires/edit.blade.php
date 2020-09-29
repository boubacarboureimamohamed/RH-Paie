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
            <div class="col-lg-12">
                <form class="user" method="POST" action="{{ route('stagiaires.update', $stagiaire) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Nom : </label>
                      <input id="" type="text" class="multisteps-form__input form-control" name="nom" value="{{ $stagiaire->nom }}" autofocus placeholder="Veillez entrer le nom du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Prénom : </label>
                        <input id="" type="text" class="multisteps-form__input form-control" name="prenom" value="{{ $stagiaire->prenom }}" autofocus placeholder="Veillez entrer le prénom du stagiaire">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Date Naissance : </label>
                      <input id="" type="date" class="multisteps-form__input form-control" name="date_naiss" value="{{ $stagiaire->date_naiss }}" autofocus placeholder="Veillez entrer la date de naissance">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Lieu Naissance : </label>
                        <input id="" type="text" class="multisteps-form__input form-control" name="lieu_naiss" value="{{ $stagiaire->lieu_naiss }}" autofocus placeholder="Veillez entrer le lieu de naissance">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Nationalite : </label>
                        <select class="form-control" value="" placeholder="" name="nationalite_id" id="">
                            @foreach ($nationalites as $nationalite)
                                <option  @if($nationalite->id == $stagiaire->nationalite_id)
                                    {{ 'selected' }}
                                    @endif value="{{$nationalite->id}}">{{$nationalite->nationalite}}</option>
                             @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Sexe : </label>
                        <select class="multisteps-form__input form-control" value="" placeholder="Veillez entrer la référence du recrutement" name="sexe" id="">
                               <option value="HOMME" @if($stagiaire->sexe == 'HOMME') {{ 'selected' }} @endif>HOMME</option>
                               <option value="FEMME" @if($stagiaire->sexe == 'FEMME') {{ 'selected' }} @endif>FEMME</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Téléphone : </label>
                      <input id="" type="text" class="multisteps-form__input form-control" name="telephone" value="{{ $stagiaire->telephone }}" autofocus placeholder="Veillez entrer le numéro de téléphone">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Email : </label>
                        <input id="" type="text" class="multisteps-form__input form-control" name="email" value="{{ $stagiaire->email }}" autofocus placeholder="Veillez entrer l'adresse mail">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Adresse : </label>
                        <input id="" type="text" class="multisteps-form__input form-control" name="adresse" value="{{ $stagiaire->adresse }}" autofocus placeholder="Veillez entrer l'adresse du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Forfait Mensuel : </label>
                        <input id="" type="text" class="form-control" name="forfait_mensuel" value="{{ $stagiaire->forfait_mensuel }}" autofocus placeholder="Veillez entrer le forfait mensuel du stagiaire">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Théme : </label>
                        <select class="multisteps-form__input form-control" value="" placeholder="Veillez entrer la référence du recrutement" name="theme_id" id="">
                               <option value="">******Selectionner********</option>
                            @foreach ($themes as $theme)
                               <option @if($theme->id == $stagiaire->theme_id)
                                {{ 'selected' }}
                                @endif value="{{$theme->id}}">{{$theme->intitule}}</option>
                            @endforeach
                       </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Service : </label>
                        <select class="multisteps-form__input form-control" value="" placeholder="Veillez choisir le service" name="service_id" id="">
                                <option value="">******Selectionner********</option>
                            @foreach ($services as $service)
                                <option @if($service->id == $stagiaire->service_id)
                                    {{ 'selected' }}
                                    @endif value="{{$service->id}}">{{$service->libelle}}</option>
                            @endforeach
                         </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Date Début : </label>
                      <input id="" type="date" class="multisteps-form__input form-control" name="date_debut_stage" value="{{ $stagiaire->date_debut_stage }}" autofocus placeholder="Veillez entrer la date début du stage">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Date Fin : </label>
                        <input id="" type="date" class="multisteps-form__input form-control" name="date_fin_stage" value="{{ $stagiaire->date_fin_stage }}" autofocus placeholder="Veillez entrer la date fin du stage">
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
          </div>
      </div>
    </div>

  </div>

</div>

@endsection

@section('js')

@endsection
