@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'une mission') }}</strong></h1>
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
                <form class="user" method="POST" action="{{ route('missions.update', $mission) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Ref_Mission :</label>
                          <input id="" type="text" class="form-control" name="ref_mission" value="{{ $mission->ref_mission }}" autofocus placeholder="Veillez entrer la référence de la mission">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Ordre Mission :</label>
                            <input id="name" type="text" class="form-control" name="ordre_mission" value="{{ $mission->ordre_mission }}" required autocomplete="name" placeholder="Veillez saisir l'ordre du mission">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Motif :</label>
                            <input id="" type="text" class="form-control" name="motif_mission" value="{{ $mission->motif_mission }}" autofocus placeholder="Veillez entrer le motif de la mission">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Iténéraire</label>
                            <input id="" type="text" class="form-control" name="iteneraire" value="{{ $mission->iteneraire }}" autofocus placeholder="Veillez entrer l'iténeraire de la mission">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Date Début :</label>
                          <input id="" type="date" class="form-control" name="date_debut_mission" value="{{ $mission->date_debut_mission }}" autofocus placeholder="Veillez entrer le nom de l'agent">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Date Fin :</label>
                            <input id="" type="date" class="form-control" name="date_fin_mission" value="{{ $mission->date_fin_mission }}" autofocus placeholder="Veillez entrer le prénom de l'agent">
                          </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Bilan :</label>
                          <input id="" type="text" class="form-control" name="bilan_mission" value="{{ $mission->bilan_mission }}" autofocus placeholder="Veillez entrer le bilan de la mission">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Date :</label>
                          <input id="" type="date" class="form-control" name="date" value="{{ $mission->date }}" autofocus placeholder="Veillez entrer la date de la mission">
                        </div>
                      </div>
                     <table id="example-2" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom et Prénom</th>
                                <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne"><i class="fas fa-fw fa-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody id="ligne">
                            <tr>
                                <td>
                                    <div class="col-sm-10">
                                        <div class="form-group form-primary">
                                            <div class="input-group">
                                                <select  name="agent_id[]" onchange="change(1)" id="select1" title="sélectionner le matricule" value="" data-toggle="tooltip" class="form-control">
                                                        <option value="">********Matricule********</option>
                                                    @foreach($agents as $agent)
                                                        <option data-agent="{{ $agent->nom.' '.$agent->prenom }}" value="{{  $agent->id   }}">
                                                            {{ $agent->matricule }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                <div class="col-sm-12">
                                    <div class="form-group form-primary">
                                        <div class="input-group">
                                            <input type="text" name="" title="" disabled data-toggle="tooltip" value="" id="agent1" class="form-control" placeholder=" ">
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
                        <a href="{{ route('missions.index') }}" class="btn btn-default btn-user btn-block">
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

    var count = 1;

    $('#addLigne').on('click', function (f) {
      f.preventDefault()
        addLigne();
    });
    function addLigne() {
        count++;
        var tr = '<tr>'+
            '<td>'+
                '<div class="col-sm-10">'+
                    '<div class="form-group form-primary">'+
                        '<div class="input-group">'+
                            '<select id="select'+count+'" onchange="change('+count+')" name="agent_id[]" class="form-control">'+
                                    '<option value="">********Matricule********</option>'+
                                '@foreach($agents as $agent)'+
                                    '<option data-agent="{{ $agent->nom.' '.$agent->prenom }}" value="{{ $agent->id }}">'+
                                    '   {{ $agent->matricule }}'+
                                    '</option>'+
                                '@endforeach'+
                            '</select>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</td>'+
            '<td>' +
                '<div class="col-sm-12">'+
                    '<div class="form-group form-primary">'+
                        '<div class="input-group">'+
                            '<input type="text" name="" id="agent'+count+'" disabled class="form-control" placeholder=""value="">'+
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</td>' +
            '<td style="text-align: center"><a href="#" class="btn btn-danger remove"><i class="fas fa-fw fa-minus"></i></a></td>'+
            '</tr>';
        $('#ligne').append(tr);
    };
    $('#ligne').on('click', '.remove', function () {
        $(this).parent().parent().remove();
    })

    function change(ligne_id) {
       let agent = $('#select'+ligne_id+' option:selected').attr('data-agent')
       $('#agent'+ligne_id).val(agent)
    }
</script>

@endsection
