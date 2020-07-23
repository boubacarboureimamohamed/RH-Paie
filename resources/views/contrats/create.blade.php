@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Définition d\'un nouveau contrat') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form class="user" method="POST" action="{{ route('contrats.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for="">Référence Du Contrat : </label>
                        <input id="" type="text" class="form-control @error('ref_contrat') is-invalid @enderror" name="ref_contrat" value="" placeholder="Veillez entrer la référence du contrat">
                        @error('ref_contrat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Référence Du Contrat :</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('description') is-invalid @enderror" id="inputGroupFile01" name="description">
                            <label class="custom-file-label" for="inputGroupFile01">Veillez choisir le fichier</label>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Matricule :</label>
                            <select  name="agent_id" onchange="change()" id="select" value="" data-toggle="tooltip" class="form-control @error('agent_id') is-invalid @enderror">
                                <option value="">*************Selectionner*************</option>
                              @foreach($agents as $agent)
                                <option data-agent="{{ $agent->nom.' '.$agent->prenom }}" value="{{  $agent->id   }}">
                                    {{ $agent->matricule }}
                                </option>
                              @endforeach
                            </select>
                            @error('agent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="inputEmail4">Nom et Prénom : </label>
                            <input class="multisteps-form__input form-control" id="agent" type="text" disabled name="" value="" placeholder="Veillez entrer le nom de l'agent"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Titre De Poste :</label>
                            <select  name="poste_id" value="" data-toggle="tooltip" class="form-control @error('poste_id') is-invalid @enderror">
                                <option value="">*************Selectionner*************</option>
                              @foreach($postes as $poste)
                                <option value="{{  $poste->id   }}">
                                    {{ $poste->intitule }}
                                </option>
                              @endforeach
                            </select>
                            @error('poste_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="inputEmail4">Salaire De Base : </label>
                            <input id="" type="text" class="form-control @error('salaire_base') is-invalid @enderror" name="salaire_base" value="" placeholder="Veillez entrer le salaire de base de l'agent">
                            @error('salaire_base')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Date Début :</label>
                            <input id="" type="date" class="form-control @error('date_debut_contrat') is-invalid @enderror" name="date_debut_contrat" value="" placeholder="Veillez entrer la date début du contrat">
                            @error('date_debut_contrat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="inputEmail4">Date Fin : </label>
                            <input id="" type="date" class="form-control @error('date_fin_contrat') is-invalid @enderror" name="date_fin_contrat" value="" autofocus placeholder="Veillez entrer la date fin du contrat">
                            @error('date_fin_contrat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
                            {{ ('Enregistrer') }}
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

<script>

    function change() {
        let agent = $('#select option:selected').attr('data-agent')
        $('#agent').val(agent)
        }

</script>

@endsection
