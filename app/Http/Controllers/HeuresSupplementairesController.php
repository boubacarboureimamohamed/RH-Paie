<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Contrat;
use App\Models\HeuresSupplementaire;
use App\Models\VolumeHoraire;
use Illuminate\Http\Request;

class HeuresSupplementairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heures_supplementaires = Agent::has('heuresSupplementaires')->get();

        return view('heures_supplementaires.index', compact('heures_supplementaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::has('contrats')->get();
        return view('heures_supplementaires.create', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'agent_id'=>'required',
            'mois_heure_supp'=>'required',
            'nbr_heure'=>'required',
            'majoration'=>'required'

        ]);


        $x = 0;
        $horaire_supp = 0;
        $salaire_mensuel = 0;
        $salaire_horaire = 0;
        $montant_heure_supp = 0;
        $agent = $request->agent_id;
        $nb_hs = $request->nbr_heure;
        $majoration = $request->majoration;

        $volume_horaires = VolumeHoraire::all();
        $contrat = Contrat::where('agent_id', '=', $agent)->orderByDesc('date_debut_contrat')->first();
        $salaire_mensuel = $contrat->salaire_base;

        foreach ($volume_horaires as $volume_horaire)
            {
                if($volume_horaire->nbr_heure == 40)
                    {
                        $x = $volume_horaire->nbr_heure;
                    }
                $horaire_supp = $x;
            }
        $salaire_horaire = $salaire_mensuel / $horaire_supp;

        $montant_heure_supp = (($salaire_horaire + (($salaire_horaire * $majoration) / 100)) * $nb_hs);

        //dd($agent, $salaire_mensuel, $horaire_supp, $nb_hs, $salaire_horaire, $majoration, $montant_heure_supp);

        $heure_supp  = HeuresSupplementaire::create([

            'agent_id'=>$request->agent_id,
            'mois_heure_supp'=>$request->mois_heure_supp.'-01',
            'nbr_heure'=>$request->nbr_heure,
            'majoration'=>$request->majoration,
            'montant_horaire'=>$salaire_horaire,
            'montant_heure_supp'=>$montant_heure_supp
        ]);

        return redirect(route('heures_supplementaires.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agents = Agent::has('contrats')->get();
        $heure_supplementaire = HeuresSupplementaire::with('agent')->find($id);
        return view('heures_supplementaires.edit', compact('agents', 'heure_supplementaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

        'agent_id'=>'required',
        'mois_heure_supp'=>'required',
        'nbr_heure'=>'required',
        'majoration'=>'required'

    ]);

    $heure_supplementaire = HeuresSupplementaire::find($id);

    $x = 0;
    $horaire_supp = 0;
    $salaire_mensuel = 0;
    $salaire_horaire = 0;
    $montant_heure_supp = 0;
    $agent = $request->agent_id;
    $nb_hs = $request->nbr_heure;
    $majoration = $request->majoration;

    $volume_horaires = VolumeHoraire::all();
    $contrat = Contrat::where('agent_id', '=', $agent)->orderByDesc('date_debut_contrat')->first();
    $salaire_mensuel = $contrat->salaire_base;

    foreach ($volume_horaires as $volume_horaire)
        {
            if($volume_horaire->nbr_heure == 40)
                {
                    $x = $volume_horaire->nbr_heure;
                }
            $horaire_supp = $x;
        }
    $salaire_horaire = $salaire_mensuel / $horaire_supp;

    $montant_heure_supp = (($salaire_horaire + (($salaire_horaire * $majoration) / 100)) * $nb_hs);

    //dd($agent, $salaire_mensuel, $horaire_supp, $nb_hs, $salaire_horaire, $majoration, $montant_heure_supp);

    $heure_supplementaire->update([

        'agent_id'=>$request->agent_id,
        'mois_heure_supp'=>$request->mois_heure_supp.'-01',
        'nbr_heure'=>$request->nbr_heure,
        'majoration'=>$request->majoration,
        'montant_horaire'=>$salaire_horaire,
        'montant_heure_supp'=>$montant_heure_supp
    ]);

    return redirect(route('heures_supplementaires.index'))->with('success', 'La modification a été effetué avec succés');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HeuresSupplementaire::destroy($id);
        return redirect(route('heures_supplementaires.index'))->with('success', 'La suppression a été effetué avec succés');
    }

    public function heuresSuppAgent($id)
    {
        $agent = Agent::find($id);
        $heures_supp_agnts = HeuresSupplementaire::where('agent_id', $agent->id)->get();
        $agt = HeuresSupplementaire::where('agent_id', $agent->id)->first();
        return view('heures_supplementaires.show', compact('agent', 'heures_supp_agnts', 'agt'));
    }
}
