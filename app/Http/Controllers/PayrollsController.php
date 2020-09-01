<?php

namespace App\Http\Controllers;

use App\Models\Abattement;
use App\Models\Absence;
use App\Models\AffectationAvantage;
use App\Models\Agent;
use App\Models\Avantage;
use App\Models\Charge;
use App\Models\Contrat;
use App\Models\Cotisation;
use App\Models\Impot;
use App\Models\Payroll;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;

class PayrollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payrolls = Payroll::all();
        return view('paie.index', compact('payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::has('contrats')->get();
        return view('paie.create', compact('agents'));
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

            'mois'=>'required',
            'agent_id'=>'required'

        ]);

        $tableau_contrats = [];
        $tableau_bases_imposables = [];
        $tableau_nb_charges = [];
        $pourcentage_a_fam = [];
        $salaires_bases = [];
        $nbr_absence = [];
        $montant_a_prelever = [];
        $total_bases_imposables = [];
        $salaire_ni_cnss = [];
        $somme_ni_iuts = [];
        $salaire_brut = [];
        $somme_sb_tbi = [];
        $somme_ni_cnss = [];
        $somme_sb_tbi_cnss = [];
        $somme_sb_tbi_cnss_aprof = [];
        $somme_sb_tbi_cnss_aprof_afam = [];
        $pourcentage_iuts = [];
        $somme_sb_tbi_cnss_aprof_afam_iuts = [];

        $taux_iuts = Impot::all();
        $avantages = Avantage::all();
        $abattements = Abattement::all();
        $cotisations_cnss_anpe = Cotisation::all();

        for($var=0; $var < count($request->agent_id); $var++)
            {
                $a = 0;
                $b = 0;
                $c = 0;
                $x = 0;
                $y = 0;
                $z = 0;
                $m = 0;
                $n = 0;
                $o = 0;
                $r = 0;
                $oo = 0;
                $rr = 0;
                $nbr_ab = 0;
                $montant_ap = 0;
                $somme_bi = 0;
                $somme_cnss = 0;
                $somme_iuts = 0;
                $somme_a_fam = 0;
                $somme_a_prof = 0;

                $contrat = Contrat::where('agent_id', '=', $request->agent_id[$var])->with('poste')->orderByDesc('date_debut_contrat')->first();
                $nb_charges = Charge::where('agent_id', '=', $request->agent_id[$var])->count();
                $bases_imposables = AffectationAvantage::where('agent_id', '=', $request->agent_id[$var])->with('avantage')->get();
                $absences = Absence::where('agent_id', '=', $request->agent_id[$var])->get();

                $tableau_contrats[] = $contrat;
                $tableau_bases_imposables[] = $bases_imposables;
                $tableau_nb_charges[] = $nb_charges;
                $salaires_bases[] = $contrat->salaire_base;

                $debut_mois = $request->mois.'-01';
                $fin_mois = date("Y-m-t", strtotime($debut_mois));

                foreach ($absences as $absence)
                    {
                    if($absence->date_debut >= $debut_mois && $absence->date_debut <= $fin_mois)
                        {
                            $nbr_ab = $nbr_ab + $absence->nbr_jour;
                            $montant_ap = $montant_ap + $absence->montant_a_prelever;
                        }
                    }
                $nbr_absence[] = $nbr_ab;
                $montant_a_prelever[] = $montant_ap;

                foreach($bases_imposables as $bases_imposable)
                    {
                        $somme_bi = $somme_bi + $bases_imposable->montant;
                    }
                $total_bases_imposables[] = $somme_bi;

                foreach($salaires_bases as $salaire_base)
                    {
                        $x = $somme_bi + $salaire_base;
                    }
                $salaire_brut[] = $x;

                foreach ($bases_imposables as $bases_ni)
                    {
                    if($bases_ni->avantage->imposable == 1)
                        {
                            $o = $o + $bases_ni->montant;
                        }
                    }
                $somme_ni_cnss[] = $o;

                foreach ($salaire_brut as $salairebrut)
                    {
                        foreach ($somme_ni_cnss as $somme_nicnss)
                            {
                                $r = $salairebrut - $somme_nicnss;
                            }
                    }
                $somme_sb_tbi[] = $r;

                foreach($somme_sb_tbi as $somme_sbtbi)
                    {
                        foreach($cotisations_cnss_anpe as $cotisationscnss_anpe)
                            {
                                $m = $cotisationscnss_anpe->plafond_cnss_employe;
                                $n = $cotisationscnss_anpe->taux_cnss_employe;
                            }
                            if($somme_sbtbi <= $m && $somme_sbtbi > 0)
                                {
                                    $somme_cnss = ($somme_sbtbi) - (($somme_sbtbi * $n) / 100);
                                }
                            if($somme_sbtbi > $m)
                                {
                                    $somme_cnss = ($somme_sbtbi) - (($m * $n) / 100);
                                }
                    }
                $salaire_ni_cnss[] = $somme_cnss;

                foreach ($bases_imposables as $bases_nii)
                    {
                    if($bases_nii->avantage->imposable == 2)
                        {
                            $oo = $oo + $bases_nii->montant;
                        }
                    }
                $somme_ni_iuts[] = $oo;

                foreach ($salaire_ni_cnss as $salaire_nicnss)
                    {
                        foreach ($somme_ni_iuts as $somme_niiuts)
                            {
                                $rr = $salaire_nicnss - $somme_niiuts;
                            }
                    }
                $somme_sb_tbi_cnss[] = $rr;

                foreach($somme_sb_tbi_cnss as $somme_sbtbicnss)
                    {
                        $somme_a_prof = ($somme_sbtbicnss) - (($somme_sbtbicnss * 15) / 100);
                    }
                $somme_sb_tbi_cnss_aprof[] = $somme_a_prof;

                foreach($abattements as $abattement)
                    {
                        foreach($tableau_nb_charges as $tableau_nb_charge)
                            {
                                $y = $tableau_nb_charge;
                            }
                        if($abattement->nombre_charge == $y)
                            {
                                $z = $abattement->pourcentage;
                            }
                    }
                $pourcentage_a_fam[] = $z;

                foreach($somme_sb_tbi_cnss_aprof as $somme_sbtbicnssaprof)
                    {
                        foreach($pourcentage_a_fam as $pourcentage_afam)
                            {
                                $a = $pourcentage_afam;
                            }
                        $somme_a_fam = ($somme_sbtbicnssaprof) - (($somme_sbtbicnssaprof * $a) / 100);
                    }
                $somme_sb_tbi_cnss_aprof_afam[] = $somme_a_fam;

                foreach($taux_iuts as $tranche)
                    {
                        foreach($somme_sb_tbi_cnss_aprof_afam as $somme_sbtbicnssaprofafam)
                            {
                                $b = $somme_sbtbicnssaprofafam;
                            }
                        if($b >= $tranche->minimum && $b <= $tranche->maximum)
                            {
                                $c = $tranche->taux;
                            }
                    }
                $pourcentage_iuts[] = $c;

                foreach($somme_sb_tbi_cnss_aprof_afam as $salaire_net)
                    {
                        foreach($pourcentage_iuts as $pourcentageIuts)
                            {
                                $somme_iuts = ($salaire_net) - (($salaire_net * $pourcentageIuts) / 100);
                            }
                    }
                $somme_sb_tbi_cnss_aprof_afam_iuts[] = $somme_iuts;

                $bulletin_paie = Payroll::create([
                    $m = $request->mois.'-01',
                    'mois'=>$request->mois.'-01',
                    'debut_mois'=>date("Y-m-01", strtotime($m)),
                    'fin_mois'=>date("Y-m-t", strtotime($m)),
                    'net_a_payer'=>$somme_sb_tbi_cnss_aprof_afam_iuts[$var],
                    'agent_id'=>$request->agent_id[$var]
                ]);

            }
            //dd($debut_mois, $fin_mois, $nbr_absence, $montant_a_prelever);
            /* dd($abattements, $taux_iuts, $avantages, $cotisations_cnss_anpe, $tableau_contrats, $tableau_bases_imposables,
                 $tableau_nb_charges, $pourcentage_a_fam, $salaires_bases,
                 $total_bases_imposables, $salaire_brut, $somme_ni_cnss, $somme_ni_iuts, $somme_sb_tbi, $somme_sb_tbi_cnss,
                 $somme_sb_tbi_cnss_aprof, $somme_sb_tbi_cnss_aprof_afam,
                $pourcentage_iuts, $somme_sb_tbi_cnss_aprof_afam_iuts); */

        return redirect(route('paie.index'))->with('success', 'L\'enregistrement a été effetué avec succés');
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
        Payroll::destroy($id);
        return redirect(route('paie.index'))->with('success', 'La suppression a été effetué avec succés');
    }


    public function showPayroll($id)
    {
        $payroll = Payroll::find($id);
        $contrat = Contrat::where('agent_id', '=', $payroll->agent->id)->with('poste')->orderByDesc('date_debut_contrat')->first();
        $nb_charges = Charge::where('agent_id', '=', $payroll->agent->id)->count();
        $bases_imposables = AffectationAvantage::where('agent_id', '=', $payroll->agent->id)->with('avantage')->get();
        return view('paie.show', compact('payroll', 'contrat', 'nb_charges', 'bases_imposables'));

    }


    public function printPayroll($id)
    {
        $payroll = Payroll::find($id);

        $tableau_bases_imposables = [];
        $pourcentage_a_fam = 0;
        $salaires_bases = 0;
        $total_bases_imposables = 0;
        $somme_ni_cnss = 0;
        $salaire_ni_cnss = 0;
        $somme_ni_iuts = 0;
        $nbr_absence = 0;
        $montant_a_prelever = 0;
        $salaire_brut = 0;
        $somme_sb_tbi = 0;
        $somme_sb_tbi_cnss = 0;
        $somme_sb_tbi_cnss_aprof = 0;
        $somme_sb_tbi_cnss_aprof_afam = 0;
        $pourcentage_iuts = 0;
        $somme_sb_tbi_cnss_aprof_afam_iuts = 0;

        $taux_iuts = Impot::all();
        $avantages = Avantage::all();
        $abattements = Abattement::all();
        $cotisations_cnss_anpe = Cotisation::all();

        $a = 0;
        $b = 0;
        $c = 0;
        $x = 0;
        $y = 0;
        $z = 0;
        $m = 0;
        $n = 0;
        $o = 0;
        $r = 0;
        $oo = 0;
        $rr = 0;
        $cnss = 0;
        $somme_bi = 0;
        $somme_cnss = 0;
        $somme_iuts = 0;
        $somme_a_fam = 0;
        $somme_a_prof = 0;
        $cotisation_cnss = 0;
        $cotisation_anpe = 0;
        $t_cnss_employeur = 0;
        $p_cnss_employeur = 0;
        $plafond_cnss = 0;
        $t_anpe_employeur = 0;
        $p_anpe_employeur = 0;
        $plafond_anpe = 0;
        $nbr_ab = 0;
        $montant_ap = 0;


        $contrat = Contrat::where('agent_id', '=', $payroll->agent->id)->with('poste')->orderByDesc('date_debut_contrat')->first();
        $nb_charges = Charge::where('agent_id', '=', $payroll->agent->id)->count();
        $bases_imposables = AffectationAvantage::where('agent_id', '=', $payroll->agent->id)->with('avantage')->get();
        $absences = Absence::where('agent_id', '=', $payroll->agent->id)->get();

        $tableau_bases_imposables[] = $bases_imposables;
        $salaires_bases = $contrat->salaire_base;

        $debut_mois = $payroll->mois.'-01';
        $fin_mois = date("Y-m-t", strtotime($debut_mois));

        foreach ($absences as $absence)
            {
            if($absence->date_debut >= $debut_mois && $absence->date_debut <= $fin_mois)
                {
                    $nbr_ab = $nbr_ab + $absence->nbr_jour;
                    $montant_ap = $montant_ap + $absence->montant_a_prelever;
                }
            }
        $nbr_absence = $nbr_ab;
        $montant_a_prelever = $montant_ap;

        foreach($bases_imposables as $bases_imposable)
            {
                $somme_bi = $somme_bi + $bases_imposable->montant;
            }
        $total_bases_imposables = $somme_bi;

                $x = $somme_bi + $salaires_bases;

        $salaire_brut = $x;

        foreach ($bases_imposables as $bases_ni)
            {
            if($bases_ni->avantage->imposable == 1)
                {
                    $o = $o + $bases_ni->montant;
                }
            }
        $somme_ni_cnss = $o;

                 $r = $salaire_brut - $somme_ni_cnss;

        $somme_sb_tbi = $r;

        foreach($cotisations_cnss_anpe as $cotisationscnss_anpe)
        {
            $m = $cotisationscnss_anpe->plafond_cnss_employe;
            $n = $cotisationscnss_anpe->taux_cnss_employe;
            $t_cnss_employeur = $cotisationscnss_anpe->taux_cnss_employeur;
            $p_cnss_employeur = $cotisationscnss_anpe->plafond_cnss_employeur;
            $t_anpe_employeur = $cotisationscnss_anpe->taux_anpe;
            $p_anpe_employeur = $cotisationscnss_anpe->plafond_anpe;
        }
        if($somme_sb_tbi <= $m && $somme_sb_tbi > 0)
            {
                $somme_cnss = ($somme_sb_tbi) - (($somme_sb_tbi * $n) / 100);
                $cnss = (($somme_sb_tbi * $n) / 100);
            }
        if($somme_sb_tbi > $m)
            {
                $somme_cnss = ($somme_sb_tbi) - (($m * $n) / 100);
                $cnss = (($m * $n) / 100);
            }

        if($somme_sb_tbi <= $p_cnss_employeur && $somme_sb_tbi > 0)
            {
                $cotisation_cnss = (($somme_sb_tbi * $t_cnss_employeur) / 100);
                $plafond_cnss = $somme_sb_tbi;
            }
        if($somme_sb_tbi > $p_cnss_employeur)
            {
                $cotisation_cnss = (($p_cnss_employeur * $t_cnss_employeur) / 100);
                $plafond_cnss = $p_cnss_employeur;
            }

        if($somme_sb_tbi <= $p_anpe_employeur && $somme_sb_tbi > 0)
            {
                $cotisation_anpe = (($somme_sb_tbi * $t_anpe_employeur) / 100);
                $plafond_anpe = $somme_sb_tbi;
            }
        if($somme_sb_tbi > $p_anpe_employeur)
            {
                $cotisation_anpe = (($p_anpe_employeur * $t_anpe_employeur) / 100);
                $plafond_anpe = $p_anpe_employeur;
            }

        $salaire_ni_cnss = $somme_cnss;

        foreach ($bases_imposables as $bases_nii)
            {
            if($bases_nii->avantage->imposable == 2)
                {
                    $oo = $oo + $bases_nii->montant;
                }
            }
        $somme_ni_iuts = $oo;

                $rr = $salaire_ni_cnss - $somme_ni_iuts;

        $somme_sb_tbi_cnss = $rr;

                $somme_a_prof = (($somme_sb_tbi_cnss * 15) / 100);

        $somme_sb_tbi_cnss_aprof = ($somme_sb_tbi_cnss) - ($somme_a_prof);

        foreach($abattements as $abattement)
            {
                        $y = $nb_charges;

                if($abattement->nombre_charge == $y)
                    {
                        $z = $abattement->pourcentage;
                    }
            }
        $pourcentage_a_fam = $z;


                        $a = $pourcentage_a_fam;

                $somme_a_fam = (($somme_sb_tbi_cnss_aprof * $a) / 100);

        $somme_sb_tbi_cnss_aprof_afam = ($somme_sb_tbi_cnss_aprof) - ($somme_a_fam);

        foreach($taux_iuts as $tranche)
            {

                        $b = $somme_sb_tbi_cnss_aprof_afam;

                if($b >= $tranche->minimum && $b <= $tranche->maximum)
                    {
                        $c = $tranche->taux;
                    }
            }
        $pourcentage_iuts = $c;


                        $somme_iuts = (($somme_sb_tbi_cnss_aprof_afam * $pourcentage_iuts) / 100);


        $somme_sb_tbi_cnss_aprof_afam_iuts = ($somme_sb_tbi_cnss_aprof_afam) - ($somme_iuts);

        /* dd($abattements, $taux_iuts, $tableau_contrats, $tableau_bases_imposables,
                 $nb_charges, $pourcentage_a_fam, $salaires_bases,
                 $total_bases_imposables, $somme_sb_tbi, $somme_sb_tbi_cnss,
                 $somme_sb_tbi_cnss_aprof, $somme_sb_tbi_cnss_aprof_afam,
                $pourcentage_iuts, $somme_sb_tbi_cnss_aprof_afam_iuts); */

        $pdf = PDF::loadView('paie.pdf', compact('payroll', 'contrat', 'nb_charges', 'bases_imposables', 'plafond_anpe',
         'total_bases_imposables', 'somme_sb_tbi', 'somme_sb_tbi_cnss', 'somme_sb_tbi_cnss_aprof', 'somme_cnss', 'plafond_cnss',
         'somme_a_prof', 'somme_a_fam', 'somme_sb_tbi_cnss_aprof_afam', 'pourcentage_iuts', 'cnss', 'cotisation_cnss', 'cotisation_anpe',
         'somme_iuts', 'somme_sb_tbi_cnss_aprof_afam_iuts', 't_cnss_employeur', 't_anpe_employeur', 'nbr_absence', 'montant_a_prelever'))->setPaper('a4', $oriantation = 'portrait');

         $filename = 'Bulletin_Paie_'.$payroll->agent->matricule;
        return $pdf->stream($filename.'.pdf');

    }


    public function getData(Request $request)
    {
        /* $agent_id = $request->agent_id;
        $abattements = Abattement::all();
        $nb_absences = Absence::where('agent_id', '=', $agent_id)->orderByDesc('created_at')->first();
        $contrat = Contrat::where('agent_id', '=', $agent_id)->with('poste')->orderByDesc('date_debut_contrat')->first();
        $nb_charges = Charge::where('agent_id', '=', $agent_id)->count();
        $base_imposables = AffectationAvantage::where('agent_id', '=', $agent_id)->with('avantage')->get();

        if($nb_absences == null)
        {
            $nb_absences = new \stdClass();
            $nb_absences->nombre_jour = 0;
        }

        return json_encode([
            'agent_id' => $agent_id,
            'contrat' => $contrat,
            'abattements' => $abattements,
            'nb_absences' => $nb_absences,
            'nb_charges' => $nb_charges,
            'base_imposables' => $base_imposables

            ]); */
    }
}
