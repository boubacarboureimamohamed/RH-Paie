<?php

namespace App\Http\Controllers;

use App\Models\AffectationAvantage;
use App\Models\Agent;
use App\Models\Avantage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AffectationAvantagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $affectationAvantages = DB::select("SELECT distinct a.matricule, a.nom, a.prenom, a.id as id FROM agents a, affectation_avantages av WHERE a.id = av.agent_id"); */

        $affectationAvantages = Agent::has('affectationAvantages')->get();

        return view('affectationAvantages.index', compact('affectationAvantages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $avantages = Avantage::all();
        return view('affectationAvantages.create', compact('agents', 'avantages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($var=0; $var < count($request->avantage_id); $var++)
         {

            $affectationAvantage = AffectationAvantage::create([

                'avantage_id'=>$request->avantage_id[$var],
                'montant'=>$request->montant[$var],
                'agent_id'=>$request->agent_id

                 ]);

        }

    return redirect(route('affectationAvantages.index'))->with('success', 'L\'enregistrement a été effetué avec succés');


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
        $affectationAvantage = AffectationAvantage::find($id);
        $avantages = Avantage::all();
        return view('affectationAvantages.edit', compact('affectationAvantage', 'avantages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AffectationAvantage $affectationAvantage)
    {
        $agent = $request->agent_id;
        $affectationAvantage->update([

            'avantage_id'=>$request->avantage_id,
            'montant'=>$request->montant,
            'agent_id'=>$agent

        ]);

        return redirect(route('affectationAvantages.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AffectationAvantage::destroy($id);
        return redirect(route('affectationAvantages.index'))->with('success', 'La suppression a été effetué avec succés');

    }
    public function avantageAgent($id)
    {
        $agent = Agent::find($id);
        $avntg_agnts = AffectationAvantage::where('agent_id', $agent->id)->get();
        $agt = AffectationAvantage::where('agent_id', $agent->id)->first();
        return view('affectationAvantages.show', compact('agent', 'avntg_agnts', 'agt'));
    }
}
