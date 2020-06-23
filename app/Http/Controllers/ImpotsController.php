<?php

namespace App\Http\Controllers;

use App\Models\Impot;
use Illuminate\Http\Request;

class ImpotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impots = Impot::all();
        return view('impots.index', compact('impots'));
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
        $impot = Impot::create([
            'minimum'=>$request->minimum,
            'maximum'=>$request->maximum,
            'taux'=>$request->taux
        ]);

        return redirect(route('impots.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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
    public function update(Request $request, $id)
    {
        //
    }

    public function updateimpot(Request $request, Impot $impot)
    {
        $impot->update([

            'minimum'=>$request->minimum,
            'maximum'=>$request->maximum,
            'taux'=>$request->taux

        ]);

        return redirect(route('impots.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Impot::destroy($id);
        return redirect(route('impots.index'))->with('success', 'La suppression a été effetué avec succés');

    }
}
