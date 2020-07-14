@extends('layouts.template')

@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>Plus de détail sur le bulletin de paie de l'agent {{ $payroll->agent->nom }}</strong></h1>
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
                                        <th scope="row">Matricule </th>
                                        <td>{{ $payroll->agent->matricule }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nom </th>
                                        <td>{{ $payroll->agent->nom}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pénom </th>
                                        <td>{{ $payroll->agent->prenom}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Situation matrimoniale </th>
                                        <td>{{ $payroll->agent->situation_matrimoniale }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nombre de charge(s) </th>
                                        <td>{{ $nb_charges}}</td>
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
                                        <th scope="row">Paiement du mois </th>
                                        <td>{{ 'De'.' '.$payroll->mois->format('F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Période </th>
                                        <td>{{ 'Du'.' '.$payroll->debut_mois.' '.'Au'.' '.$payroll->fin_mois }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date d'embauche </th>
                                        <td>{{ $contrat->date_debut_contrat }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salaire de base </th>
                                        <td>{{ $contrat->salaire_base.' '.'Franc CFA' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salaire net à payer </th>
                                        <td>{{ $payroll->net_a_payer.' '.'Franc CFA' }}</td>
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

        <div class="col-lg-12">
            <div class="general-info">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <h5><strong for="">Les bases imposables (Avantages, Indemnités, Primes) :</strong></h5>
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Libellé </th>
                                        <th>Montant </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bases_imposables as $bases_imposable)
                                        <tr>
                                            <th>{{ $bases_imposable->avantage->libelle }}</th>
                                            <th>{{ $bases_imposable->montant.' '.'Franc CFA' }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end of table col-lg-12 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of general info -->
        </div>
        <!-- end of col-lg-12 -->

        <div style="text-align: center;">
            <div class="btn-group btn-group-sm">
                <a href="{{ route('paie.index') }}" class="btn btn-default" style="float: none;margin: 5px;">
                    <span class="fas fa-fw fa-arrow-left"></span>Retour
                </a>
            </div>

            <div class="btn-group btn-group-sm"">
                <a href="{{ route('print_payroll', $payroll->id) }}" class="btn btn-primary">
                    <span class="fas fa-fw fa-print"></span>Imprimer
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
