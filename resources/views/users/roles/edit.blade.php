@extends('layouts.template')

@section('css')
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/scss/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/multiselect/css/multi-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/css/select2.min.css') }}">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Mofication d\'un rôle') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('roles.update', $role) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Rôle :</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" required autocomplete="name" placeholder="Veillez renseigner le nom du rôle ">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Veillez choisir les permissions :</label>
                        <select id='custom-headers' class="searchable @error('permissions') is-invalid @enderror" name="permissions[]" multiple='multiple'>
                            @foreach ($permissions as $permission)
                                <option @if (in_array($permission->id, $role->permissions->pluck('id')->toArray()))
                                    selected
                                @endif value='{{ $permission->id }}'>
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('permissions')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                 <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('roles.index') }}" class="btn btn-default btn-user btn-block">
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
    <!-- Multiselect js -->
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap-multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/multiselect/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/multiselect/js/jquery.quicksearch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/select2/js/select2-custom.js') }}"></script>
@endsection
