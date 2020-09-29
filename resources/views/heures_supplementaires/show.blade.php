@extends('layouts.template')

@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Les heures supplémentaires de l\'agent') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">

        <div class="form-row">
            <div class="form-group col-12 col-sm-6">
                <label for="inputEmail4">Matricule : </label>
                <input type="text" name="" value="{{ $agt->agent->matricule }}" id="" class="form-control" disabled>
            </div>
            <div class="form-group col-12 col-sm-6">
                <label for="inputEmail4">Nom et Prénom : </label>
                <input class="form-control" value="{{ $agt->agent->nom.' '.$agt->agent->prenom }}" id="" type="text" disabled name=""/>
            </div>
        </div>

        <div class="dt-responsive table-responsive">
            <table id="table" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th>Nombre d'heure</th>
                    <th>Montant horaire</th>
                    <th>Majoration</th>
                    <th>Montant total</th>
                    <th>Mois </th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($heures_supp_agnts as $heures_supp_agnt)
                 <tr>
                    <td><span> {{ $heures_supp_agnt->nbr_heure.' '.'heures(s)' }} </span></td>
                    <td><span> {{ $heures_supp_agnt->montant_horaire.' Franc CFA' }} </span></td>
                    <td><span> {{ $heures_supp_agnt->majoration.' '.'%' }} </span></td>
                    <td><span> {{ $heures_supp_agnt->montant_heure_supp.' Franc CFA' }} </span></td>
                    <td><span> {{ $heures_supp_agnt->mois_heure_supp->format('F Y')}} </span></td>
                    <td>
                        <a href="{{ route('heures_supplementaires.edit', $heures_supp_agnt) }}" class="btn btn-warning">
                            <span class="fas fa-fw fa-edit"></span>
                        </a>
                   </td>
                    <td>
                        <form method="POST" action="{{ route('heures_supplementaires.destroy', $heures_supp_agnt) }}" id="form{{ $heures_supp_agnt->id }}">

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="button" onclick="confirmation('#form{{ $heures_supp_agnt->id }}')" class="btn btn-danger" >
                                <span class="fas fa-fw fa-trash"></span>
                            </button>
                        </form>
                   </td>
                </tr>
                 @endforeach
            </tbody>
            </table>
            <div class="btn-group btn-group-sm" style="position: relative; left: 945px">
                <a href="{{ route('heures_supplementaires.index') }}" class="btn btn-primary" style="float: none;margin: 5px;">
                    <span class="fas fa-fw fa-arrow-left"></span>Retour
                </a>
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

    <script>

         function confirmation(target)
            {
                swal({
                    title: "Êtes-vous sûr ???",
                    text: "Une fois supprimé, vous ne pourrez plus récupérer cet enregistrement! ",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText:'Oui',
                    cancelButtonText:'Non'

                }).then(function() {
                    $(target).submit();
                });
            }

        </script>

@endsection
