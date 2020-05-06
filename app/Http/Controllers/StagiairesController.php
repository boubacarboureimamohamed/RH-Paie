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
        $stagiaires = Stagiaire::with('theme', 'service')->get();
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

            'theme_id'=>$request->theme_id,
            'service_id'=>$request->service_id,
            'recrutement_id'=>$request->recrutement_id,
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

        return redirect(route('stagiaires.index'))->with('success', 'L\'enregistrement a été effetué avec succés');
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

            'theme_id'=>$request->theme_id,
            'service_id'=>$request->service_id,
            'recrutement_id'=>$request->recrutement_id,
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

        return redirect(route('stagiaires.index'))->with('success', 'La modification a été effetué avec succés');
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
        return redirect(route('stagiaires.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
