<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directions = Direction::with('departement')->get();
        return view('directions.index', compact('directions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();
        return view('directions.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Direction::create([

            'libelle'=>$request->libelle,
            'departement_id'=>$request->departement_id

        ]);

        return redirect(route('directions.index'))->with('success', 'L\'enregistrement a été effetué avec succés');
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
        $departements = Departement::all();
        $direction = Direction::with('departement')->find($id);
        return view('directions.edit', compact('direction', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direction $direction)
    {
        $direction->update([

            'libelle'=>$request->libelle,
            'departement_id'=>$request->departement_id

        ]);

        return redirect(route('directions.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Direction::destroy($id);
        return redirect(route('directions.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
