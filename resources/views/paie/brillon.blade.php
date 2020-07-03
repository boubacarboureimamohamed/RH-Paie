@extends('layouts.template')

@section('css')

  <!-- Multi-Step -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Editon d\'un nouveau bulletin de paie') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">

        <div class="">
            <!--multisteps-form-->
            <div class="multisteps-form">
                <!--progress bar-->
                <div class="row">
                <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                    <div class="multisteps-form__progress">
                    <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Etape 1 </button>
                    <button class="multisteps-form__progress-btn" type="button" title="Address">Etape 2 </button>
                    <button class="multisteps-form__progress-btn" type="button" title="Order Info">Etape 3 </button>
                    <button class="multisteps-form__progress-btn" type="button" title="Comments">Etape 4 </button>
                    </div>
                </div>
                </div>
                <!--form panels-->
                    <form class="multisteps-form__form" method="POST" action="{{ route('paie.store')  }}">
                         @csrf
                    <!--single form panel-->
                    <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                        <h3 class="multisteps-form__title" style="text-align: center;">Information Personnelle</h3>
                        <div class="multisteps-form__content">
                        <div class="form-row">
                            <div class="form-group col-6 col-sm-6">
                                <label for="">Matricule :</label>
                                <select class="multisteps-form__select form-control" onchange="change()" id="select" name="agent_id">
                                    <option selected="selected">****************Sélectionnez le matricule****************</option>
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->id }}" data-agent="{{ $agent->nom.' '.$agent->prenom }}" >
                                                {{ $agent->matricule }}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="inputEmail4">Nom et Prénom : </label>
                                <input class="multisteps-form__input form-control" id="agent" type="text" disabled name="" value="" placeholder="Veillez entrer le nom de l'agent"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Situation Matrimoniale :</label>
                                <input id="" type="text" class="form-control" name="" value="" disabled placeholder="Veillez entrer la situation matrimoniale">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Charge(s) Familiale(s) :</label>
                                <input id="nb_charges" type="number" class="form-control" name="" value="" disabled placeholder="Veillez entrer le nombre de charge">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Fonction :</label>
                              <input id="fonction" type="text" class="form-control" name="" value="" disabled placeholder="Veillez entrer la fonction">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Salaire De Base :</label>
                                <input id="salaire_de_base" type="text" class="form-control" name="" value="" disabled placeholder="Veillez entrer le salaire de base">
                            </div>
                        </div>
                        <div class="button-row d-flex mt-4">
                            <a href="{{ route('paie.index') }}" class="btn btn-primary js-btn-prev">
                                    Annuler
                            </a>
                            <button class="btn btn-primary ml-auto js-btn-next" type="button">Suivant</button>
                        </div>
                        </div>
                    </div>
                    <!--single form panel-->
                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                        <h3 class="multisteps-form__title" style="text-align: center;">Les bases imposables(Avantages, Indemnités et Primes)</h3>
                        <div class="multisteps-form__content">
                            <div class="dt-responsive table-responsive">
                                <table class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Libelle</th>
                                            <th>Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body">

                                    </tbody>
                                </table>
                            </div>
                            <div class="button-row d-flex mt-4">
                                <button class="btn btn-primary js-btn-prev" type="button">Précédent</button>
                                <button class="btn btn-primary ml-auto js-btn-next" type="button">Suivant</button>
                            </div>
                        </div>
                    </div>
                    <!--single form panel-->
                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                        <h3 class="multisteps-form__title" style="text-align: center;">Les déductions et retenues</h3>
                        <div class="multisteps-form__content">
                        <div class="form-row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Abattement pour charges de famille (En %) :</label>
                                <input id="abattement" type="number" class="form-control" name="" disabled value="" placeholder="Veillez entrer l'abattement en pourcentage">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Absence (Nombre de jour) :</label>
                                <input id="nb_absences" type="number" class="form-control" name="" disabled value="" placeholder="Veillez entrer le nombre de jour">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Abattement pour charge professionnelle (En %) :</label>
                                <input id="" type="number" class="form-control" name="" disabled value="15" placeholder="Veillez entrer l'abattement en pourcentage">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Retenue pour CNSS (En %) :</label>
                                <input id="" type="number" class="form-control" name="" disabled value="5.25" placeholder="Veillez entrer le montant pour CNSS">
                            </div>
                        </div>
                        <div class="row">
                            <div class="button-row d-flex mt-4 col-12">
                            <button class="btn btn-primary js-btn-prev" type="button">Précédent</button>
                            <button class="btn btn-primary ml-auto js-btn-next" type="button">Suivant</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!--single form panel-->
                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                        <h3 class="multisteps-form__title" style="text-align: center;">Calcul de salaire </h3>
                        <div class="multisteps-form__content">
                            <div class="form-row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Mois :</label>
                                    <input id="" type="month" class="form-control" name="mois" value="" placeholder="Veillez entrer le montant pour CNSS">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Date d'embauche :</label>
                                  <input id="date_embauche" type="date" class="form-control" name="" value="" disabled placeholder="Veillez entrer la date d'embauche">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Du :</label>
                                    <input id="" type="date" class="form-control" name="debut_mois" value="" placeholder="Veillez entrer le montant pour CNSS">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Au :</label>
                                    <input id="" type="date" class="form-control" name="fin_mois" value="" placeholder="Veillez entrer le montant de IUTS">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Net imposable :</label>
                                    <input id="total_base_imposables" type="number" disabled class="form-control" name="" value="" placeholder="Veillez entrer le net des bases imposables">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Net à payer :</label>
                                    <input id="netapayer" type="number" class="form-control" disabled name="net_a_payer" value="" placeholder="Veillez entrer le salaire net à payer">
                                </div>
                            </div>
                            <div class="button-row d-flex mt-4">
                                <button class="btn btn-primary js-btn-prev" type="button">Précédent</button>
                                <button class="btn btn-success ml-auto" type="submit">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

      </div>
    </div>

  </div>

</div>

@endsection

@section('js')

<!-- Multi-Step -->
<script src="{{ asset('js/script.js') }}"></script>
<script>

    function change(){

            let agent = $('#select option:selected').attr('data-agent')
            let agent_id = $('#select option:selected').val()
            $('#agent').val(agent)

            axios.get('/getData?agent_id='+agent_id)
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


                })
        }

</script>

@endsection
