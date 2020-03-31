@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'une formation') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('formations.update', $formation) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                     <select name="agents_id" id="" class="form-control form-control-user">
                          @foreach ($agents as $agent)
                            <option @if($agent->id == $formation->agents_id)
                                {{ 'selected' }}
                                @endif value="{{ $agent->id }}">{{ $agent->nom.' '.$agent->prenom }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select name="type_formations_id" id="" class="form-control form-control-user">
                            @foreach ($typeformations as $typeformation)
                              <option @if($typeformation->id == $formation->formations_id)
                                {{ 'selected' }}
                                @endif value="{{ $typeformation->id }}">{{ $typeformation->type_formation }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date_debut_formation" value="{{ $formation->date_debut_formation }}" autofocus placeholder="Veillez entrer la date début de la formation">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="date" class="form-control form-control-user" name="date_fin_formation" value="{{ $formation->date_fin_formation }}" autofocus placeholder="Veillez entrer la date fin de la formation">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="" type="text" class="form-control form-control-user" name="lieu" value="{{ $formation->lieu }}" autofocus placeholder="Veillez entrer le lieu de la formation">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="date" class="form-control form-control-user" name="date" value="{{ $formation->date }}" autofocus placeholder="Veillez entrer la date de la formation">
                    </div>
                  </div>
                  <div class="form-group">
                    <input id="" type="text" class="form-control form-control-user" name="bilan_formation" value="{{ $formation->bilan_formation }}" autofocus placeholder="Veillez entrer le bilan de la formation">
                 </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-4">
                    <a href="{{ route('formations.index') }}" class="btn btn-default btn-user btn-block">
                            {{ ('Annuler') }}
                    </a>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ ('Modifier') }}
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
