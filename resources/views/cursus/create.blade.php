@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Ajout d\'un nouveau cursus') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <form class="user" method="POST" action="{{ route('cursus.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12 col-sm-6">
                            <label for="inputEmail4">Matricule : </label>
                            <select class="form-control @error('agent_id') is-invalid @enderror" onchange="change()" id="select" name="agent_id">
                                <option selected="selected">***Sélectionnez***</option>
                                    @foreach ($agents as $agent)
                                <option data-agent="{{ $agent->nom.' '.$agent->prenom }}" value="{{ $agent->id }}">{{ $agent->matricule }}</option>
                                    @endforeach
                            </select>
                            @error('agent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label for="inputEmail4">Nom et Prénom : </label>
                            <input class="multisteps-form__input form-control" id="agent" type="text" disabled name="" value="" placeholder="Veillez entrer le nom de lagent"/>
                        </div>
                    </div>
                    <table id="example-2" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Ecole / Institut</th>
                                <th>Date Début</th>
                                <th>Date Fin</th>
                                <th>Diplôme / Certificat</th>
                                <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne"><i class="fas fa-fw fa-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody id="ligne">
                            <tr>
                                <td>
                                    <div class="">
                                        <div class="form-group form-primary">
                                            <div class="input-group">
                                                <input type="text" name="ecole[]" title="" data-toggle="tooltip" value="" id="" class="form-control @error('ecole') is-invalid @enderror" placeholder="Ecole / Institut">
                                                @error('ecole')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <div class="form-group form-primary">
                                            <div class="input-group">
                                                <input type="date" name="date_debut[]" title="" data-toggle="tooltip" value="" id="" class="form-control @error('date_debut') is-invalid @enderror" placeholder="Date Début">
                                                @error('date_debut')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <div class="form-group form-primary">
                                            <div class="input-group">
                                                <input type="date" name="date_fin[]" title="" data-toggle="tooltip" value="" id="" class="form-control @error('date_fin') is-invalid @enderror" placeholder="Date Fin">
                                                @error('date_fin')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <div class="form-group form-primary">
                                            <div class="input-group">
                                                <input type="text" name="diplome[]" title="" data-toggle="tooltip" value="" id="" class="form-control @error('diplome') is-invalid @enderror" placeholder="Diplôme / Certificat">
                                                @error('diplome')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: center"><a href="#" class="btn btn-danger remove"><i class="fas fa-fw fa-minus"></i></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>

                    <div class="row">
                        <div class="col-lg-3">

                        </div>
                    <div class="col-lg-3">
                        <a href="{{ route('cursus.index') }}" class="btn btn-default btn-user btn-block">
                                {{ ('Annuler') }}
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ ('Enregistrer') }}
                        </button>
                    </div>
                        <div class="col-lg-3">

                        </div>
                   </div>
                  <hr>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>

  </div>

</div>

@endsection

@section('js')
<script>

    $('#addLigne').on('click', function (f) {
      f.preventDefault()
        addLigne();
    });
    function addLigne() {
        var tr = `<tr>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="ecole[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Ecole / Institut">
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="date" name="date_debut[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Date Début">
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="date" name="date_fin[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Date Fin">
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="diplome[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Diplôme / Certificat">
                        </div>
                    </div>
                </div>
            </td>

            <td style="text-align: center"><a href="#" class="btn btn-danger remove"><i class="fas fa-fw fa-minus"></i></a></td>
            </tr>`;
        $('#ligne').append(tr);
    };
    $('#ligne').on('click', '.remove', function () {
        $(this).parent().parent().remove();
    })

    function change() {
       let agent = $('#select option:selected').attr('data-agent')
       $('#agent').val(agent)
    }

</script>
@endsection
