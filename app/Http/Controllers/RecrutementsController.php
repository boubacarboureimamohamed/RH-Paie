<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recrutement;

class RecrutementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recrutements = Recrutement::all();
        return view('recrutements.index', compact('recrutements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recrutements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Recrutement::create([

            'ref_recrutement'=>$request->ref_recrutement,
            'description'=>$request->description,
            'date_offre'=>$request->date_offre

            ]);
        return redirect(route('recrutements.index'));
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
        $recrutement = Recrutement::find($id);
        return view('recrutements.edit', compact('recrutement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recrutement $recrutement)
    {
        $recrutement->update([

            'ref_recrutement'=> $request->ref_recrutement,
            'description'=> $request->description,
            'date_offre'=> $request->date_offre

            ]);
        return redirect(route('recrutements.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recrutement::destroy($id);
        return redirect(route('recrutements.index'));
    }
}
