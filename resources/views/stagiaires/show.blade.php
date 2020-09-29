@extends('layouts.template')

@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>Plus de détail sur le stagiaire {{ $stagiaire->nom }}</strong></h1>
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
                                                <th>Nom </th>
                                                <td>{{ $stagiaire->nom }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pénom </th>
                                                <td>{{ $stagiaire->prenom }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date de naissance </th>
                                                <td>{{ $stagiaire->date_naiss }}</td>
                                            </tr>
                                            <tr>
                                                <th>Lieu de naissance </th>
                                                <td>{{ $stagiaire->lieu_naiss }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nationalité </th>
                                                <td>{{ $stagiaire->nationalite->nationalite }}</td>
                                            </tr>
                                            <tr>
                                                <th>Sexe </th>
                                                <td>{{ $stagiaire->sexe }}</td>
                                            </tr>
                                            <tr>
                                                <th>Téléphone </th>
                                                <td>{{ $stagiaire->telephone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email </th>
                                                <td>{{ $stagiaire->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Adresse </th>
                                                <td>{{ $stagiaire->adresse }}</td>
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
                                                <th scope="row">Date début du stage </th>
                                                <td>{{ $stagiaire->date_debut_stage }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Date fin du stage </th>
                                                <td>{{ $stagiaire->date_fin_stage }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Thème </th>
                                                <td>{{ $stagiaire->theme->intitule }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Service </th>
                                                <td>{{ $stagiaire->service->libelle }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Direction </th>
                                                <td>{{ $stagiaire->service->direction->libelle }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Département </th>
                                                <td>{{ $stagiaire->service->direction->departement->libelle }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Forfait mensuel </th>
                                                <td>{{ $stagiaire->forfait_mensuel.' '.'Franc CFA' }}</td>
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
                        <a href="{{ route('stagiaires.index') }}" class="btn btn-default" style="float: none;margin: 5px;">
                            <span class="fas fa-fw fa-arrow-left"></span>Retour
                        </a>
                    </div>
                </div>

            </div>
        </div>
  </div>
<!-- end of col-lg-12 -->

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
