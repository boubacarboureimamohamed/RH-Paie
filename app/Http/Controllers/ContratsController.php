<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Contrat;
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
        return view('contrats.create', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Contrat::create([

            'ref_contrat'=>$request->ref_contrat,
            'description'=>$request->description,
            'date'=>$request->date,
            'agents_id'=>$request->agents_id,
            'date_debut_contrat'=>$request->date_debut_contrat,
            'date_fin_contrat'=>$request->date_fin_contrat

        ]);

        return redirect(route('contrats.index'));
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
        $agents = Agent::all();
        $contrat = Contrat::find($id);
        return view('contrats.edit', compact('contrat', 'agents'));
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
        $contrat->update([

            'ref_contrat'=>$request->ref_contrat,
            'description'=>$request->description,
            'date'=>$request->date,
            'agents_id'=>$request->agents_id,
            'date_debut_contrat'=>$request->date_debut_contrat,
            'date_fin_contrat'=>$request->date_fin_contrat

        ]);

        return redirect(route('contrats.index'));
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
        return redirect(route('contrats.index'));
    }
}
