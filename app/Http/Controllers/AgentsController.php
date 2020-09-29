<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Charge;
use App\Models\Contrat;
use App\Models\Cursu;
use App\Models\Nationalite;
use App\Models\Poste;
use App\Models\TypeCharge;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::with('contrats')->get();
        //dd($agents);
        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postes = Poste::all();
        $contrats = Contrat::all();
        $typecharges = TypeCharge::all();
        $nationalites = Nationalite::all();
        return view('agents.create', compact('postes', 'contrats', 'typecharges', 'nationalites'));
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

            'matricule'=>'required',
            'nom'=>'required',
            'prenom'=>'required',
            'date_naiss'=>'required',
            'lieu_naiss'=>'required',
            'telephone'=>'required|numeric',
            'email'=>'required',
            'nationalite_id'=>'required',
            'adresse'=>'required',
            'sexe'=>'required',
            'fonction'=>'required',
            'situation_matrimoniale'=>'required'

        ]);

        $agent = Agent::create([
            'matricule'=>$request->matricule,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'date_naiss'=>$request->date_naiss,
            'lieu_naiss'=>$request->lieu_naiss,
            'telephone'=>$request->telephone,
            'email'=>$request->email,
            'nationalite_id'=>$request->nationalite_id,
            'adresse'=>$request->adresse,
            'sexe'=>$request->sexe,
            'fonction'=>$request->fonction,
            'situation_matrimoniale'=>$request->situation_matrimoniale
        ]);

        for($var=0; $var < count($request->ecole); $var++)
         {

            $cursu = Cursu::create([
                'ecole'=>$request->ecole[$var],
                'date_debut'=>$request->date_debut[$var],
                'date_fin'=>$request->date_fin[$var],
                'diplome'=>$request->diplome[$var],
                'agent_id'=>$agent->id


        ]);

         }

         for($varr=0; $varr < count($request->nomc); $varr++)
          {

            $charge = Charge::create([
                'nomc'=>$request->nomc[$varr],
                'prenomc'=>$request->prenomc[$varr],
                'date_naissc'=>$request->date_naissc[$varr],
                'lieu_naissc'=>$request->lieu_naissc[$varr],
                'nationalitec'=>$request->nationalitec[$varr],
                'sexec'=>$request->sexec[$varr],
                'type_charge_id'=>$request->type_charge_id[$varr],
                'agent_id'=>$agent->id


        ]);


    }

        return redirect(route('agents.index'))->with('success', 'L\'enregistrement a été effetué avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAgent($id)
    {
        $agent = Agent::find($id);
        $contrat = Contrat::where('agent_id', '=', $agent->id)->orderByDesc('date_debut_contrat')->first();
        return view('agents.show', compact('agent', 'contrat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
        $nationalites = Nationalite::all();
        return view('agents.edit', compact('agent', 'nationalites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        $this->validate($request, [

            'matricule'=>'required',
            'nom'=>'required',
            'prenom'=>'required',
            'date_naiss'=>'required',
            'lieu_naiss'=>'required',
            'telephone'=>'required|numeric',
            'email'=>'required',
            'nationalite_id'=>'required',
            'adresse'=>'required',
            'sexe'=>'required',
            'fonction'=>'required',
            'situation_matrimoniale'=>'required'

        ]);

        $agent->update([

            'matricule'=>$request->matricule,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'date_naiss'=>$request->date_naiss,
            'lieu_naiss'=>$request->lieu_naiss,
            'telephone'=>$request->telephone,
            'email'=>$request->email,
            'nationalite_id'=>$request->nationalite_id,
            'adresse'=>$request->adresse,
            'sexe'=>$request->sexe,
            'fonction'=>$request->fonction,
            'situation_matrimoniale'=>$request->situation_matrimoniale

        ]);

        return redirect(route('agents.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::destroy($id);
        return redirect(route('agents.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
