<?php

namespace App\Http\Controllers;

use App\Models\Abattement;
use App\Models\Abattements;
use Illuminate\Http\Request;

class AbattementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abattements = Abattement::all();
        return view('abattements.index', compact('abattements'));
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
        Abattement::create([

            'nombre_charge'=>$request->nombre_charge,
            'pourcentage'=>$request->pourcentage

        ]);

        return redirect(route('abattements.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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
    public function updateabattement(Request $request, Abattement $abattement)
    {
        $abattement->update([

            'nombre_charge'=>$request->nombre_charge,
            'pourcentage'=>$request->pourcentage

        ]);

        return redirect(route('abattements.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Abattement::destroy($id);
        return redirect(route('abattements.index'))->with('success', 'La suppression a été effetué avec succés');

    }
}
