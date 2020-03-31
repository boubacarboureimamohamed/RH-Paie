<?php

namespace App\Http\Controllers;

use App\Models\Recrutement;
use App\Models\Service;
use App\Models\Stagiaire;
use App\Models\Theme;
use Illuminate\Http\Request;

class StagiairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('stagiaires.index', compact('stagiaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all();
        $services = Service::all();
        $recrutements = Recrutement::all();
        return view('stagiaires.create', compact('themes', 'recrutements', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stagiaire::create([

            'stagiaires_themes_id'=>$request->stagiaires_themes_id,
            'stagiaires_services_id'=>$request->stagiaires_services_id,
            'stagiaires_recrutements_id'=>$request->stagiaires_recrutements_id,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'date_naiss'=>$request->date_naiss,
            'lieu_naiss'=>$request->lieu_naiss,
            'telephone'=>$request->telephone,
            'email'=>$request->email,
            'nationalite'=>$request->nationalite,
            'adresse'=>$request->adresse,
            'sexe'=>$request->sexe,
            'date_debut_stage'=>$request->date_debut_stage,
            'date_fin_stage'=>$request->date_fin_stage

        ]);

        return redirect(route('stagiaires.index'));
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
        $recrutements = Recrutement::all();
        $services = Service::all();
        $themes = Theme::all();
        $stagiaire = Stagiaire::find($id);
        return view('stagiaires.edit', compact('recrutements', 'services', 'themes', 'stagiaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $stagiaire->update([

            'stagiaires_themes_id'=>$request->stagiaires_themes_id,
            'stagiaires_services_id'=>$request->stagiaires_services_id,
            'stagiaires_recrutements_id'=>$request->stagiaires_recrutements_id,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'date_naiss'=>$request->date_naiss,
            'lieu_naiss'=>$request->lieu_naiss,
            'telephone'=>$request->telephone,
            'email'=>$request->email,
            'nationalite'=>$request->nationalite,
            'adresse'=>$request->adresse,
            'sexe'=>$request->sexe,
            'date_debut_stage'=>$request->date_debut_stage,
            'date_fin_stage'=>$request->date_fin_stage

        ]);

        return redirect(route('stagiaires.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stagiaire::destroy($id);
        return redirect(route('stagiaires.index'));
    }
}
