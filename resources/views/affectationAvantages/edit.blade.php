@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'une affectation de base imposable') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('affectationAvantages.update', $affectationAvantage) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                  <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Matricule : </label>
                        <input class="multisteps-form__input form-control" type="text" disabled name="matricule" value="{{ $affectationAvantage->agent->matricule }}" placeholder="Veillez entrer le matricule"/>
                        <input class="multisteps-form__input form-control" type="hidden" name="agent_id" value="{{ $affectationAvantage->agent->id }}" placeholder="Veillez entrer le matricule"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Nom et Prénom : </label>
                        <input class="multisteps-form__input form-control" type="text" disabled name="nom" value="{{ $affectationAvantage->agent->nom.' '.$affectationAvantage->agent->prenom }}" placeholder="Veillez entrer le nom et prénom de l'agent"/>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-6 col-sm-6">
                        <label for="inputEmail4">Libellé : </label>
                        <select class="multisteps-form__select form-control" id="" name="avantage_id">
                            <option selected="selected">********Sélectionnez********</option>
                                @foreach ($avantages as $avantage)
                            <option @if($avantage->id == $affectationAvantage->avantage_id) {{ 'selected' }} @endif value="{{ $avantage->id }}">{{ $avantage->libelle }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Montant : </label>
                        <input class="multisteps-form__input form-control" type="text" name="montant" value="{{ $affectationAvantage->montant }}" placeholder="Veillez entrer le montant"/>
                    </div>
                </div>

                  <hr>
                  <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('affectationAvantages.index') }}" class="btn btn-default btn-user btn-block">
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
