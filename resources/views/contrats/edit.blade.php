@extends('layouts.template')

@section('css')

@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>{{ ('Modification d\'un contrat') }}</strong></h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Border Left Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-3 border-left-primary">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10">
              <div class="p-5">
                <form class="user" method="POST" action="{{ route('contrats.update', $contrat) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                           <input id="name" type="text" class="form-control form-control-user" name="ref_contrat" value="{{ $contrat->ref_contrat }}" required autocomplete="name" placeholder="Veillez renseigner la référence du contrat">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select class="form-control form-control-user" value="{{ $contrat->agents_id }}" placeholder="Veillez entrer la référence du recrutement" name="agents_id" id="">
                                   <option value="">******Selectionner********</option>
                                @foreach ($agents as $agent)
                                   <option @if ($agent->id == $contrat->agents_id)
                                        {{ 'selected' }}
                                   @endif value="{{$agent->id}}">{{$agent->nom.' '.$agent->prenom}}</option>
                                @endforeach
                           </select>
                         </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input id="name" type="text" class="form-control form-control-user" name="description" value="{{ $contrat->description }}" required autocomplete="name" placeholder="Veillez saisir la description du contrat">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input id="" type="date" class="form-control form-control-user" name="date" value="{{ $contrat->date }}" autofocus placeholder="Veillez entrer la date du contrat">
                          </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input id="" type="date" class="form-control form-control-user" name="date_debut_contrat" value="{{ $contrat->date_debut_contrat }}" autofocus placeholder="Veillez entrer la date début du stage">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input id="" type="date" class="form-control form-control-user" name="date_fin_contrat" value="{{ $contrat->date_fin_contrat }}" autofocus placeholder="Veillez entrer la date fin du stage">
                          </div>
                      </div>
                  <hr>
                 <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-4">
                    <a href="{{ route('contrats.index') }}" class="btn btn-default btn-user btn-block">
                            {{ ('Annuler') }}
                    </a>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ ('Modifier') }}
                        </button>
                    </div>
                    <div class="col-lg-2">

                    </div>
                   </div>
                  <hr>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-1">

          </div>
      </div>
    </div>

  </div>

</div>

@endsection

@section('js')

@endsection
