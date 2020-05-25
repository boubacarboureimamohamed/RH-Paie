@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Ajout d\'un nouveau récrutement') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('recrutements.store') }}">
                    @csrf
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inputEmail4">Ref_Recrutement : </label>
                      <input id="" type="text" class="multisteps-form__input form-control" name="ref_recrutement" value="" required autocomplete="firstname" autofocus placeholder="Veillez entrer le nom">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputEmail4">Date Offre : </label>
                        <input id="" type="date" class="form-control" name="date_offre" value="" required autocomplete="email" placeholder="Veillez enter l'adresse mail s'il vous plaît!">
                    </div>
                  </div>
                  <div class="form-group">
                        <label for="inputEmail4">Description : </label>
                        <textarea class="form-control" type="text" name="description" id="" cols="5" rows="5" placeholder="Veillez entrer la description du recrutement"></textarea>
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
          <div class="col-lg-2">

          </div>
      </div>
    </div>

  </div>

</div>

@endsection

@section('js')

@endsection
