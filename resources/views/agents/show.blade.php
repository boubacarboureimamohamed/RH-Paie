@extends('layouts.template')

@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>Plus de détail sur l'agent {{ $agent->nom }}</strong></h1>
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
                                                <td>{{ $agent->matricule }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nom </th>
                                                <td>{{ $agent->nom }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pénom </th>
                                                <td>{{ $agent->prenom }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date de naissance </th>
                                                <td>{{ $agent->date_naiss }}</td>
                                            </tr>
                                            <tr>
                                                <th>Lieu de naissance </th>
                                                <td>{{ $agent->lieu_naiss }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nationalité </th>
                                                <td>{{ $agent->nationalite->nationalite }}</td>
                                            </tr>
                                            <tr>
                                                <th>Sexe </th>
                                                <td>{{ $agent->sexe }}</td>
                                            </tr>
                                            <tr>
                                                <th>Téléphone </th>
                                                <td>{{ $agent->telephone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email </th>
                                                <td>{{ $agent->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Adresse </th>
                                                <td>{{ $agent->adresse }}</td>
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
                                                <th scope="row">Référence du contrat </th>
                                                <td>{{ $contrat->ref_contrat }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Description du contrat </th>
                                                <td>
                                                    <a href="{{ asset($contrat->description) }}" class="btn btn-link">Visualiser</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Date d'embauche </th>
                                                <td>{{ $contrat->date_debut_contrat }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Date fin du contrat </th>
                                                <td>{{ $contrat->date_fin_contrat }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Salaire de base </th>
                                                <td>{{ $contrat->salaire_base.' '.'Franc CFA' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Titre de poste </th>
                                                <td>{{ $contrat->poste->intitule }}</td>
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
                        <a href="{{ route('agents.index') }}" class="btn btn-default" style="float: none;margin: 5px;">
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
