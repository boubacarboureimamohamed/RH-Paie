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

            'taux_cnss_employe_national'=>'required|numeric',
            'plafond_cnss_employe_national'=>'required|numeric',
            'taux_cnss_employe_expatrie'=>'required|numeric',
            'plafond_cnss_employe_expatrie'=>'required|numeric',
            'taux_cnss_employeur'=>'required|numeric',
            'plafond_cnss_employeur'=>'required|numeric',
            'taux_anpe'=>'required|numeric',
            'plafond_anpe'=>'required|numeric'

        ]);

        Cotisation::create([

            'taux_cnss_employe_national'=>$request->taux_cnss_employe_national,
            'plafond_cnss_employe_national'=>$request->plafond_cnss_employe_national,
            'taux_cnss_employe_expatrie'=>$request->taux_cnss_employe_expatrie,
            'plafond_cnss_employe_expatrie'=>$request->plafond_cnss_employe_expatrie,
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
    public function update(Request $request)
    {
        $cotisation = Cotisation::where('id', '=', $request->cotisation_id)->first();

        $this->validate($request, [

            'taux_cnss_employe_national'=>'required|numeric',
            'plafond_cnss_employe_national'=>'required|numeric',
            'taux_cnss_employe_expatrie'=>'required|numeric',
            'plafond_cnss_employe_expatrie'=>'required|numeric',
            'taux_cnss_employeur'=>'required|numeric',
            'plafond_cnss_employeur'=>'required|numeric',
            'taux_anpe'=>'required|numeric',
            'plafond_anpe'=>'required|numeric'

        ]);

        //dd($request->all());
        $cotisation->update([

            'taux_cnss_employe_national'=>$request->taux_cnss_employe_national,
            'plafond_cnss_employe_national'=>$request->plafond_cnss_employe_national,
            'taux_cnss_employe_expatrie'=>$request->taux_cnss_employe_expatrie,
            'plafond_cnss_employe_expatrie'=>$request->plafond_cnss_employe_expatrie,
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
