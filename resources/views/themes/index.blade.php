@extends('layouts.template')

@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Liste des thèmes') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="btn-group btn-group-sm">
               <a href="{{ route('themes.create') }}" class="btn btn-success" style="float: none;margin: 5px;">
                   <span class="fas fa-fw fa-plus"></span>
               </a>
        </div>
        <div class="dt-responsive table-responsive">
            <table id="dataTable" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Intitulé</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($themes as $theme)
                 <tr>
                    <td><span> {{ $theme->id }} </span></td>
                    <td><span> {{ $theme->intitule }} </span></td>
                    <td>
                        <a href="{{ route('themes.edit', $theme) }}" class="btn btn-warning">
                            <span class="fas fa-fw fa-edit"></span>
                        </a>
                   </td>
                    <td>
                        <form method="POST" action="{{ route('themes.destroy', $theme) }}" id="" onsubmit="return confirm('Voulez-vous supprimer cet enregistrement?');">

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger" >
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
@endsection
