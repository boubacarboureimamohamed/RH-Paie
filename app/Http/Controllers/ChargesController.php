<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Charge;
use App\Models\TypeCharge;
use Illuminate\Http\Request;

class ChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charges = Charge::with('agent', 'typeCharge')->get();
        return view('charges.index', compact('charges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $typecharges = TypeCharge::all();
        return view('charges.create', compact('agents', 'typecharges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($varr=0; $varr < count($request->nomc); $varr++)
        {

           $charge = Charge::create([
            'nomc'=>$request->nomc[$varr],
            'prenomc'=>$request->prenomc[$varr],
            'date_naissc'=>$request->date_naissc[$varr],
            'lieu_naissc'=>$request->lieu_naissc[$varr],
            'nationalitec'=>$request->nationalitec[$varr],
            'sexec'=>$request->sexec[$varr],
            'type_charge_id'=>$request->type_charge_id[$varr],
            'agent_id'=>$request->agent_id


       ]);

        }

        return redirect(route('charges.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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
        $typecharges = TypeCharge::all();
        $charge = Charge::with('agent')->find($id);
        return view('charges.edit', compact('charge', 'typecharges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Charge $charge)
    {
        $agent = $request->agent_id;
        $charge->update([

            'nomc'=>$request->nomc,
            'prenomc'=>$request->prenomc,
            'date_naissc'=>$request->date_naissc,
            'lieu_naissc'=>$request->lieu_naissc,
            'nationalitec'=>$request->nationalitec,
            'sexec'=>$request->sexec,
            'type_charge_id'=>$request->type_charge_id,
            'agent_id'=>$agent

        ]);

        return redirect(route('charges.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Charge::destroy($id);
        return redirect(route('charges.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
