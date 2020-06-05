<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $missions = Mission::all();
        return view('missions.index', compact('missions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        return view('missions.create', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mission = Mission::create([

            'numero_ordre_mission'=>$request->numero_ordre_mission,
            'objet_mission'=>$request->objet_mission,
            'date_debut_mission'=>$request->date_debut_mission,
            'date_fin_mission'=>$request->date_fin_mission,
            'depart'=>$request->depart,
            'destination'=>$request->destination

        ]);

        for($var=0; $var < count($request->agent_id); $var++)
         {


            $mission->agents()->attach(
                $request->agent_id[$var],
                    [
                        'est_chef'=> $request->agent_id[$var] == $request->est_chef[0]
                    ]);

         }

        return redirect(route('missions.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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
        $mission = Mission::find($id);
        return view('missions.edit', compact('agents', 'mission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
        $mission->update([

            'numero_ordre_mission'=>$request->numero_ordre_mission,
            'objet_mission'=>$request->objet_mission,
            'date_debut_mission'=>$request->date_debut_mission,
            'date_fin_mission'=>$request->date_fin_mission,
            'depart'=>$request->depart,
            'destination'=>$request->destination

        ]);

        for($var=0; $var < count($request->agent_id); $var++)
         {

            $mission->agents()->attach(
                $request->agent_id[$var],
                    [
                        'est_chef'=> $request->agent_id[$var] == $request->est_chef[0]
                    ]);


         }

        return redirect(route('missions.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mission::destroy($id);
        return redirect(route('missions.index'))->with('success', 'La suppression a été effetué avec succés');
    }
}
