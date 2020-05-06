<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Agent;
use App\Models\TypeAbsence;
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
        $absences = Absence::with('agent','typeabsence')->get();
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
        $typeabsences = TypeAbsence::all();
        return view('absences.create', compact('agents', 'typeabsences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $absence  = Absence::create([

            'type_id'=>$request->type_id,
            'agent_id'=>$request->agent_id,
            'date_debut_absence'=>$request->date_debut_absence,
            'date_fin_absence'=>$request->date_fin_absence,
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
        $typeabsences = TypeAbsence::all();
        $absence = Absence::with('agent','typeabsence')->find($id);
        return view('absences.edit', compact('agents', 'absence', 'typeabsences'));
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
        $absence->update([

            'type_id'=>$request->type_id,
            'agent_id'=>$request->agent_id,
            'date_debut_absence'=>$request->date_debut_absence,
            'date_fin_absence'=>$request->date_fin_absence,
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
