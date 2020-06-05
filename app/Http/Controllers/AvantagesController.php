<?php

namespace App\Http\Controllers;

use App\Models\Avantage;
use Illuminate\Http\Request;

class AvantagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avantages = Avantage::all();
        return view('avantages.index', compact('avantages'));
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
        Avantage::create([

            'libelle'=>$request->libelle

        ]);

        return redirect(route('avantages.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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
    public function updateavantage(Request $request, Avantage $avantage)
    {

        $avantage->update([

            'libelle'=>$request->libelle

        ]);

        return redirect(route('avantages.index'))->with('success', 'La modification a été effetué avec succés');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Avantage::destroy($id);
        return redirect(route('avantages.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
