<?php

namespace App\Http\Controllers;

use App\Models\ClotureMensuelle;
use App\Models\Payroll;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class ClotureMensuellesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clotures_mensuelles = ClotureMensuelle::all();
        return view('clotures_mensuelles.index', compact('clotures_mensuelles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dateCloture = Carbon::now();
        $payrolls = Payroll::all();
        return view('clotures_mensuelles.create', compact('payrolls', 'dateCloture'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());

        $mois = $request->mois_cloture.'-01';

        for($var=0; $var < count($request->mois_cloture); $var++)
         {
            $x = 0;
            $payrolls = Payroll::where('mois', '=', $mois)->with('agent')->get();
            foreach ($payrolls as $payroll)
                {
                    $x = $payroll->id;
                }
            $cloture_mensuelle = ClotureMensuelle::create([

                'mois_cloture'=>$request->mois_cloture.'-01',
                'date_cloture'=>$request->date_cloture,
                'payroll_id'=>$x

            ]);
         }

        return redirect(route('clotures_mensuelles.index'))->with('success', 'L\'enregistrement a été effetué avec succés');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClotureMensuelle::destroy($id);
        return redirect(route('clotures_mensuelles.index'))->with('success', 'La suppression a été effetué avec succés!');
    }


    public function getData(Request $request)
    {
        $mois_cloture = $request->mois_cloture.'-01';
        $payrolls = Payroll::where('mois', '=', $mois_cloture)->with('agent')->get();

        return json_encode([

            'mois_cloture' => $mois_cloture,
            'payrolls' => $payrolls

            ]);
    }

}
