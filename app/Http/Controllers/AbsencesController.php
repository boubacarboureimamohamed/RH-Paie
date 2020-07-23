<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Agent;
use Illuminate\Http\Request;

class AbsencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absences = Absence::with('agent')->get();
        return view('absences.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        return view('absences.create', compact('agents'));
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

            'agent_id'=>'required',
            'nombre_jour'=>'required|integer',
            'motif_absence'=>'required'

        ]);

        $absence  = Absence::create([

            'agent_id'=>$request->agent_id,
            'nombre_jour'=>$request->nombre_jour,
            'motif_absence'=>$request->motif_absence

        ]);

        return redirect(route('absences.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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
        $absence = Absence::with('agent')->find($id);
        return view('absences.edit', compact('agents', 'absence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absence $absence)
    {
        $this->validate($request, [

            'agent_id'=>'required',
            'nombre_jour'=>'required|integer',
            'motif_absence'=>'required'

        ]);

        $absence->update([

            'agent_id'=>$request->agent_id,
            'nombre_jour'=>$request->nombre_jour,
            'motif_absence'=>$request->motif_absence

        ]);

        return redirect(route('absences.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absence::destroy($id);
        return redirect(route('absences.index'))->with('success', 'La suppression a été effetué avec succés');
    }
}
