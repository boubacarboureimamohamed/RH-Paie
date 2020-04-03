@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Ajout d\'une nouvelle affectation') }}</strong></h1>
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
              <div class="p-5">
                <form class="user" method="POST" action="{{ route('affectations.store') }}">
                    @csrf
                  <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <select  name="agent_id[]" onchange="change(1)" id="select1" title="sélectionner le matricule" value="" data-toggle="tooltip" class="form-control">
                            <option value="">********Matricule********</option>
                        @foreach($agents as $agent)
                            <option data-agent="{{ $agent->nom.' '.$agent->prenom }}" value="{{  $agent->id   }}">
                                {{ $agent->matricule }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        <input type="text" name="" title="" disabled data-toggle="tooltip" value="" id="agent1" class="form-control" placeholder=" ">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="bilan_formation" value="" autofocus placeholder="Veillez entrer le bilan de la formation">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date" value="" autofocus placeholder="Veillez entrer la date de la formation">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date_debut_formation" value="" autofocus placeholder="Veillez entrer la date début de la formation">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="date" class="form-control form-control-user" name="date_fin_formation" value="" autofocus placeholder="Veillez entrer la date fin de la formation">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="bilan_formation" value="" autofocus placeholder="Veillez entrer le bilan de la formation">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date" value="" autofocus placeholder="Veillez entrer la date de la formation">
                    </div>
                  </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-4">
                    <a href="{{ route('affectations.index') }}" class="btn btn-default btn-user btn-block">
                            {{ ('Annuler') }}
                    </a>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ ('Enregistrer') }}
                        </button>
                    </div>
                    <div class="col-lg-2">

                    </div>
                   </div>
                  <hr>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-1">

          </div>
      </div>
    </div>

  </div>

</div>

@endsection

@section('js')

<script>

    var count = 1;
    function change(ligne_id) {
       let agent = $('#select'+ligne_id+' option:selected').attr('data-agent')
       $('#agent'+ligne_id).val(agent)
    }
</script>

@endsection
