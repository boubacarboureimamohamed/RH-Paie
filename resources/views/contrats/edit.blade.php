@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'un contrat') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <form class="user" method="POST" action="{{ route('contrats.update', $contrat) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for="">Référence Du Contrat : </label>
                        <input id="" type="text" class="form-control" name="ref_contrat" value="{{ $contrat->ref_contrat }}" placeholder="Veillez entrer la référence du contrat">
                      </div>
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Référence Du Contrat :</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="description" value="description">
                            <label class="custom-file-label" for="inputGroupFile01">Veillez choisir le fichier</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Matricule :</label>
                            <select class="multisteps-form__select form-control" onchange="change()" id="select" name="agent_id">
                              <option selected="selected">***Sélectionnez***</option>
                                  @foreach ($agents as $agent)
                              <option @if ($agent->id == $contrat->agent_id) {{ 'selected' }} @endif data-agent="{{ $agent->nom.' '.$agent->prenom }}" value="{{ $agent->id }}">{{ $agent->matricule }}</option>
                                  @endforeach
                          </select>
                        </div>
                      <div class="form-group col-12 col-sm-6">
                          <label for="inputEmail4">Nom et Prénom : </label>
                          <input class="multisteps-form__input form-control" id="agent" type="text" disabled name="" value="" placeholder="Veillez entrer le nom de l'agent"/>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Titre De Poste :</label>
                            <select class="multisteps-form__select form-control" id="" name="poste_id">
                              <option selected="selected">***Sélectionnez***</option>
                                  @foreach ($postes as $poste)
                              <option @if ($poste->id == $contrat->poste_id) {{ 'selected' }} @endif value="{{ $poste->id }}">{{ $poste->intitule }}</option>
                                  @endforeach
                          </select>
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label for="inputEmail4">Salaire De Base : </label>
                            <input id="" type="text" class="form-control" name="salaire_base" value="{{ $contrat->salaire_base }}" placeholder="Veillez entrer le salaire de base de l'agent">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Date Début :</label>
                            <input id="" type="date" class="form-control" name="date_debut_contrat" value="{{ $contrat->date_debut_contrat }}" placeholder="Veillez entrer la date début du contrat">
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label for="inputEmail4">Date Fin : </label>
                            <input id="" type="date" class="form-control" name="date_fin_contrat" value="{{ $contrat->date_fin_contrat }}" placeholder="Veillez entrer la date fin du contrat">
                        </div>
                    </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('contrats.index') }}" class="btn btn-default btn-user btn-block">
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

</div>

@endsection

@section('js')

<script>

    function change() {
        let agent = $('#select option:selected').attr('data-agent')
        $('#agent').val(agent)
        }

</script>

@endsection
