@extends('layouts.template')

@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Liste des abattements pour charges de famille') }}</strong></h1>
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
                    <th>Nombre De Charge</th>
                    <th>Taux</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($abattements as $abattement)
                 <tr>
                    <td><span> {{ $abattement->nombre_charge.' Charge(s)' }} </span></td>
                    <td><span> {{ $abattement->pourcentage.' %' }} </span></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#exampleModal1"
                        id="l{{ $abattement->id }}"
                        data-route="{{ route('modifabattement', $abattement->id) }}"
                        data-nombre_charge="{{ $abattement->nombre_charge }}"
                        data-pourcentage="{{ $abattement->pourcentage }}"
                        onclick="updateabattement('#l{{ $abattement->id }}')"
                        class="btn btn-warning">
                            <span class="fas fa-fw fa-edit"></span>
                        </a>
                   </td>
                    <td>
                        <form method="POST" action="{{ route('abattements.destroy', $abattement) }}" id="form{{ $abattement->id }}">

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="button" onclick="confirmation('#form{{ $abattement->id }}')" class="btn btn-danger" >
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
        <form method="POST" action="{{ route('abattements.store') }}">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="align:center;">Ajout d'une nouvelle indemnité</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nomre De Charge :</label>
                <input type="number" name="nombre_charge" class="form-control @error('nombre_charge') is-invalid @enderror">
                @error('nombre_charge')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Taux :</label>
                <input type="number" name="pourcentage" class="form-control @error('pourcentage') is-invalid @enderror">
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
        <form method="POST" id="idft">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1" style="align:center;">Modification d'une indemnité</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nomre De Charge :</label>
                <input type="number" name="nombre_charge" id="nombre_charge" class="form-control @error('nombre_charge') is-invalid @enderror">
                @error('nombre_charge')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Taux :</label>
                <input type="number" name="pourcentage" id="pourcentage" class="form-control @error('pourcentage') is-invalid @enderror">
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
        function updateabattement(abattement){
            $('#nombre_charge').val($(abattement).attr('data-nombre_charge'))
            $('#pourcentage').val($(abattement).attr('data-pourcentage'))
            $('#idft').attr('action',$(abattement).attr('data-route'))
                }
    </script>

@endsection
