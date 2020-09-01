@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'une absence') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form class="user" method="POST" action="{{ route('absences.update', $absence) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Type d'absence :</label>
                        <select  name="type_absence_id" value="{{ old('type_absence_id') }}" class="form-control @error('type_absence_id') is-invalid @enderror">
                            <option value="">***********************Selectionner***********************</option>
                          @foreach($type_absences as $type_absence)
                            <option @if($type_absence->id == $absence->type_absence_id) {{ 'selected' }} @endif value="{{  $type_absence->id   }}">
                                {{ $type_absence->type_absence }}
                            </option>
                          @endforeach
                        </select>
                        @error('type_absence_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Matricule :</label>
                        <select  name="agent_id" onchange="change()" id="select" data-toggle="tooltip" class="form-control @error('agent_id') is-invalid @enderror">
                            <option value="">***********************Selectionner***********************</option>
                            @foreach($agents as $agent)
                            <option @if($agent->id == $absence->agent_id) {{ 'selected' }} @endif data-agent="{{ $agent->nom.' '.$agent->prenom }}" value="{{  $agent->id   }}">
                                {{ $agent->matricule.' '.'-'.' '.$agent->nom.' '.$agent->prenom }}
                            </option>
                          @endforeach
                        </select>
                        @error('agent_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Période de :</label>
                        <input id="" type="date" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ $absence->date_debut }}" autofocus placeholder="Veillez entrer le nombre de jour d'absence">
                        @error('date_debut')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Au :</label>
                        <input type="date" name="date_fin" class="form-control @error('date_fin') is-invalid @enderror" value="{{ $absence->date_fin }}">
                        @error('date_fin')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="">Motif de l'absence :</label>
                        <textarea name="motif_absence" class="form-control @error('motif_absence') is-invalid @enderror" value="{{ old('motif_absence') }}" id="" cols="10" rows="1" placeholder="Veillez entrer le motif de l'absence">{{ $absence->motif_absence }}</textarea>
                        @error('motif_absence')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="form-check form-check-inline">
                            <input style="width: 25px;height: 25px;" id="" class="form-check-input" type="radio" name="paiement_absence" value="1" @if($absence->paiement_absence == 1) {{ "checked" }} @endif>
                            <label for="">Absence Payée </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input style="width: 25px;height: 25px;" id="" class="form-check-input" type="radio" name="paiement_absence" value="0" @if($absence->paiement_absence == 0) {{ "checked" }} @endif>
                            <label for="">Absence Non Payée </label>
                        </div>
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
<script>

    function change() {
       let agent = $('#select option:selected').attr('data-agent')
       $('#agent').val(agent)
    }

    $(function(){
        change()
    })

</script>
@endsection
