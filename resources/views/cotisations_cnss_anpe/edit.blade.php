@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'une cotisation ANPE & CNSS') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form class="user" method="POST" action="{{ route('cotisations_cnss_anpe.update', $cotisation) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Taux ANPE :</label>
                            <input id="" type="text" class="form-control @error('taux_anpe') is-invalid @enderror" name="taux_anpe" value="{{ $cotisation->taux_anpe }}" placeholder="Veillez entrer le taux de l'ANPE">
                            @error('taux_anpe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="inputEmail4">Plafond ANPE : </label>
                            <input id="" type="number" class="form-control @error('plafond_anpe') is-invalid @enderror" name="plafond_anpe" value="{{ $cotisation->plafond_anpe }}" autofocus placeholder="Veillez entrer le plafond de l'ANPE">
                            @error('plafond_anpe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Taux CNSS employé :</label>
                            <input id="" type="text" class="form-control @error('taux_cnss_employe') is-invalid @enderror" name="taux_cnss_employe" value="{{ $cotisation->taux_cnss_employe }}" placeholder="Veillez entrer le taux CNSS de l'employé">
                            @error('taux_cnss_employe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="inputEmail4">Plafond CNSS employé : </label>
                            <input id="" type="number" class="form-control @error('plafond_cnss_employe') is-invalid @enderror" name="plafond_cnss_employe" value="{{ $cotisation->plafond_cnss_employe }}" autofocus placeholder="Veillez entrer le plafond CNSS de l'employé">
                            @error('plafond_cnss_employe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Taux CNSS employeur :</label>
                            <input id="" type="text" class="form-control @error('taux_cnss_employeur') is-invalid @enderror" name="taux_cnss_employeur" value="{{ $cotisation->taux_cnss_employeur }}" placeholder="Veillez entrer le taux CNSS de l'employeur">
                            @error('taux_cnss_employeur')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="inputEmail4">Plafond CNSS employeur : </label>
                            <input id="" type="number" class="form-control @error('plafond_cnss_employeur') is-invalid @enderror" name="plafond_cnss_employeur" value="{{ $cotisation->plafond_cnss_employeur }}" autofocus placeholder="Veillez entrer le plafond CNSS de l'employeur">
                            @error('plafond_cnss_employeur')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                    <a href="{{ route('cotisations_cnss_anpe.index') }}" class="btn btn-default btn-user btn-block">
                            {{ ('Annuler') }}
                    </a>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ ('Modifier') }}
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

@endsection
