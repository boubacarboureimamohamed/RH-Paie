<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Contrat;
use App\Models\Poste;
use Illuminate\Http\Request;

class ContratsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();
        $contrats = Contrat::all();
        return view('contrats.index', compact('contrats', 'agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $postes = Poste::all();
        return view('contrats.create', compact('agents', 'postes'));
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

            'ref_contrat'=>'required',
            'description'=>'required',
            'agent_id'=>'required',
            'salaire_base'=>'required',
            'poste_id'=>'required',
            'date_debut_contrat'=>'required'

        ]);

        Contrat::create([

            'ref_contrat'=>$request->ref_contrat,
            'description'=>$request->description->storePublicly('Ref_contrat', ['disk' => 'public']),
            'date'=>date('Y-m-d H:i:s'),
            'agent_id'=>$request->agent_id,
            'salaire_base'=>$request->salaire_base,
            'poste_id'=>$request->poste_id,
            'date_debut_contrat'=>$request->date_debut_contrat,
            'date_fin_contrat'=>$request->date_fin_contrat

        ]);

        return redirect(route('contrats.index'))->with('success', 'L\'enregistrement a été effetué avec succés');
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
        $postes = Poste::all();
        $agents = Agent::all();
        $contrat = Contrat::find($id);
        return view('contrats.edit', compact('contrat', 'agents', 'postes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrat $contrat)
    {
        $this->validate($request, [

            'ref_contrat'=>'required',
            'description'=>'required',
            'agent_id'=>'required',
            'salaire_base'=>'required',
            'poste_id'=>'required',
            'date_debut_contrat'=>'required'

        ]);

        $contrat->update([

            'ref_contrat'=>$request->ref_contrat,
            'description'=>$request->description->storePublicly('Ref_contrat', ['disk' => 'public']),
            'date'=>date('Y-m-d H:i:s'),
            'agent_id'=>$request->agent_id,
            'salaire_base'=>$request->salaire_base,
            'poste_id'=>$request->poste_id,
            'date_debut_contrat'=>$request->date_debut_contrat,
            'date_fin_contrat'=>$request->date_fin_contrat

        ]);

        return redirect(route('contrats.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contrat::destroy($id);
        return redirect(route('contrats.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
