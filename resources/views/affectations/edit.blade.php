@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'une affectation') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('affectations.update', $affectation) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Matricule :</label>
                            <select  name="agent_id" onchange="change()" id="select" value="" data-toggle="tooltip" class="form-control">
                                <option value="">*************Selectionner*************</option>
                                @foreach ($agents as $agent)
                                    <option @if($agent->id == $affectation->agent_id) {{ 'selected' }} @endif data-agent="{{ $agent->nom.' '.$agent->prenom }}" value="{{  $agent->id   }}">
                                        {{ $agent->matricule }}
                                    </option>
                                @endforeach


                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Nom et Prénom</label>
                            <input type="text" name="" title="" disabled data-toggle="tooltip" value="" id="agent" class="form-control" placeholder=" ">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Service : </label>
                            <select  name="service_id" value="" data-toggle="tooltip" class="form-control">
                                <option value="">*************Selectionner*************</option>
                              @foreach($services as $service)
                                <option @if($service->id == $affectation->service_id) {{ 'selected' }} @endif value="{{  $service->id   }}">
                                    {{ $service->libelle }}
                                </option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Fonction : </label>
                            <select  name="poste_id" value="" data-toggle="tooltip" class="form-control">
                                <option value="">*************Selectionner*************</option>
                              @foreach($postes as $poste)
                                <option @if($poste->id == $affectation->poste_id) {{ 'selected' }} @endif value="{{  $poste->id   }}">
                                    {{ $poste->intitule }}
                                </option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for="">Date Affectation</label>
                          <input id="" type="date" class="form-control" name="date_affectation" value="{{ $affectation->date_affectation }}" autofocus placeholder="Veillez entrer la date de la formation">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">

                        </div>
                      </div>
                      <hr>
                    <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('affectations.index') }}" class="btn btn-default btn-user btn-block">
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

    $(function(){
        change()
    })


</script>
@endsection
