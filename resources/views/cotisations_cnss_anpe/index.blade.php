@extends('layouts.template')

@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Les taux ANPE et CNSS') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="btn-group btn-group-sm">
            <a href="{{ route('cotisations_cnss_anpe.create') }}" class="btn btn-success" style="float: none;margin: 5px;">
                <span class="fas fa-fw fa-plus"></span>
            </a>
        </div>
        <div class="dt-responsive table-responsive">
            <table id="table" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th>Taux ANPE</th>
                    <th>Plafond ANPE</th>
                    <th>Taux CNSS employeur</th>
                    <th>Plafond CNSS employeur</th>
                    <th>Taux CNSS employé national</th>
                    <th>Plafond CNSS employé national</th>
                    <th>Taux CNSS employé expatrié</th>
                    <th>Plafond CNSS employé expatrié</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($cotisations as $cotisation)
                 <tr>
                    <td>{{ $cotisation->taux_anpe.' '.'%' }}</td>
                    <td>{{ $cotisation->plafond_anpe.' '.'Franc CFA' }}</td>
                    <td>{{ $cotisation->taux_cnss_employeur.' '.'%' }}</td>
                    <td>{{ $cotisation->plafond_cnss_employeur.' '.'Franc CFA' }}</td>
                    <td>{{ $cotisation->taux_cnss_employe_national.' '.'%' }}</td>
                    <td>{{ $cotisation->plafond_cnss_employe_national.' '.'Franc CFA' }}</td>
                    <td>{{ $cotisation->taux_cnss_employe_expatrie.' '.'%' }}</td>
                    <td>{{ $cotisation->plafond_cnss_employe_expatrie.' '.'Franc CFA' }}</td>
                    <td>
                        <a href="{{ route('cotisations_cnss_anpe.edit', $cotisation) }}" class="btn btn-primary">
                            <span class="fas fa-fw fa-edit"></span>
                        </a>
                   </td>
                    <td>
                        <form method="POST" action="{{ route('cotisations_cnss_anpe.destroy', $cotisation) }}" id="form{{ $cotisation->id }}">

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="button" onclick="confirmation('#form{{ $cotisation->id }}')" class="btn btn-danger" >
                                <span class="fas fa-fw fa-trash"></span>
                            </button>
                        </form>
                   </td>
                </tr>
                 @endforeach
            </tbody>
            </table>
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
