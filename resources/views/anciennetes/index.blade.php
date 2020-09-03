@extends('layouts.template')

@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Les anciennetées en pourcentage') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="btn-group btn-group-sm">
            <a href="" class="btn btn-success" style="float: none;margin: 5px;" data-toggle="modal" data-target="#exampleModal">
                <span class="fas fa-fw fa-plus"></span>
            </a>
        </div>
        <div class="dt-responsive table-responsive">
            <table id="table" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th>Année</th>
                    <th>Porcentage</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($anciennetes as $anciennete)
                 <tr>
                    <td><span> {{ $anciennete->annee.' '.'ans' }} </span></td>
                    <td><span> {{ $anciennete->pourcentage.' '.'%' }} </span></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#exampleModal1"
                        id="l{{ $anciennete->id }}"
                        data-route="{{ route('modifanciennete', $anciennete->id) }}"
                        data-annee="{{ $anciennete->annee }}"
                        data-pourcentage="{{ $anciennete->pourcentage }}"
                        onclick="updateanciennete('#l{{ $anciennete->id }}')"
                        class="btn btn-warning">
                            <span class="fas fa-fw fa-edit"></span>
                        </a>
                   </td>
                    <td>
                        <form method="POST" action="{{ route('anciennetes.destroy', $anciennete) }}" id="form{{ $anciennete->id }}">

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="button" onclick="confirmation('#form{{ $anciennete->id }}')" class="btn btn-danger" >
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{ route('anciennetes.store') }}">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="align:center;">Ajout d'une anciennetée</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Année :</label>
                <input type="number" name="annee" class="form-control @error('annee') is-invalid @enderror">
                @error('annee')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Pourcentage :</label>
                <input type="text" name="pourcentage" class="form-control @error('pourcentage') is-invalid @enderror">
                @error('pourcentage')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post" id="idfts">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1" style="align:center;">Modification d'une anciennetée</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Année :</label>
                <input type="number" name="annee" class="form-control @error('annee') is-invalid @enderror" id="annee">
                @error('annee')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Pourcentage :</label>
                <input type="text" name="pourcentage" class="form-control @error('pourcentage') is-invalid @enderror" id="pourcentage">
                @error('pourcentage')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
        </form>
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
    <script>
        function updateanciennete(anciennete){

            $('#annee').val($(anciennete).attr('data-annee'))
            $('#pourcentage').val($(anciennete).attr('data-pourcentage'))
            $('#idfts').attr('action', $(anciennete).attr('data-route'))
                }
    </script>

@endsection
