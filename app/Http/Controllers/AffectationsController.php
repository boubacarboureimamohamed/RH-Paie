<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Agent;
use App\Models\Poste;
use App\Models\Service;
use Illuminate\Http\Request;

class AffectationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affectations = Affectation::all();
        return view('affectations.index', compact('affectations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $postes = Poste::all();
        $services = Service::all();
        return view('affectations.create', compact('agents', 'services', 'postes'));
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
            'service_id'=>'required',
            'poste_id'=>'required',
            'date_affectation'=>'required'

        ]);

        Affectation::create([

            'agent_id'=>$request->agent_id,
            'service_id'=>$request->service_id,
            'poste_id'=>$request->poste_id,
            'date_affectation'=>$request->date_affectation

        ]);

       return redirect(route('affectations.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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
        $affectation = Affectation::find($id);
        $postes = Poste::all();
        $agents = Agent::all();
        $services = Service::all();
        return view('affectations.edit', compact('affectation', 'agents', 'postes', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Affectation $affectation)
    {
        $this->validate($request, [

            'agent_id'=>'required',
            'service_id'=>'required',
            'poste_id'=>'required',
            'date_affectation'=>'required'

        ]);

        $affectation->update([

            'agent_id'=>$request->agent_id,
            'service_id'=>$request->service_id,
            'poste_id'=>$request->poste_id,
            'date_affectation'=>$request->date_affectation

        ]);

       return redirect(route('affectations.index'))->with('success', 'La modification a été effetué avec succés');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Affectation::destroy($id);
        return redirect(route('affectations.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
