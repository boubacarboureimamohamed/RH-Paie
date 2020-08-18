<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Agent;
use App\Models\Contrat;
use App\Models\TypeAbsence;
use App\Models\VolumeHoraire;
use Illuminate\Http\Request;

class AbsencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absences = Absence::with('agent')->get();
        return view('absences.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::has('contrats')->get();
        $type_absences = TypeAbsence::all();
        return view('absences.create', compact('agents', 'type_absences'));
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
            'nombre_jour'=>'required|numeric',
            'motif_absence'=>'required',
            'mois_absence'=>'required',
            'type_absence_id'=>'required'

        ]);

        $x = 0;
        $y = 0;
        $z = 0;
        $mois = 30;
        $horaire_mensuel = 0;
        $salaire_horaire = 0;
        $montant_a_prelever = 0;
        $agent = $request->agent_id;
        $absence = $request->type_absence_id;
        $nbr_absence = $request->nombre_jour;

        $volume_horaires = VolumeHoraire::all();
        $contrat = Contrat::where('agent_id', '=', $agent)->orderByDesc('date_debut_contrat')->first();
        $salaire_mensuel = $contrat->salaire_base;

        foreach ($volume_horaires as $volume_horaire)
            {
                if($volume_horaire->nbr_heure == 173.33)
                    {
                        $x = $volume_horaire->nbr_heure;
                    }
                $horaire_mensuel = $x;
            }
        $salaire_horaire = $salaire_mensuel / $horaire_mensuel;

        if($absence == 2)
            {
                $y = ($nbr_absence * $horaire_mensuel) / ($mois);
            }
        $z = $y;
        $montant_a_prelever = $z * $salaire_horaire;

        //dd($agent, $salaire_mensuel, $horaire_mensuel, $salaire_horaire, $nbr_absence, $montant_a_prelever);

        $absence  = Absence::create([

            'agent_id'=>$request->agent_id,
            'nombre_jour'=>$request->nombre_jour,
            'motif_absence'=>$request->motif_absence,
            'mois_absence'=>$request->mois_absence.'-01',
            'montant_a_prelever'=>$montant_a_prelever,
            'type_absence_id'=>$request->type_absence_id

        ]);

        return redirect(route('absences.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showAbsence($id)
    {
        $absence = Absence::find($id);
        $contrat = Contrat::where('agent_id', '=', $absence->agent_id)->orderByDesc('date_debut_contrat')->first();
        return view('absences.show', compact('absence', 'contrat'));

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
        $absence = Absence::with('agent')->find($id);
        $type_absences = TypeAbsence::all();
        return view('absences.edit', compact('agents', 'absence', 'type_absences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absence $absence)
    {
        $this->validate($request, [

            'agent_id'=>'required',
            'nombre_jour'=>'required|numeric',
            'motif_absence'=>'required',
            'mois_absence'=>'required',
            'type_absence_id'=>'required'

        ]);

        $absence->update([

            'agent_id'=>$request->agent_id,
            'nombre_jour'=>$request->nombre_jour,
            'motif_absence'=>$request->motif_absence,
            'mois_absence'=>$request->mois_absence.'-01',
            'montant_a_prelever'=>$request->montant_a_prelever,
            'type_absence_id'=>$request->type_absence_id

        ]);

        return redirect(route('absences.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absence::destroy($id);
        return redirect(route('absences.index'))->with('success', 'La suppression a été effetué avec succés');
    }
}
