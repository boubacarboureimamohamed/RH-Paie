@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Ajout d\'une nouvelle absence') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form class="user" method="POST" action="{{ route('absences.store') }}">
                    @csrf
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Matricule :</label>
                        <select  name="agent_id" onchange="change()" id="select" value="{{ old('agent_id') }}" data-toggle="tooltip" class="form-control @error('agent_id') is-invalid @enderror">
                          <option value="">***********************Selectionner***********************</option>
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
                        <label for="">Nom et Prénom :</label>
                        <input type="text" name="" title="" disabled data-toggle="tooltip" value="" id="agent" class="form-control" placeholder=" ">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Nombre de jour :</label>
                      <input id="" type="number" class="form-control @error('nombre_jour') is-invalid @enderror" name="nombre_jour" value="{{ old('nombre_jour') }}" autofocus placeholder="Veillez entrer le nombre de jour d'absence">
                      @error('nombre_jour')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Mois :</label>
                        <input type="month" name="mois_absence" class="form-control @error('mois_absence') is-invalid @enderror" value="{{ old('motif_absence') }}">
                        @error('mois_absence')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Type d'absence :</label>
                        <select  name="type_absence_id" value="{{ old('type_absence_id') }}" class="form-control @error('type_absence_id') is-invalid @enderror">
                            <option value="">***********************Selectionner***********************</option>
                          @foreach($type_absences as $type_absence)
                            <option value="{{  $type_absence->id   }}">
                                {{ $type_absence->type_absence }}
                            </option>
                          @endforeach
                        </select>
                        @error('type_absence_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Motif :</label>
                        <textarea name="motif_absence" class="form-control @error('motif_absence') is-invalid @enderror" value="{{ old('motif_absence') }}" id="" cols="10" rows="1" placeholder="Veillez entrer le motif de l'absence"></textarea>
                        @error('motif_absence')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('absences.index') }}" class="btn btn-default btn-user btn-block">
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
