<?php

namespace App\Http\Controllers;

use App\Models\AbattementsProf;
use Illuminate\Http\Request;

class AbattementsProfsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abattementsPofs = AbattementsProf::all();
        return view('abattementsProfs.index', compact('abattementsPofs'));
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

            'libelle'=>'required',
            'pourcentage'=>'required|numeric'

        ]);

        AbattementsProf::create([

            'libelle'=>$request->libelle,
            'pourcentage'=>$request->pourcentage

        ]);

        return redirect(route('abattementsProfs.index'))->with('success', 'L\'enregistrement a été effetué avec succés');

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
    public function updateabattementProf(Request $request, AbattementsProf $abattementsProf)
    {
        $this->validate($request, [

            'libelle'=>'required',
            'pourcentage'=>'required|numeric'

        ]);

        $abattementsProf->update([

            'libelle'=>$request->libelle,
            'pourcentage'=>$request->pourcentage

        ]);

        return redirect(route('abattementsProfs.index'))->with('success', 'La modification a été effetué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AbattementsProf::destroy($id);
        return redirect(route('abattementsProfs.index'))->with('success', 'La suppression a été effetué avec succés');

    }
}
