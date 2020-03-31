<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Contrats;
use App\Models\Postes;
use App\Models\Recrutements;
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
        $agents = Agents::all();
        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postes = Postes::all();
        $contrats = Contrats::all();
        $recrutements = Recrutements::all();
        return view('agents.create', compact('recrutements', 'postes', 'contrats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Agents::create([
            'matricule'=>$request->matricule,
            'agents_recrutements_id'=>$request->agents_recrutements_id,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'date_naiss'=>$request->date_naiss,
            'lieu_naiss'=>$request->lieu_naiss,
            'telephone'=>$request->telephone,
            'email'=>$request->email,
            'nationalite'=>$request->nationalite,
            'adresse'=>$request->adresse,
            'sexe'=>$request->sexe,
            'fonction'=>$request->fonction
        ]);
        return redirect(route('agents.index'));
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
}
