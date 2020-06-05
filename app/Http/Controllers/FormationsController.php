<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Formation;
use App\Models\TypeFormation;
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
        $formations = Formation::with('agents', 'typeFormation')->get();
        return view('formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $typeformations = TypeFormation::all();
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
        $formation = Formation::create([

            'type_formation_id'=>$request->type_formation_id,
            'lieu'=>$request->lieu,
            'date_debut_formation'=>$request->date_debut_formation,
            'date_fin_formation'=>$request->date_fin_formation,
            'attestation'=>$request->attestation
        ]);

        for($var=0; $var < count($request->agent_id); $var++)
         {

            $formation->agents()->attach([$request->agent_id[$var]]);
         }

        return redirect(route('formations.index'))->with('success', 'L\'enregistrement a été effetué avec succés');
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
        $typeformations = TypeFormation::all();
        $formation = Formation::find($id);
        return view('formations.edit', compact('agents', 'formation', 'typeformations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        $formation->update([

            'type_formation_id'=>$request->type_formation_id,
            'lieu'=>$request->lieu,
            'date_debut_formation'=>$request->date_debut_formation,
            'date_fin_formation'=>$request->date_fin_formation,
            'attestation'=>$request->attestation

        ]);

        for($var=0; $var < count($request->agent_id); $var++)
         {

            $formation->agents()->attach([$request->agent_id[$var]]);

         }

        return redirect(route('formations.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Formation::destroy($id);
        return redirect(route('formations.index'))->with('success', 'La suppression a été effetué avec succés');
    }
}
