@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Clôture des paiements d\'un mois') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form class="user" method="POST" action="{{ route('clotures_mensuelles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for="">Veillez entrer le mois : </label>
                        <input id="" type="month" class="form-control @error('mois_cloture') is-invalid @enderror" name="mois_cloture" value="" placeholder="Veillez entrer le mois">
                        @error('mois_cloture')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Date du clôture : </label>
                        <input id="" type="" class="form-control" name="date_cloture" disabled value="{{ $dateCloture->toDateTimeString() }}" placeholder="Veillez entrer la date du clôture">
                        <input id="" type="" class="form-control" hidden name="date_cloture" value="{{ $dateCloture->toDateTimeString() }}" placeholder="Veillez entrer la date du clôture">
                      </div>
                    </div>
                    <hr>
                    <div class="dt-responsive table-responsive">
                        <table id="table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom et Prénom</th>
                                <th>Mois</th>
                                <th>Salaire Net</th>
                            </tr>
                        </thead>
                        <tbody>
                             <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('clotures_mensuelles.index') }}" class="btn btn-default btn-user btn-block">
                            {{ ('Annuler') }}
                    </a>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ ('Clôturer') }}
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

@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
 <!-- Page level custom scripts -->
 <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

<script>


    $(document).ready(function () {

    $('#table').DataTable({

    language: {

        url: "{{ asset('vendor/datatables/French.json') }}"

    }

    });

    });

    </script>

@endsection
