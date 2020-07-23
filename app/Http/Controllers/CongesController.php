<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Conge;
use App\Models\TypeConge;
use Illuminate\Http\Request;

class CongesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conges = Conge::with('agent', 'typeConge')->get();
        return view('conges.index', compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $typeconges = TypeConge::all();
        return view('conges.create', compact('agents', 'typeconges'));
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
            'type_conge_id'=>'required',
            'date_fin_conge'=>'required',
            'date_debut_conge'=>'required'

        ]);

        Conge::create([

            'agent_id'=>$request->agent_id,
            'type_conge_id'=>$request->type_conge_id,
            'date_debut_conge'=>$request->date_debut_conge,
            'date_fin_conge'=>$request->date_fin_conge

        ]);

       return redirect(route('conges.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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
        $conge = Conge::find($id);
        $agents = Agent::all();
        $typeconges = TypeConge::all();
        return view('conges.edit', compact('agents', 'conge', 'typeconges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conge $conge)
    {
        $this->validate($request, [

            'agent_id'=>'required',
            'type_conge_id'=>'required',
            'date_fin_conge'=>'required',
            'date_debut_conge'=>'required'

        ]);

        $conge->update([

            'agent_id'=>$request->agent_id,
            'type_conge_id'=>$request->type_conge_id,
            'date_debut_conge'=>$request->date_debut_conge,
            'date_fin_conge'=>$request->date_fin_conge

        ]);

        return redirect(route('conges.index'))->with('success', 'La modification a été effetué avec succés');

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
