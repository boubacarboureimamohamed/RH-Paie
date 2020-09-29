<?php

namespace App\Http\Controllers;

use App\Models\Abattement;
use App\Models\AbattementsProf;
use App\Models\Absence;
use App\Models\AffectationAvantage;
use App\Models\Agent;
use App\Models\Anciennete;
use App\Models\Avantage;
use App\Models\Charge;
use App\Models\Contrat;
use App\Models\Cotisation;
use App\Models\HeuresSupplementaire;
use App\Models\Impot;
use App\Models\Nationalite;
use App\Models\Payroll;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
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

        $primes_anciennetes = [];
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
        $salaire_brut1 = [];
        $salaire_brut = [];
        $sb1 = [];
        $sb2 = [];
        $sb3 = [];
        $nb_heures = [];
        $montant_horaires = [];
        $majorations = [];
        $montant_totaux = [];
        $nb_heures1 = [];
        $montant_horaires1 = [];
        $majorations1 = [];
        $montant_totaux1 = [];
        $nb_heures2 = [];
        $montant_horaires2 = [];
        $majorations2 = [];
        $montant_totaux2 = [];
        $nb_heures3 = [];
        $montant_horaires3 = [];
        $majorations3 = [];
        $montant_totaux3 = [];
        $somme_sb_tbi = [];
        $somme_ni_cnss = [];
        $somme_sb_tbi_cnss = [];
        $somme_sb_tbi_cnss_aprof = [];
        $somme_sb_tbi_cnss_aprof_afam = [];
        $pourcentage_iuts = [];
        $somme_sb_tbi_cnss_aprof_afam_iuts = [];
        $salaire_net_a_payer = [];
        $salaire_net_a_payer1 = [];
        $tableau_nationalite = [];

        $taux_iuts = Impot::all();
        $avantages = Avantage::all();
        $abattements = Abattement::all();
        $abattements_profs = AbattementsProf::all();
        $cotisations_cnss_anpe = Cotisation::all();
        $anciennetes = Anciennete::all();
        $nationalites = Nationalite::all();

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
                $snp = 0;
                $snp1 = 0;
                $brut1 = 0;
                $brut2 = 0;
                $brut3 = 0;
                $brut4 = 0;
                $n_agent = 0;
                $nbr_ab = 0;
                $nb_heure = 0;
                $montant_horaire = 0;
                $majoration = 0;
                $montant_total = 0;
                $nb_heure1 = 0;
                $montant_horaire1 = 0;
                $majoration1 = 0;
                $montant_total1 = 0;
                $nb_heure2 = 0;
                $montant_horaire2 = 0;
                $majoration2 = 0;
                $montant_total2 = 0;
                $nb_heure3 = 0;
                $montant_horaire3 = 0;
                $majoration3 = 0;
                $montant_total3 = 0;
                $montant_ap = 0;
                $somme_bi = 0;
                $somme_cnss = 0;
                $somme_iuts = 0;
                $somme_a_fam = 0;
                $somme_a_prof = 0;
                $pourcentage_abat_prof = 0;
                $pourcentage_anciennete = 0;
                $prime_anciennete = 0;

                $contrat = Contrat::where('agent_id', '=', $request->agent_id[$var])->with('poste')->orderByDesc('date_debut_contrat')->first();
                $nb_charges = Charge::where('agent_id', '=', $request->agent_id[$var])->count();
                $bases_imposables = AffectationAvantage::where('agent_id', '=', $request->agent_id[$var])->with('avantage')->get();
                $absences = Absence::where('agent_id', '=', $request->agent_id[$var])->get();
                $heures_supplementaires = HeuresSupplementaire::where('agent_id', '=', $request->agent_id[$var])->get();
                /* $nationalities_agents = Agent::whereIn('id', [$request->agent_id[$var]])->get();

                foreach ($nationalities_agents as $nationalitie_agent) {
                    $n_agent = $nationalitie_agent->nationalite->nationalite;
                }
                dd($n_agent); */

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

                foreach ($heures_supplementaires as $heure_supplementaire)
                    {
                        if($heure_supplementaire->mois_heure_supp >= $debut_mois && $heure_supplementaire->mois_heure_supp <= $fin_mois)
                            {
                                if($heure_supplementaire->majoration == 10)
                                    {
                                        $nb_heure = $nb_heure + $heure_supplementaire->nbr_heure;
                                        $montant_horaire = $heure_supplementaire->montant_horaire;
                                        $majoration = $heure_supplementaire->majoration;
                                        $montant_total = $montant_total + $heure_supplementaire->montant_heure_supp;
                                    }
                            }
                    }
                $nb_heures[] = $nb_heure;
                $montant_horaires[] = $montant_horaire;
                $majorations[] = $majoration;
                $montant_totaux[] = $montant_total;

                foreach ($heures_supplementaires as $heure_supplementaire1)
                    {
                        if($heure_supplementaire1->mois_heure_supp >= $debut_mois && $heure_supplementaire1->mois_heure_supp <= $fin_mois)
                            {
                                if($heure_supplementaire1->majoration == 35)
                                    {
                                        $nb_heure1 = $nb_heure1 + $heure_supplementaire1->nbr_heure;
                                        $montant_horaire1 = $heure_supplementaire1->montant_horaire;
                                        $majoration1 = $heure_supplementaire1->majoration;
                                        $montant_total1 = $montant_total1 + $heure_supplementaire1->montant_heure_supp;
                                    }
                            }
                    }
                $nb_heures1[] = $nb_heure1;
                $montant_horaires1[] = $montant_horaire1;
                $majorations1[] = $majoration1;
                $montant_totaux1[] = $montant_total1;

                foreach ($heures_supplementaires as $heure_supplementaire2)
                    {
                        if($heure_supplementaire2->mois_heure_supp >= $debut_mois && $heure_supplementaire2->mois_heure_supp <= $fin_mois)
                            {
                                if($heure_supplementaire2->majoration == 50)
                                    {
                                        $nb_heure2 = $nb_heure2 + $heure_supplementaire2->nbr_heure;
                                        $montant_horaire2 = $heure_supplementaire2->montant_horaire;
                                        $majoration2 = $heure_supplementaire2->majoration;
                                        $montant_total2 = $montant_total2 + $heure_supplementaire2->montant_heure_supp;
                                    }
                            }
                    }
                $nb_heures2[] = $nb_heure2;
                $montant_horaires2[] = $montant_horaire2;
                $majorations2[] = $majoration2;
                $montant_totaux2[] = $montant_total2;

                foreach ($heures_supplementaires as $heure_supplementaire3)
                    {
                        if($heure_supplementaire3->mois_heure_supp >= $debut_mois && $heure_supplementaire3->mois_heure_supp <= $fin_mois)
                            {
                                if($heure_supplementaire3->majoration == 100)
                                    {
                                        $nb_heure3 = $nb_heure3 + $heure_supplementaire3->nbr_heure;
                                        $montant_horaire3 = $heure_supplementaire3->montant_horaire;
                                        $majoration3 = $heure_supplementaire3->majoration;
                                        $montant_total3 = $montant_total3 + $heure_supplementaire3->montant_heure_supp;
                                    }
                            }
                    }
                $nb_heures3[] = $nb_heure3;
                $montant_horaires3[] = $montant_horaire3;
                $majorations3[] = $majoration3;
                $montant_totaux3[] = $montant_total3;

                /* dd($nb_heures, $montant_horaires, $majorations, $montant_totaux,
                   $nb_heures1, $montant_horaires1, $majorations1, $montant_totaux1,
                   $nb_heures2, $montant_horaires2, $majorations2, $montant_totaux2,
                   $nb_heures3, $montant_horaires3, $majorations3, $montant_totaux3); */

                $date_jour = Carbon::now()->toDateTimeString();
                $date_prise_service = $contrat->date_debut_contrat;
                $diff = abs(strtotime($date_prise_service) - strtotime($date_jour));
                $nbr_annee_service = floor($diff / (365*60*60*24));

                foreach ($anciennetes as $anciennete)
                    {
                    if($anciennete->annee < 3 && $nbr_annee_service < 3)
                        {
                            $pourcentage_anciennete = 0 / 100;
                            $prime_anciennete = $contrat->salaire_base * $pourcentage_anciennete;
                        }
                    if($anciennete->annee >= 3 && $anciennete->annee < 4 && $nbr_annee_service >= 3 && $nbr_annee_service < 4)
                        {
                            $pourcentage_anciennete = $anciennete->pourcentage / 100;
                            $prime_anciennete = $contrat->salaire_base * $pourcentage_anciennete;
                        }
                    if($anciennete->annee >= 4 && $nbr_annee_service >= 4)
                        {
                            $pourcentage_anciennete = $anciennete->pourcentage / 100;
                            $prime_anciennete = $contrat->salaire_base * $pourcentage_anciennete;
                        }
                    }
                $primes_anciennetes[] = $prime_anciennete;

                foreach($bases_imposables as $bases_imposable)
                    {
                        $somme_bi = $somme_bi + $bases_imposable->montant;
                    }
                $total_bases_imposables[] = $somme_bi;

                foreach($salaires_bases as $salaire_base)
                    {
                        foreach ($total_bases_imposables as $total_basesimposables)
                        {
                            $x = $salaire_base + $total_basesimposables;
                        }
                    }
                $salaire_brut1[] = $x;

                foreach($montant_totaux as $mt)
                    {
                        foreach($montant_totaux1 as $mt1)
                            {
                                $brut1 = $mt + $mt1;
                            }
                    }
                $sb1[] = $brut1;

                foreach ($sb1 as $sb11)
                    {
                        foreach($montant_totaux2 as $mt2)
                            {
                                $brut2 = $sb11 + $mt2;
                            }
                    }
                $sb2[] = $brut2;

                foreach($sb2 as $sb22)
                    {
                        foreach($montant_totaux3 as $mt3)
                            {
                                $brut3 = $sb22 + $mt3;
                            }
                    }
                $sb3[] = $brut3;

                foreach($salaire_brut1 as $salaire_b1)
                    {
                        foreach($sb3 as $sb33)
                            {
                                $brut4 = $salaire_b1 + $sb33;
                            }
                    }
                $salaire_brut[] = $brut4;

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
                                $m = $cotisationscnss_anpe->plafond_cnss_employe_national;
                                $n = $cotisationscnss_anpe->taux_cnss_employe_national;
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
                        foreach ($abattements_profs as $abattement_prof)
                            {
                                $pourcentage_abat_prof = $abattement_prof->pourcentage;
                            }
                        $somme_a_prof = ($somme_sbtbicnss) - (($somme_sbtbicnss * $pourcentage_abat_prof) / 100);
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

                foreach ($somme_sb_tbi_cnss_aprof_afam_iuts as $somme_sb_tbi_cnss_aprof_afam_iuts_end)
                    {
                        foreach ($montant_a_prelever as $montantaprelever)
                            {
                                $snp1 = $somme_sb_tbi_cnss_aprof_afam_iuts_end - $montantaprelever;
                            }
                    }
                $salaire_net_a_payer1[] = $snp1;

                foreach ($salaire_net_a_payer1 as $salaire_net_a_payer_1)
                    {
                        foreach ($primes_anciennetes as $primes_anciennetes_fin)
                            {
                                $snp = $salaire_net_a_payer_1 + $primes_anciennetes_fin;
                            }
                    }
                $salaire_net_a_payer[] = $snp;

                $bulletin_paie = Payroll::create([
                    $m = $request->mois.'-01',
                    'mois'=>$request->mois.'-01',
                    'debut_mois'=>date("Y-m-01", strtotime($m)),
                    'fin_mois'=>date("Y-m-t", strtotime($m)),
                    'net_a_payer'=>$salaire_net_a_payer[$var],
                    'agent_id'=>$request->agent_id[$var]
                ]);

            }
            //dd($debut_mois, $fin_mois, $nbr_absence, $montant_a_prelever);
            //dd($date_jour, $date_prise_service, $nbr_annee_service, $contrat->salaire_base, $pourcentage_anciennete, $prime_anciennete);
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
        $heures_supplementaires = HeuresSupplementaire::where('agent_id', '=', $payroll->agent_id)->get();
        return view('paie.show', compact('payroll', 'contrat', 'nb_charges', 'bases_imposables', 'heures_supplementaires'));

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
        $sb1 = 0;
        $sb2 = 0;
        $sb3 = 0;
        $nb_heures = 0;
        $montant_horaires = 0;
        $majorations = 0;
        $montant_totaux = 0;
        $nb_heures1 = 0;
        $montant_horaires1 = 0;
        $majorations1 = 0;
        $montant_totaux1 = 0;
        $nb_heures2 = 0;
        $montant_horaires2 = 0;
        $majorations2 = 0;
        $montant_totaux2 = 0;
        $nb_heures3 = 0;
        $montant_horaires3 = 0;
        $majorations3 = 0;
        $montant_totaux3 = 0;
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
        $abattements_profs = AbattementsProf::all();
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
        $brut1 = 0;
        $brut2 = 0;
        $brut3 = 0;
        $brut4 = 0;
        $somme_hs = 0;
        $nb_heure = 0;
        $montant_horaire = 0;
        $majoration = 0;
        $montant_total = 0;
        $nb_heure1 = 0;
        $montant_horaire1 = 0;
        $majoration1 = 0;
        $montant_total1 = 0;
        $nb_heure2 = 0;
        $montant_horaire2 = 0;
        $majoration2 = 0;
        $montant_total2 = 0;
        $nb_heure3 = 0;
        $montant_horaire3 = 0;
        $majoration3 = 0;
        $montant_total3 = 0;
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
        $pourcentage_abat_prof = 0;


        $contrat = Contrat::where('agent_id', '=', $payroll->agent->id)->with('poste')->orderByDesc('date_debut_contrat')->first();
        $nb_charges = Charge::where('agent_id', '=', $payroll->agent->id)->count();
        $bases_imposables = AffectationAvantage::where('agent_id', '=', $payroll->agent->id)->with('avantage')->get();
        $absences = Absence::where('agent_id', '=', $payroll->agent->id)->get();
        $heures_supplementaires = HeuresSupplementaire::where('agent_id', '=', $payroll->agent_id)->get();

        //dd($heures_supplementaires);

        $tableau_bases_imposables0 = $bases_imposables;
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

        foreach ($heures_supplementaires as $heure_supplementaire)
            {
                if($heure_supplementaire->mois_heure_supp >= $debut_mois && $heure_supplementaire->mois_heure_supp <= $fin_mois)
                    {
                        if($heure_supplementaire->majoration == 10)
                            {
                                $nb_heure = $nb_heure + $heure_supplementaire->nbr_heure;
                                $montant_horaire = $heure_supplementaire->montant_horaire;
                                $majoration = $heure_supplementaire->majoration;
                                $montant_total = $montant_total + $heure_supplementaire->montant_heure_supp;
                            }
                    }
            }
        $nb_heures = $nb_heure;
        $montant_horaires = $montant_horaire;
        $majorations = $majoration;
        $montant_totaux = $montant_total;

        foreach ($heures_supplementaires as $heure_supplementaire1)
            {
                if($heure_supplementaire1->mois_heure_supp >= $debut_mois && $heure_supplementaire1->mois_heure_supp <= $fin_mois)
                    {
                        if($heure_supplementaire1->majoration == 35)
                            {
                                $nb_heure1 = $nb_heure1 + $heure_supplementaire1->nbr_heure;
                                $montant_horaire1 = $heure_supplementaire1->montant_horaire;
                                $majoration1 = $heure_supplementaire1->majoration;
                                $montant_total1 = $montant_total1 + $heure_supplementaire1->montant_heure_supp;
                            }
                    }
            }
        $nb_heures1 = $nb_heure1;
        $montant_horaires1 = $montant_horaire1;
        $majorations1 = $majoration1;
        $montant_totaux1 = $montant_total1;

        foreach ($heures_supplementaires as $heure_supplementaire2)
            {
                if($heure_supplementaire2->mois_heure_supp >= $debut_mois && $heure_supplementaire2->mois_heure_supp <= $fin_mois)
                    {
                        if($heure_supplementaire2->majoration == 50)
                            {
                                $nb_heure2 = $nb_heure2 + $heure_supplementaire2->nbr_heure;
                                $montant_horaire2 = $heure_supplementaire2->montant_horaire;
                                $majoration2 = $heure_supplementaire2->majoration;
                                $montant_total2 = $montant_total2 + $heure_supplementaire2->montant_heure_supp;
                            }
                    }
            }
        $nb_heures2 = $nb_heure2;
        $montant_horaires2 = $montant_horaire2;
        $majorations2 = $majoration2;
        $montant_totaux2 = $montant_total2;

        foreach ($heures_supplementaires as $heure_supplementaire3)
            {
                if($heure_supplementaire3->mois_heure_supp >= $debut_mois && $heure_supplementaire3->mois_heure_supp <= $fin_mois)
                    {
                        if($heure_supplementaire3->majoration == 100)
                            {
                                $nb_heure3 = $nb_heure3 + $heure_supplementaire3->nbr_heure;
                                $montant_horaire3 = $heure_supplementaire3->montant_horaire;
                                $majoration3 = $heure_supplementaire3->majoration;
                                $montant_total3 = $montant_total3 + $heure_supplementaire3->montant_heure_supp;
                            }
                    }
            }
        $nb_heures3 = $nb_heure3;
        $montant_horaires3 = $montant_horaire3;
        $majorations3 = $majoration3;
        $montant_totaux3 = $montant_total3;

        dd($nb_heures, $montant_horaires, $majorations, $montant_totaux,
                   $nb_heures1, $montant_horaires1, $majorations1, $montant_totaux1,
                   $nb_heures2, $montant_horaires2, $majorations2, $montant_totaux2,
                   $nb_heures3, $montant_horaires3, $majorations3, $montant_totaux3);

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
            $m = $cotisationscnss_anpe->plafond_cnss_employe_national;
            $n = $cotisationscnss_anpe->taux_cnss_employe_national;
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

        foreach ($abattements_profs as $abattement_prof)
            {
                $pourcentage_abat_prof = $abattement_prof->pourcentage;
            }
        $somme_a_prof = (($somme_sb_tbi_cnss * $pourcentage_abat_prof) / 100);

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

        $pdf = PDF::loadView('paie.pdf', compact('payroll', 'contrat', 'nb_charges', 'bases_imposables', 'plafond_anpe', 'pourcentage_abat_prof',
         'total_bases_imposables', 'somme_sb_tbi', 'somme_sb_tbi_cnss', 'somme_sb_tbi_cnss_aprof', 'somme_cnss', 'plafond_cnss', 'salaire_brut',
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
