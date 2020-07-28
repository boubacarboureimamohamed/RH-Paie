@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Clôture des paiements d\'un mois') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form class="user" method="POST" action="{{ route('clotures_mensuelles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for="">Veillez entrer le mois : </label>
                        <input id="mois_cloture" type="month" class="form-control @error('mois_cloture') is-invalid @enderror" name="mois_cloture" value="" placeholder="Veillez entrer le mois">
                        @error('mois_cloture')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Date du clôture : </label>
                        <input id="" type="" class="form-control" name="date_cloture" disabled value="{{ $dateCloture->toDateTimeString() }}" placeholder="Veillez entrer la date du clôture">
                        <input id="" type="" class="form-control" hidden name="date_cloture" value="{{ $dateCloture->toDateTimeString() }}" placeholder="Veillez entrer la date du clôture">
                        <input id="" type="text" class="form-control" hidden name="payroll_id[]" value="" placeholder="Veillez entrer les bulletins de paie">
                    </div>
                    </div>
                    <label for="">Les paiements du mois de  : </label>
                    <div class="dt-responsive table-responsive">
                        <table class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom et Prénom</th>
                                    <th>Salaire Net</th>
                                </tr>
                            </thead>
                            <tbody id="b_paie">

                            </tbody>
                        </table>
                    </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('clotures_mensuelles.index') }}" class="btn btn-default btn-user btn-block">
                            {{ ('Annuler') }}
                    </a>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ ('Clôturer') }}
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

@endsection

@section('js')

<script>


    $(document).ready(function () {

    let mois_cloture = $('#mois_cloture').val();
        $('#mois_cloture').on('change', function(arg){
        let mois_cloture = $('#mois_cloture').val();
            axios.get('/getData?mois_cloture='+mois_cloture)
            .then(function(response) {
                console.log(response)

            response.data.payrolls.forEach(element => {
                    $('#b_paie').append(
                        `<tr>
                            <td>${element.agent.matricule}</td>
                            <td>${element.agent.nom} ${element.agent.prenom}</td>
                            <td>${element.net_a_payer} Franc CFA</td>
                        </tr>`)
                    });
        });
        });

    });




   /*  axios.get('/getData?agent_id='+agent_id)
            .then(function(response) {
                    console.log(response)
                    if(response.data.nb_absences.nombre_jour == 0)
                        {
                            $('#nb_absences').val(0);
                        }
                    if(response.data.nb_absences.nombre_jour != 0)
                        {
                        $('#nb_absences').val(response.data.nb_absences.nombre_jour);
                        }
                    $('#nb_charges').val(response.data.nb_charges)
                    $('#salaire_de_base').val(response.data.contrat.salaire_base)
                    $('#date_embauche').val(response.data.contrat.date_debut_contrat)
                    $('#fonction').val(response.data.contrat.poste.intitule)
                    var p_af = 0;
                    response.data.abattements.forEach(element => {
                        if(response.data.nb_charges == element.nombre_charge)
                            {
                                $('#abattement').val(element.pourcentage);
                                p_af = element.pourcentage;
                            }
                        });
                    var af = 0;
                    var ap = 0;
                    var rni = 0;
                    var rbg = 0;
                    var rbgi = 0;
                    var cnss = 0;
                    var somme = 0;
                    var sb_somme = 0;
                    response.data.base_imposables.forEach(element => {
                        $('#body').append(
                            `<tr>
                                <td>${element.avantage.libelle}</td>
                                <td>${element.montant} Franc CFA</td>
                            </tr>`)
                            somme = somme + element.montant;
                        });
                        $('#total_base_imposables').val(somme)
                            sb_somme = somme + response.data.contrat.salaire_base;
                            cnss = (sb_somme * 5.25) / 100;
                            rbg = sb_somme - cnss;
                            ap = (rbg * 15) / 100;
                            rbgi = rbg - ap;
                            af = (rbgi * p_af) / 100;
                            rni = rbgi - af;
                        $('#netapayer').val(rni)
                }) */

    </script>

@endsection
