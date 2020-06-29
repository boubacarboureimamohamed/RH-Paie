<?php

namespace App\Http\Controllers;

use App\Models\Abattement;
use App\Models\Absence;
use App\Models\AffectationAvantage;
use App\Models\Agent;
use App\Models\Charge;
use App\Models\Contrat;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payrolls = Payroll::with('agent');
        return view('paie.index', compact('payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::has('contrats')->get();
        return view('paie.create', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bulletin_paie = Payroll::create([
            'mois'=>$request->mois,
            'debut_mois'=>$request->debut_mois,
            'fin_mois'=>$request->fin_mois,
            'net_a_payer'=>$request->net_a_payer,
            'agent_id'=>$request->agent_id,
        ]);

        return redirect(route('paie.index'))->with('success', 'L\'enregistrement a été effetué avec succés');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getData(Request $request)
    {
        $agent_id = $request->agent_id;
        $abattements = Abattement::all();
        $nb_absences = Absence::where('agent_id', '=', $agent_id)->orderByDesc('created_at')->first();
        $contrat = Contrat::where('agent_id', '=', $agent_id)->with('poste')->orderByDesc('date_debut_contrat')->first();
        $nb_charges = Charge::where('agent_id', '=', $agent_id)->count();
        $base_imposables = AffectationAvantage::where('agent_id', '=', $agent_id)->with('avantage')->get();

        if($nb_absences == null)
        {
            $nb_absences = new \stdClass();
            $nb_absences->nombre_jour = 0;
        }

        return json_encode([
            'agent_id' => $agent_id,
            'contrat' => $contrat,
            'abattements' => $abattements,
            'nb_absences' => $nb_absences,
            'nb_charges' => $nb_charges,
            'base_imposables' => $base_imposables

            ]);
    }
}
