@extends('layouts.template')

@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Liste des rôles') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="btn-group btn-group-sm">
               <a href="{{ route('roles.create') }}" class="btn btn-success" style="float: none;margin: 5px;">
                   <span class="fas fa-fw fa-plus"></span>
               </a>
        </div>
        <div class="dt-responsive table-responsive">
            <table id="table" class="table table-striped table-bordered nowrap">
            <thead>
            <tr>
            <th>Rôle</th>
            <th>Permissions</th>
            <th>Modifier</th>
            <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr>
            <td>{{ $role->name }}</span></td>
            <td>
                @foreach ($role->permissions as $permission)
                    <span class="badge badge-primary badge-pill">
                        {{  $permission->name }}
                    </span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">
                    <span class="fas fa-fw fa-edit"></span>
                </a>
            </td>
            <td>
                <form method="POST" action="{{ route('roles.destroy', $role) }}" id="form{{ $role->id }}">

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="button" onclick="confirmation('#form{{ $role->id }}')" class="btn btn-danger" >
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
