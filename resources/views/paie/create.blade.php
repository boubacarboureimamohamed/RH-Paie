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
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Editon d\'un nouveau bulletin de paie') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Border Left Utilities -->
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-3">
                            <form class="user" method="POST" action="{{ route('paie.store')  }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Mois :</label>
                                        <input id="" type="month" class="form-control" name="mois" value="" placeholder="">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Du :</label>
                                        <input id="" type="date" class="form-control" name="debut_mois" value="" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Au :</label>
                                        <input id="" type="date" class="form-control" name="fin_mois" value="" placeholder="">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Veillez sélectionner les agents :</label>
                                        <select id='custom-headers' class="form-control searchable" name="agent_id[]" multiple='multiple'>
                                            @foreach ($agents as $agent)
                                                <option value='{{ $agent->id }}'>{{ $agent->matricule.' - '.$agent->nom.' '.$agent->prenom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3">

                                    </div>
                                <div class="col-lg-3">
                                    <a href="{{ route('paie.index') }}" class="btn btn-default btn-user btn-block">
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
