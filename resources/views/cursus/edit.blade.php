@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'un cursus') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('cursus.update', $cursu) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                  <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Matricule : </label>
                        <input class="multisteps-form__input form-control" type="text" disabled name="matricule" value="{{ $cursu->agent->matricule }}" placeholder="Veillez entrer le matricule"/>
                        <input class="multisteps-form__input form-control" type="hidden" name="agent_id" value="{{ $cursu->agent->id }}" placeholder="Veillez entrer le matricule"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Nom et Prénom : </label>
                        <input class="multisteps-form__input form-control" type="text" disabled name="nom" value="{{ $cursu->agent->nom.' '.$cursu->agent->prenom }}" placeholder="Veillez entrer le nom de lagent"/>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-6 col-sm-6">
                        <label for="inputEmail4">Ecole / Institut : </label>
                        <input class="multisteps-form__input form-control" type="text" name="ecole" value="{{ $cursu->ecole }}" placeholder="Veillez entrer le nom de l'école ou l'institut"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Diplôme / Certificat : </label>
                        <input class="multisteps-form__input form-control" type="text" name="diplome" value="{{ $cursu->diplome }}" placeholder="Veillez entrer le diplôme ou la certification"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Date Début : </label>
                        <input class="multisteps-form__input form-control" type="date" name="date_debut" value="{{ $cursu->date_debut }}" placeholder="Veillez entrer la date début de la formation"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Date Fin : </label>
                        <input class="multisteps-form__input form-control" type="date" name="date_fin" value="{{ $cursu->date_fin }}" placeholder="Veillez entrer la date fin de la formation"/>
                    </div>
                </div>

                  <hr>
                  <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('cursus.index') }}" class="btn btn-default btn-user btn-block">
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
