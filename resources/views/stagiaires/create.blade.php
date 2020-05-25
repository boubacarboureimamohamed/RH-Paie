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
                        <label for="inputEmail4">Théme : </label>
                        <select class="multisteps-form__input form-control" value="" placeholder="Veillez entrer la référence du recrutement" name="theme_id" id="">
                            <option value="">******Selectionner********</option>
                            @foreach ($themes as $theme)
                               <option value="{{$theme->id}}">{{$theme->intitule}}</option>
                            @endforeach
                       </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Ref_Recrutement : </label>
                        <select class="multisteps-form__input form-control" value="" placeholder="Veillez entrer la référence du recrutement" name="recrutement_id" id="">
                                <option value="">******Selectionner********</option>
                            @foreach ($recrutements as $recrutement)
                                <option value="{{$recrutement->id}}">{{$recrutement->description}}</option>
                             @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Nom : </label>
                      <input id="" type="text" class="multisteps-form__input form-control" name="nom" value="" autofocus placeholder="Veillez entrer le nom du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Prénom : </label>
                        <input id="" type="text" class="multisteps-form__input form-control" name="prenom" value="" autofocus placeholder="Veillez entrer le prénom du stagiaire">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Date Naissance : </label>
                      <input id="" type="date" class="multisteps-form__input form-control" name="date_naiss" value="" autofocus placeholder="Veillez entrer la date de naissance">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Lieu Naissance : </label>
                        <input id="" type="text" class="multisteps-form__input form-control" name="lieu_naiss" value="" autofocus placeholder="Veillez entrer le lieu de naissance">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Nationalité : </label>
                      <input id="" type="text" class="multisteps-form__input form-control" name="nationalite" value="" autofocus placeholder="Veillez entrer la nationnalité du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Sexe : </label>
                        <select class="multisteps-form__input form-control" value="" placeholder="Veillez entrer la référence du recrutement" name="sexe" id="">
                               <option value="HOMME">HOMME</option>
                               <option value="FEMME">FEMME</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Téléphone : </label>
                      <input id="" type="text" class="multisteps-form__input form-control" name="telephone" value="" autofocus placeholder="Veillez entrer le numéro de téléphone">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Email : </label>
                        <input id="" type="text" class="multisteps-form__input form-control" name="email" value="" autofocus placeholder="Veillez entrer l'adresse mail">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Adresse : </label>
                        <input id="" type="text" class="multisteps-form__input form-control" name="adresse" value="" autofocus placeholder="Veillez entrer l'adresse du stagiaire">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Service : </label>
                        <select class="multisteps-form__input form-control" value="" placeholder="Veillez choisir le service" name="service_id" id="">
                                <option value="">******Selectionner********</option>
                            @foreach ($services as $service)
                                <option value="{{$service->id}}">{{$service->libelle}}</option>
                            @endforeach
                         </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Date Début : </label>
                      <input id="" type="date" class="multisteps-form__input form-control" name="date_debut_stage" value="" autofocus placeholder="Veillez entrer la date début du stage">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Date Fin : </label>
                        <input id="" type="date" class="multisteps-form__input form-control" name="date_fin_stage" value="" autofocus placeholder="Veillez entrer la date fin du stage">
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
