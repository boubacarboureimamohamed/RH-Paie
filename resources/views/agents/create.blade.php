@extends('layouts.template')

@section('css')

  <!-- Multi-Step -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Ajout d\'un nouveau employé') }}</strong></h1>
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
                    <form class="multisteps-form__form" method="POST" action="{{ route('agents.store') }}">
                         @csrf
                    <!--single form panel-->
                    <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                        <h3 class="multisteps-form__title" style="text-align: center;">Information Personnelle</h3>
                        <div class="multisteps-form__content">
                        <div class="form-row">
                            <div class="form-group col-6 col-sm-6">
                            <label for="inputEmail4">Nom : </label>
                            <input class="multisteps-form__input form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="" placeholder="Veillez entrer le nom de lagent"/>
                            @error('nom')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group col-12 col-sm-6">
                            <label for="inputEmail4">Prénom : </label>
                            <input class="multisteps-form__input form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" value="" placeholder="Veillez entrer le prénom de lagent"/>
                            @error('prenom')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-sm-6">
                            <label for="inputEmail4">Date Naissance : </label>
                            <input class="multisteps-form__input form-control @error('date_naiss') is-invalid @enderror" type="date" name="date_naiss" value="" placeholder="Veillez entrer la date de naissance"/>
                            @error('date_naiss')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="inputEmail4">Lieu Naissance : </label>
                                <input class="multisteps-form__input form-control @error('lieu_naiss') is-invalid @enderror" type="text" name="lieu_naiss" value="" placeholder="Veillez entrer le lieu de naissance"/>
                                @error('lieu_naiss')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-sm-6">
                                <label for="inputEmail4">Nationalité : </label>
                                <input class="multisteps-form__input form-control @error('nationalite') is-invalid @enderror" type="text" name="nationalite" value="" placeholder="Veillez entrer la nationnalité de lagent"/>
                                @error('nationalite')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="inputEmail4">Sexe : </label>
                                <select class="multisteps-form__input form-control @error('sexe') is-invalid @enderror" placeholder="Veillez entrer la référence du recrutement" name="sexe" id="">
                                    <option value="HOMME">HOMME</option>
                                    <option value="FEMME">FEMME</option>
                                </select>
                                @error('sexe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="button-row d-flex mt-4">
                            <a href="{{ route('agents.index') }}" class="btn btn-primary js-btn-prev">
                                    Annuler
                            </a>
                            <button class="btn btn-primary ml-auto js-btn-next" type="button">Suivant</button>
                        </div>
                        </div>
                    </div>
                    <!--single form panel-->
                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                        <h3 class="multisteps-form__title" style="text-align: center;">Autre Information</h3>
                        <div class="multisteps-form__content">
                            <div class="form-row">
                            <div class="form-group col-6 col-sm-6">
                                <label for="inputEmail4">Téléphone : </label>
                                <input class="multisteps-form__input form-control @error('telephone') is-invalid @enderror" type="text" name="telephone" value="" placeholder="Veillez entrer le numéro de téléphone"/>
                                @error('telephone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="inputEmail4">Email : </label>
                                <input class="multisteps-form__input form-control @error('email') is-invalid @enderror" type="email" name="email" value="" placeholder="Veillez entrer ladresse mail"/>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-12 col-sm-6">
                                <label for="inputEmail4">Adresse : </label>
                                <input class="multisteps-form__input form-control @error('adresse') is-invalid @enderror" type="text" name="adresse" value="" placeholder="Veillez entrer ladresse de lagent"/>
                                @error('adresse')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="inputEmail4">Occupation : </label>
                                <input class="multisteps-form__input form-control @error('fonction') is-invalid @enderror" type="text" name="fonction" value="" autofocus placeholder="Veillez entrer la fonction de lagent"/>
                                @error('fonction')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-12 col-sm-6">
                                <label for="inputEmail4">Matricule : </label>
                                <input class="multisteps-form__input form-control @error('matricule') is-invalid @enderror" type="text" name="matricule" value="" placeholder="Veillez entrer le matricule"/>
                                @error('matricule')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="inputEmail4">Situation matrimoniale : </label>
                                <select class="multisteps-form__input form-control @error('situation_matrimoniale') is-invalid @enderror" placeholder="Veillez sélectionner la situation matrimoniale" name="situation_matrimoniale" id="">
                                    <option value="Célibataire">Célibataire</option>
                                    <option value="Divorcé(e)">Divorcé(e)</option>
                                    <option value="Marié(e)">Marié(e)</option>
                                    <option value="Veuf(ve)">Veuf(ve)</option>
                                </select>
                                @error('situation_matrimoniale')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                        <div class="button-row d-flex mt-4">
                            <button class="btn btn-primary js-btn-prev" type="button">Précédent</button>
                            <button class="btn btn-primary ml-auto js-btn-next" type="button">Suivant</button>
                        </div>
                        </div>
                    </div>
                    <!--single form panel-->
                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                        <h3 class="multisteps-form__title" style="text-align: center;">Cursus </h3>
                        <div class="multisteps-form__content">
                        <div class="row">
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
                                        <td style="text-align: center"><a href="#" class="btn btn-danger remove"><i class="fas fa-fw fa-minus"></i></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <h3 class="multisteps-form__title" style="text-align: center;">Charge </h3>
                        <div class="multisteps-form__content">
                        <table id="example-2" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Type Charge</th>
                                    <th>Nom</th>
                                    <th>prénom</th>
                                    <th>Date Naissance</th>
                                    <th>Lieu Naissance</th>
                                    <th>Nationalité</th>
                                    <th>Sexe</th>
                                    <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne1"><i class="fas fa-fw fa-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody id="ligne1">
                                <tr>
                                    <td>
                                        <div class="">
                                            <div class="form-group form-primary">
                                                <div class="input-group">
                                                    <select class="multisteps-form__select form-control" name="type_charge_id[]">
                                                        <option value="">***Sélectionnez***</option>
                                                            @foreach ($typecharges as $typecharge)
                                                        <option value="{{ $typecharge->id }}">{{ $typecharge->type_charge }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <div class="form-group form-primary">
                                                <div class="input-group">
                                                    <input type="text" name="nomc[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Nom">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <div class="form-group form-primary">
                                                <div class="input-group">
                                                    <input type="text" name="prenomc[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Prénom">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <div class="form-group form-primary">
                                                <div class="input-group">
                                                    <input type="date" name="date_naissc[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Date Naissance">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <div class="form-group form-primary">
                                                <div class="input-group">
                                                    <input type="text" name="lieu_naissc[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Lieu Naissance">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <div class="form-group form-primary">
                                                <div class="input-group">
                                                    <input type="text" name="nationalitec[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Natinalité">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <div class="form-group form-primary">
                                                <div class="input-group">
                                                    <select class="multisteps-form__input form-control" placeholder="Veillez entrer la référence du recrutement" name="sexec[]" id="">
                                                           <option value="HOMME">HOMME</option>
                                                           <option value="FEMME">FEMME</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align: center"><a href="#" class="btn btn-danger remove1"><i class="fas fa-fw fa-minus"></i></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="button-row d-flex mt-4">
                            <button class="btn btn-primary js-btn-prev" type="button">Précédent</button>
                            <button class="btn btn-success ml-auto" type="submit">Valider</button>
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

</script>

<script>

    $('#addLigne1').on('click', function (f) {
      f.preventDefault()
        addLigne1();
    });
    function addLigne1() {
        var tr = `<tr>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <select class="multisteps-form__select form-control" name="type_charge_id[]">
                                <option selected="selected">***Sélectionnez***</option>
                                    @foreach ($typecharges as $typecharge)
                                    <option value="{{ $typecharge->id }}">{{ $typecharge->type_charge }}</option>
                                    @endforeach
                             </select>
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="nomc[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Nom">
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="prenomc[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Prénom">
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="date" name="date_naissc[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Date Naissance">
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="lieu_naissc[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Lieu Naissance">
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="nationalitec[]" title="" data-toggle="tooltip" value="" id="" class="form-control" placeholder="Nationalité">
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <select class="multisteps-form__input form-control" value="" placeholder="Veillez entrer la référence du recrutement" name="sexec[]" id="">
                                    <option value="HOMME">HOMME</option>
                                    <option value="FEMME">FEMME</option>
                            </select>
                        </div>
                    </div>
                </div>
            </td>

            <td style="text-align: center"><a href="#" class="btn btn-danger remove1"><i class="fas fa-fw fa-minus"></i></a></td>
            </tr>`;
        $('#ligne1').append(tr);
    };
    $('#ligne1').on('click', '.remove1', function () {
        $(this).parent().parent().remove();
    })

</script>

@endsection
