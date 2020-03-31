@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'une mission') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
              <div class="p-5">
                <form class="user" method="POST" action="{{ route('missions.update', $mission) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="" type="text" class="form-control form-control-user" name="ref_mission" value="{{ $mission->ref_mission }}" autofocus placeholder="Veillez entrer la référence de la mission">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                     <select name="agents_id" id="" class="form-control form-control-user">
                          @foreach ($agents as $agent)
                            <option @if($agent->id == $mission->agents_id)
                                {{ 'selected' }}
                                @endif value="{{ $agent->id }}">{{ $agent->nom.' '.$agent->prenom }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="name" type="text" class="form-control form-control-user" name="ordre_mission" value="{{ $mission->ordre_mission }}" required autocomplete="name" placeholder="Veillez saisir l'ordre du mission">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="motif_mission" value="{{ $mission->motif_mission }}" autofocus placeholder="Veillez entrer le motif de la mission">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date_debut_mission" value="{{ $mission->date_debut_mission }}" autofocus placeholder="Veillez entrer le nom de l'agent">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="date" class="form-control form-control-user" name="date_fin_mission" value="{{ $mission->date_fin_mission }}" autofocus placeholder="Veillez entrer le prénom de l'agent">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="iteneraire" value="{{ $mission->iteneraire }}" autofocus placeholder="Veillez entrer l'iténeraire de la mission">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date" value="{{ $mission->date }}" autofocus placeholder="Veillez entrer la date de la mission">
                    </div>
                  </div>
                  <div class="form-group">
                    <input id="" type="text" class="form-control form-control-user" name="bilan_mission" value="{{ $mission->bilan_mission }}" autofocus placeholder="Veillez entrer le bilan de la mission">
                 </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-4">
                    <a href="{{ route('missions.index') }}" class="btn btn-default btn-user btn-block">
                            {{ ('Annuler') }}
                    </a>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ ('modifier') }}
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
          <div class="col-lg-2">

          </div>
      </div>
    </div>

  </div>

</div>

@endsection

@section('js')

@endsection
