<fieldset>
    <hr>
         <h2 style="text-align: center; "><strong><b>BULLETIN DE PAIE</b></strong></h2>
    <hr>
        <!-- Content Row -->
    <div class="row">

        <!-- Border Left Utilities -->
        <div class="col-lg-12">

          <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">

              <div class="col-lg-12">
                  <div class="general-info">
                      <div class="row">
                          <div class="col-lg-12 col-xl-6">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <th style="border: 1px solid; padding: 5px;">Nom </th>
                                        <td style="border: 1px solid; padding: 5px;">{{ $payroll->agent->nom}}</td>
                                        <th style="border: 1px solid; padding: 5px;">Pénom </th>
                                        <td style="border: 1px solid; padding: 5px;">{{ $payroll->agent->prenom}}</td>
                                    </tr>
                                    <tr>
                                        <th style="border: 1px solid; padding: 5px;">Fonction </th>
                                        <td style="border: 1px solid; padding: 5px;">{{ $contrat->poste->intitule}}</td>
                                        <th style="border: 1px solid; padding: 5px;">Date d'embauche </th>
                                        <td style="border: 1px solid; padding: 5px;">{{ $contrat->date_debut_contrat }}</td>
                                    </tr>
                                    <tr>
                                        <th style="border: 1px solid; padding: 5px;">Mois de </th>
                                        <td style="border: 1px solid; padding: 5px;">{{ $payroll->mois->format('F Y') }}</td>
                                        <th style="border: 1px solid; padding: 5px;">Période </th>
                                        <td style="border: 1px solid; padding: 5px;">{{ 'Du'.' '.$payroll->debut_mois.' '.'Au'.' '.$payroll->fin_mois }}</td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                      </div>
                      <!-- end of row -->
                  </div>
                  <!-- end of general info -->
              </div>
              <!-- end of col-lg-12 -->
              <br><br>
              <div class="col-lg-12">
                  <div class="general-info">
                      <div class="row">
                          <div class="col-lg-12 col-xl-12">
                                  <table style="width: 100%;">
                                      <thead>
                                          <tr style="background-color: rgb(180, 180, 180);">
                                              <th style="border: 1px solid; padding: 5px;">Rubriques </th>
                                              <th style="border: 1px solid; padding: 5px;">Nombre / Taux </th>
                                              <th style="border: 1px solid; padding: 5px;">Base </th>
                                              <th style="border: 1px solid; padding: 5px;">A payer </th>
                                              <th style="border: 1px solid; padding: 5px;">A retenir </th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Salaire de base</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $contrat->salaire_base }}</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $contrat->salaire_base }}</th>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Prime d'anciéneté</th>
                                                <th style="border: 1px solid; padding: 5px;">0%</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">0.00</th>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Bases imposables</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $total_bases_imposables }}</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Bases non imposables</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">0.00</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Salaire brut</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $somme_sb_tbi }}</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Cotisation CNSS </th>
                                                <th style="border: 1px solid; padding: 5px;">5.25%</th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $somme_sb_tbi }}</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $somme_cnss }}</th>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Abattement Professionnel</th>
                                                <th style="border: 1px solid; padding: 5px;">15%</th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $somme_sb_tbi_cnss }}</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $somme_a_prof }}</th>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Charge familiale</th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $nb_charges}}</th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $somme_sb_tbi_cnss_aprof }}</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $somme_a_fam }}</th>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Salaire net imposable</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $somme_sb_tbi_cnss_aprof_afam }}</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Impôt sur le salaire</th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $pourcentage_iuts.'%' }}</th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $somme_sb_tbi_cnss_aprof_afam }}</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $somme_iuts }}</th>
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid; padding: 5px;">Salaire net</th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;"></th>
                                                <th style="border: 1px solid; padding: 5px;">{{ $payroll->net_a_payer }}</th>
                                                <th style="border: 1px solid; padding: 5px;">0.00</th>
                                            </tr>
                                      </tbody>
                                  </table>
                          </div>
                          <!-- end of table col-lg-12 -->
                      </div>
                      <!-- end of row -->
                  </div>
                  <!-- end of general info -->
              </div>
              <!-- end of col-lg-12 -->

              <br><br>
              <div class="col-lg-12">
                  <div class="general-info">
                      <div class="row">
                          <div class="col-lg-12 col-xl-12">
                            <table style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th> </th>
                                        <th style="border: 1px solid; padding: 5px; background-color: rgb(180, 180, 180);">Salaire de base</th>
                                        <th style="border: 1px solid; padding: 5px; background-color: rgb(180, 180, 180);">Net à payer </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th style="border: 1px solid; padding: 5px;">Mensuel</th>
                                        <th style="border: 1px solid; padding: 5px;">{{ $contrat->salaire_base }}</th>
                                        <th style="border: 1px solid; padding: 5px;">{{ $payroll->net_a_payer }}</th>
                                    </tr>
                                    <tr>
                                        <th style="border: 1px solid; padding: 5px;">Annuel</th>
                                        <th style="border: 1px solid; padding: 5px;">{{ $contrat->salaire_base }}</th>
                                        <th style="border: 1px solid; padding: 5px;">{{ $payroll->net_a_payer }}</th>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                          <!-- end of table col-lg-12 -->
                      </div>
                      <!-- end of row -->
                  </div>
                  <!-- end of general info -->
              </div>
              <!-- end of col-lg-12 -->

              <div class="col-lg-12">
                  <div class="general-info">
                      <div class="row">
                          <div class="col-lg-12 col-xl-12">
                            <h4 style="text-align: center;"><strong>Signature</strong></h4>
                          </div>
                          <!-- end of table col-lg-12 -->
                      </div>
                      <!-- end of row -->
                  </div>
                  <!-- end of general info -->
              </div>
              <!-- end of col-lg-12 -->
              <br><br>
          </div>
          <!-- end of row -->
      </div>
      <!-- end of general info -->
      </div>
      <!-- end of col-lg-12 -->

            </div>
          </div>

        </div>

      </div>

</fieldset>




