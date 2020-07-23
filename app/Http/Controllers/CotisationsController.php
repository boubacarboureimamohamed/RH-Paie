<?php

namespace App\Http\Controllers;

use App\Models\Cotisation;
use Illuminate\Http\Request;

class CotisationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotisations = Cotisation::all();
        return view('cotisations_cnss_anpe.index', compact('cotisations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cotisations_cnss_anpe.create');
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

            'taux_cnss_employe'=>'required',
            'plafond_cnss_employe'=>'required',
            'taux_cnss_employeur'=>'required',
            'plafond_cnss_employeur'=>'required',
            'taux_anpe'=>'required',
            'plafond_anpe'=>'required'

        ]);

        Cotisation::create([

            'taux_cnss_employe'=>$request->taux_cnss_employe,
            'plafond_cnss_employe'=>$request->plafond_cnss_employe,
            'taux_cnss_employeur'=>$request->taux_cnss_employeur,
            'plafond_cnss_employeur'=>$request->plafond_cnss_employeur,
            'taux_anpe'=>$request->taux_anpe,
            'plafond_anpe'=>$request->plafond_anpe

        ]);

        return redirect(route('cotisations_cnss_anpe.index'))->with('success', 'L\'enregistrement a été effetué avec succés');
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
        $cotisation = Cotisation::find($id);
        return view('cotisations_cnss_anpe.edit', compact('cotisation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotisation $cotisation)
    {
        $this->validate($request, [

            'taux_cnss_employe'=>'required',
            'plafond_cnss_employe'=>'required',
            'taux_cnss_employeur'=>'required',
            'plafond_cnss_employeur'=>'required',
            'taux_anpe'=>'required',
            'plafond_anpe'=>'required'

        ]);

        //dd($request->all());
        $cotisation->update([

            'taux_cnss_employe'=>$request->taux_cnss_employe,
            'plafond_cnss_employe'=>$request->plafond_cnss_employe,
            'taux_cnss_employeur'=>$request->taux_cnss_employeur,
            'plafond_cnss_employeur'=>$request->plafond_cnss_employeur,
            'taux_anpe'=>$request->taux_anpe,
            'plafond_anpe'=>$request->plafond_anpe

        ]);

        return redirect(route('cotisations_cnss_anpe.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cotisation::destroy($id);
        return redirect(route('cotisations_cnss_anpe.index'))->with('success', 'La suppression a été effetué avec succés!');
    }
}