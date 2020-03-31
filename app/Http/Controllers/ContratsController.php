<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Contrats;
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
        $agents = Agents::all();
        $contrats = Contrats::all();
        return view('contrats.index', compact('contrats', 'agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agents::all();
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
        Contrats::create([

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
        $agents = Agents::all();
        $contrat = Contrats::find($id);
        return view('contrats.edit', compact('contrat', 'agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrats $contrat)
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
        Contrats::destroy($id);
        return redirect(route('contrats.index'));
    }
}
