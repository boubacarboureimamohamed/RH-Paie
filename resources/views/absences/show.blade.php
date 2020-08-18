@extends('layouts.template')

@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>Plus de détail sur l'absence de {{ $absence->agent->nom }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">

        <div class="col-lg-12">
            <div class="general-info">
                <div class="row">
                    <div class="col-lg-12 col-xl-6">
                        <h5><strong for="">Informations personnelles :</strong></h5>
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap">
                                <tbody>
                                    <tr>
                                        <th>Matricule </th>
                                        <td>{{ $absence->agent->matricule }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nom </th>
                                        <td>{{ $absence->agent->nom }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pénom </th>
                                        <td>{{ $absence->agent->prenom }}</td>
                                    </tr>
                                    <tr>
                                        <th>Salaire Mensuel </th>
                                        <td>{{ $contrat->salaire_base.' '.'Franc CFA' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end of table col-lg-6 -->
                    <div class="col-lg-12 col-xl-6">
                        <h5><strong for="">Autres informations :</strong></h5>
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap">
                                <tbody>
                                    <tr>
                                        <th scope="row">Absence du mois </th>
                                        <td>{{ 'De'.' '.$absence->mois_absence->format('F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Période d'absence </th>
                                        <td>{{ $absence->nombre_jour.' '.'jour(s)' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Type d'absence </th>
                                        <td>{{ $absence->type_absence->type_absence}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Montant à prélevé </th>
                                        <td>{{ $absence->montant_a_prelever.' '.'Franc CFA'}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end of table col-lg-6 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of general info -->
        </div>
        <!-- end of col-lg-12 -->

        <div style="text-align: right;">
            <div class="btn-group btn-group-sm">
                <a href="{{ route('absences.index') }}" class="btn btn-default" style="float: none;margin: 5px;">
                    <span class="fas fa-fw fa-arrow-left"></span>Retour
                </a>
            </div>
        </div>

    </div>
    <!-- end of row -->
</div>
<!-- end of general info -->
</div>
<!-- end of col-lg-12 -->

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
