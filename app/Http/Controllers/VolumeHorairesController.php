<?php

namespace App\Http\Controllers;

use App\Models\VolumeHoraire;
use Illuminate\Http\Request;

class VolumeHorairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volume_horaires = VolumeHoraire::all();
        return view('volumes_horaires.index', compact('volume_horaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $volume_horaire = VolumeHoraire::create([

            'intitule'=>$request->intitule,
            'nbr_heure'=>$request->nbr_heure

        ]);

        return redirect(route('volumes_horaires.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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

    public function update_volume_horaire(Request $request, VolumeHoraire $volume_horaire)
    {
        $volume_horaire->update([

            'intitule'=>$request->intitule,
            'nbr_heure'=>$request->nbr_heure

        ]);

        return redirect(route('volumes_horaires.index'))->with('success', 'La modification a été effetué avec succés');
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
