@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'un nouveau récrutement') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('recrutements.update', $recrutement) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input id="" type="text" class="form-control form-control-user" name="ref_recrutement" value="{{ $recrutement->ref_recrutement }}" required autocomplete="" autofocus placeholder="Veillez entrer le nom">
                    </div>
                    <div class="col-sm-6">
                        <input id="" type="text" class="form-control form-control-user" name="description" value="{{ $recrutement->description }}" required autocomplete="" autofocus placeholder="Veillez entrer le prénom">
                    </div>
                  </div>
                  <div class="form-group">
                    <input id="" type="date" class="form-control form-control-user" name="date_offre" value="{{ $recrutement->date_offre }}" required autocomplete="" placeholder="Veillez enter l'adresse mail s'il vous plaît!">
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('recrutements.index') }}" class="btn btn-default btn-user btn-block">
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
          <div class="col-lg-2">

          </div>
      </div>
    </div>

  </div>

</div>

@endsection

@section('js')

@endsection
