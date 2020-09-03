<?php

namespace App\Http\Controllers;

use App\Models\Anciennete;
use Illuminate\Http\Request;

class AnciennetesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anciennetes = Anciennete::all();
        return view('anciennetes.index', compact('anciennetes'));
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
        $this->validate($request, [

            'annee'=>'required',
            'pourcentage'=>'required'
        ]);

        Anciennete::create([

            'annee'=>$request->annee,
            'pourcentage'=>$request->pourcentage

        ]);

        return redirect(route('anciennetes.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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

    public function updateavantage(Request $request, Anciennete $anciennete)
    {
        $this->validate($request, [

            'annee'=>'required',
            'pourcentage'=>'required'
        ]);


        $anciennete->update([

            'annee'=>$request->annee,
            'pourcentage'=>$request->pourcentage

        ]);

        return redirect(route('anciennete.index'))->with('success', 'La modification a été effetué avec succés');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anciennete::destroy($id);
        return redirect(route('anciennete.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}
