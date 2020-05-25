@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'une charge') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('charges.update', $charge) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                  <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Matricule : </label>
                        <input class="multisteps-form__input form-control" type="text" disabled name="matricule" value="{{ $charge->agent->matricule }}" placeholder="Veillez entrer le matricule"/>
                        <input class="multisteps-form__input form-control" type="hidden" name="agent_id" value="{{ $charge->agent->id }}" placeholder="Veillez entrer le matricule"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Nom et Prénom : </label>
                        <input class="multisteps-form__input form-control" type="text" disabled name="nom" value="{{ $charge->agent->nom.' '.$charge->agent->prenom }}" placeholder="Veillez entrer le nom de lagent"/>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-6 col-sm-6">
                        <label for="inputEmail4">Type Charge : </label>
                        <select class="multisteps-form__select form-control" name="type_charge_id">
                            <option selected="selected">***Sélectionnez***</option>
                                @foreach ($typecharges as $typecharge)
                            <option @if($typecharge->id == $charge->type_charge_id) {{ 'selected' }} @endif value="{{ $typecharge->id }}">
                                {{ $typecharge->type_charge }}
                            </option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6 col-sm-6">
                        <label for="inputEmail4">Nom : </label>
                        <input class="multisteps-form__input form-control" type="text" name="nomc" value="{{ $charge->nomc }}" placeholder="Veillez entrer le nom de l'école ou l'institut"/>
                    </div>
                </div>
                  <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Date Naissance : </label>
                        <input class="multisteps-form__input form-control" type="date" name="date_naissc" value="{{ $charge->date_naissc }}" placeholder="Veillez entrer la date début de la formation"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Prénom : </label>
                        <input class="multisteps-form__input form-control" type="text" name="prenomc" value="{{ $charge->prenomc }}" placeholder="Veillez entrer le diplôme ou la certification"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Lieu Naissance : </label>
                        <input class="multisteps-form__input form-control" type="text" name="lieu_naissc" value="{{ $charge->lieu_naissc }}" placeholder="Veillez entrer la date fin de la formation"/>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Nationalité : </label>
                        <input class="multisteps-form__input form-control" type="text" name="nationalitec" value="{{ $charge->nationalitec }}" placeholder="Veillez entrer la date début de la formation"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                        <label for="inputEmail4">Sexe : </label>
                        <select class="multisteps-form__input form-control" value="" placeholder="Veillez entrer la référence du recrutement" name="sexec" id="">
                               <option value="HOMME" @if($charge->sexec == 'HOMME') {{ 'selected' }} @endif>HOMME</option>
                               <option value="FEMME" @if($charge->sexec == 'FEMME') {{ 'selected' }} @endif>FEMME</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-sm-6">

                    </div>
                </div>

                  <hr>
                  <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('charges.index') }}" class="btn btn-default btn-user btn-block">
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
