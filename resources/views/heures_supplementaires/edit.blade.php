@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'une nouvelle heure supplémentaire') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form class="user" method="POST" action="{{ route('heures_supplementaires.update', $heure_supplementaire) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Matricule de l'agent :</label>
                        <select  name="agent_id" value="{{ old('agent_id') }}" data-toggle="tooltip" class="form-control @error('agent_id') is-invalid @enderror">
                          <option value="">***********************Selectionner***********************</option>
                          @foreach($agents as $agent)
                            <option @if($agent->id == $heure_supplementaire->agent_id) {{ 'selected' }} @endif data-agent="{{ $agent->nom.' '.$agent->prenom }}" value="{{  $agent->id   }}">
                                {{ $agent->matricule.' '.'-'.' '.$agent->nom.' '.$agent->prenom }}
                            </option>
                          @endforeach
                        </select>
                        @error('agent_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Mois:</label>
                        <input type="month" class="form-control" name="mois_heure_supp" value="{{ $heure_supplementaire->mois_heure_supp }}" @error('mois_heure_supp') is-invalid @enderror">
                        @error('mois_heure_supp')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Veuillez entrer le nombre d'heure supplémentaire :</label>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" class="form-control" name="nbr_heure" value="{{ $heure_supplementaire->nbr_heure }}" @error('nbr_heure') is-invalid @enderror" placeholder="Veuillez entrer le nombre d'heure supplémentaire">
                        @error('nbr_heure')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Veuillez cocher une majoration :</label>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="form-check form-check-inline">
                            <input style="width: 25px;height: 25px;" id="" checked class="form-check-input" type="radio" name="majoration" value="10" @if($heure_supplementaire->majoration == 10) {{ "checked" }} @endif>
                            <label for="">10% </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input style="width: 25px;height: 25px;" id="" class="form-check-input" type="radio" name="majoration" value="35" @if($heure_supplementaire->majoration == 35) {{ "checked" }} @endif>
                            <label for="">35% </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input style="width: 25px;height: 25px;" id="" class="form-check-input" type="radio" name="majoration" value="50" @if($heure_supplementaire->majoration == 50) {{ "checked" }} @endif>
                            <label for="">50% </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input style="width: 25px;height: 25px;" id="" class="form-check-input" type="radio" name="majoration" value="100" @if($heure_supplementaire->majoration == 100) {{ "checked" }} @endif>
                            <label for="">100% </label>
                        </div>
                    </div>
                  </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('heures_supplementaires.index') }}" class="btn btn-default btn-user btn-block">
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
