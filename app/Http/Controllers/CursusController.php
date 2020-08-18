<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Cursu;
use Illuminate\Http\Request;

class CursusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursus = Cursu::with('agent')->get();
        return view('cursus.index', compact('cursus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        return view('cursus.create', compact('agents'));
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

            'ecole'=>'required|alpha',
            'date_debut'=>'required',
            'date_fin'=>'required',
            'diplome'=>'required|alpha',
            'agent_id'=>'required'

        ]);

            for($var=0; $var < count($request->ecole); $var++)
         {

            $cursu = Cursu::create([
                'ecole'=>$request->ecole[$var],
                'date_debut'=>$request->date_debut[$var],
                'date_fin'=>$request->date_fin[$var],
                'diplome'=>$request->diplome[$var],
                'agent_id'=>$request->agent_id


        ]);

         }

         return redirect(route('cursus.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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
        $cursu = Cursu::with('agent')->find($id);
        return view('cursus.edit', compact('cursu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursu $cursus)
    {
        $this->validate($request, [

            'ecole'=>'required|alpha',
            'date_debut'=>'required',
            'date_fin'=>'required',
            'diplome'=>'required|alpha',
            'agent_id'=>'required'

        ]);

        $agent = $request->agent_id;
        $cursus->update([

            'ecole'=>$request->ecole,
            'diplome'=>$request->diplome,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'agent_id'=>$agent

        ]);

        return redirect(route('cursus.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cursu::destroy($id);
        return redirect(route('cursus.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
