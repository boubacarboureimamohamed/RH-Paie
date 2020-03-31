<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Formations;
use App\Models\TypeFormations;
use Illuminate\Http\Request;

class FormationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formations::all();
        return view('formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agents::all();
        $typeformations = TypeFormations::all();
        return view('formations.create', compact('agents', 'typeformations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formation = Formations::create([

            'type_formations_id'=>$request->type_formations_id,
            'lieu'=>$request->lieu,
            'date_debut_formation'=>$request->date_debut_formation,
            'date_fin_formation'=>$request->date_fin_formation,
            'bilan_formation'=>$request->bilan_formation,
            'date'=>$request->date

        ]);

        $formation->agents()->attach($request->agents_id);

        return redirect(route('formations.index'));
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
        $typeformations = TypeFormations::all();
        $formation = Formations::find($id);
        return view('formations.edit', compact('agents', 'formation', 'typeformations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formations $formation)
    {
        $formation->update([

            'type_formations_id'=>$request->type_formations_id,
            'lieu'=>$request->lieu,
            'date_debut_formation'=>$request->date_debut_formation,
            'date_fin_formation'=>$request->date_fin_formation,
            'bilan_formation'=>$request->bilan_formation,
            'date'=>$request->date

        ]);

        $formation->agents()->attach($request->agents_id);

        return redirect(route('formations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Formations::destroy($id);
        return redirect(route('formations.index'));
    }
}
