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
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10">
              <div class="p-5">
                <form class="user" method="POST" action="{{ route('absences.store') }}">
                    @csrf
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select name="type_id" id="" class="form-control form-control-user" title="Veillez choisir le type d'absence">
                            @foreach ($typeabsences as $typeabsence)
                              <option value="{{ $typeabsence->id }}">{{ $typeabsence->type_absence }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select  name="agent_id" id="" title="Veillez choisir le matricule" value="" data-toggle="tooltip" class="form-control form-control-user">
                            <option value="">********Matricule********</option>
                        @foreach($agents as $agent)
                            <option value="{{  $agent->id   }}">
                                {{ $agent->matricule }}
                            </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date_debut_absence" value="" autofocus placeholder="Veillez entrer la date début de l'absence">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="date" class="form-control form-control-user" name="date_fin_absence" value="" autofocus placeholder="Veillez entrer la date fin de l'absence">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="motif_absence" value="" autofocus placeholder="Veillez entrer le motif de l'absence">
                    </div>
                  </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-4">
                    <a href="{{ route('absences.index') }}" class="btn btn-default btn-user btn-block">
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

@endsection
