@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Ajout d\'un nouveau congé') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form class="user" method="POST" action="{{ route('conges.store') }}">
                    @csrf
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
                        <label for="">Nom et Prénom</label>
                        <input type="text" name="" title="" disabled data-toggle="tooltip" value="" id="agent" class="form-control" placeholder=" ">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Type De Congé : </label>
                        <select  name="type_conge_id" value="" data-toggle="tooltip" class="form-control @error('type_conge_id') is-invalid @enderror">
                            <option value="">*************Selectionner*************</option>
                          @foreach($typeconges as $typeconge)
                            <option value="{{  $typeconge->id   }}">
                                {{ $typeconge->type_conge }}
                            </option>
                          @endforeach
                        </select>
                        @error('type_conge_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Date Début : </label>
                        <input id="" type="date" class="form-control @error('date_debut_conge') is-invalid @enderror" name="date_debut_conge" value="{{ old('date_debut_conge') }}" autofocus placeholder="Veillez entrer la date début du congé">
                        @error('date_debut_conge')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label for="">Date Fin :</label>
                      <input id="" type="date" class="form-control @error('date_fin_conge') is-invalid @enderror" name="date_fin_conge" value="{{ old('date_fin_conge') }}" autofocus placeholder="Veillez entrer la date fin du congé">
                      @error('date_fin_conge')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">

                    </div>
                  </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('conges.index') }}" class="btn btn-default btn-user btn-block">
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
