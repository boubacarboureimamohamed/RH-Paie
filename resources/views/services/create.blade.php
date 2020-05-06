@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Ajout d\'un nouveau service') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <form class="user" method="POST" action="{{ route('services.store') }}">
                    @csrf
                  <div class="form-group">
                    <input id="name" type="text" class="form-control form-control-user" name="libelle" value="" required autocomplete="name" placeholder="Veillez renseigner le nom de la direction">
                  </div>
                  <div class="form-group">
                      <select name="direction_id" id="" class="form-control form-control-user">
                          @foreach ($directions as $direction)
                            <option value="{{ $direction->id }}">{{ $direction->libelle }}</option>
                          @endforeach
                      </select>
                  </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-4">
                    <a href="{{ route('services.index') }}" class="btn btn-default btn-user btn-block">
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
          <div class="col-lg-3">

          </div>
      </div>
    </div>

  </div>

</div>

@endsection

@section('js')

@endsection
