<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Formulaire</h3>
  </div>
  <div class="box-body">
    <form data-toggle="validator" role="form" method="POST">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Contrat</div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-3 form-group">
                            <label>Issuer<sup style="color:red">*</sup>:</label>
                            <select class="form-control" id="isseur" name="isseur" required>
                                <option></option>
                                <option value="cas2fr - Casablanca France">cas2fr - Casablanca France</option>
                                <option value="tng2fr - Tanger France">tng2fr - Tanger France</option>
                                <option value="oud2fr - Oujda France">oud2fr - Oujda France</option>
                                <option value="fes2fr - Fes France">fes2fr - Fes France</option>
                                <option value="rba2fr - Rabat France">rba2fr - Rabat France</option>
                                <option value="rak2fr - Marrakech France">rak2fr - Marrakech France</option>
                                <option value="aga2fr - Agadir France">aga2fr - Agadir France</option>z
                                <option value="cas2be - Casablanca Belgique">cas2be - Casablanca Belgique</option>
                                <option value="cas2it - Casablanca Italie">cas2it - Casablanca Italie</option>
                                <option value="rba2it - Rabat Italie">rba2it - Rabat Italie</option>
                                <option value="rba2dk - Rabat Danemark">rba2dk - Rabat Danemark</option>
                                <option value="rba2de - Rabat Allemagne">rba2de - Rabat Allemagne</option>
                                <option value="rak2de - Marrakech Allemagne">rak2de - Marrakech Allemagne</option>
                                <option value="ndr2de - Nador Allemagne">ndr2de - Nador Allemagne</option>
                                <option value="oud2dk - Oujda Danemark">oud2dk - Oujda Danemark</option>
                            </select>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label>Compagnie d'Assurance<sup style="color:red">*</sup>:</label>
                            <select class="form-control" id="company" name="company" required>
                              <option></option>
                              <option value="MAROC ASSISTANCE INTERNATIONAL">MAROC ASSISTANCE INTERNATIONAL</option>
                              <option value="WAFA IMA">WAFA IMA</option>
                              <option value="AXA ASSISTANCE">AXA ASSISTANCE</option>
                            </select>
                        </div>
                        <!-- <div class="col-xs-3 form-group">
                            <label>Type de contrat<sup style="color:red">*</sup>:</label>
                            <select class="form-control" id="couverture" name="couverture" required>
                              <option></option>
                            </select>
                        </div> -->
                        <div class="col-xs-3 form-group">
                            <label>Type de contrat<sup style="color:red">*</sup>:</label>
                            <select class="form-control" id="type" name="type" required>
                              <option></option>
                            </select>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label>Durée<sup style="color:red">*</sup>:</label>
                            <select class="form-control" id="duree" name="duree" required>
                              <option></option>
                              <option value="6 mois">6 mois</option>
                              <option value="1 an">1 an</option>
                              <option value="2 ans">2 ans</option>
                              <option value="3 ans">3 ans</option>
                              <option value="4 ans">4 ans</option>
                              <option value="5 ans">5 ans</option>
                            </select>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Assuré</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4 form-group">
                                <label>Prénom<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" required />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom" name="nom" required />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>CIN / N° passeport:</label>
                                <input type="text" class="form-control" id="cin" name="cin" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 form-group">
                                <label>Date d'effet:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="date_effet" id="date_effet" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" required />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>E-mail<sup style="color:red">*</sup>:</label>
                                <input type="email" class="form-control" id="email" name="email" required />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Numéro de Téléphone GSM<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="tel" name="tel" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 form-group">
                                <label>Lieu de naissance<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="lieunaissance" name="lieunaissance" required />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="datenaissance" id="date_naissance" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" required />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                            <div class="col-xs-4 form-group" id="d_conjoints" style="display: none">
                                <label>Conjoint(s):</label>
                                <select class="form-control" id="conjoints" name="conjoints">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="col-xs-4 form-group" id="d_enfants" style="display: none">
                                <label>Enfants à charge <small>(25 ans maximum)</small>:</label>
                                <select class="form-control" id="enfants" name="enfants">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                             <div class="col-xs-4 form-group" id="d_vehicule" style="display: none">
                                <label>Véhicule:</label>
                                <select class="form-control" id="vehicule" name="vehicule">
                                    <option value="Non">Non</option>
                                    <option value="Oui">Oui</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 form-group">
                                <label>Addresse de l'assuré:</label>
                                <textarea class="form-control" id="addresse" name="addresse" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Ville:<sup style="color:red">*</sup></label>
                                <input type="text" class="form-control" id="ville" name="ville" value="" required />
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Pays:<sup style="color:red">*</sup></label>
                                <select class="form-control" id="pays" name="pays" required>
                                    <option value="Maroc">Maroc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="div_conjoints" class="row" style="display: none">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Conjoint(s)</div>
                    <div class="panel-body">
                        <div id="c1" class="row">
                            <div class="col-xs-4 form-group">
                                <label>Prénom 1<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom_c1" name="prenom_c1" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom 1<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom_c1" name="nom_c1" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance 1<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="datenaissance_c1" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div id="c2" class="row" style="display: none">
                            <div class="col-xs-4 form-group">
                                <label>Prénom 2<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom_c2" name="prenom_c2" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom 2<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom_c2" name="nom_c2" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance 2<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="datenaissance_c2" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div id="c3" class="row" style="display: none">
                            <div class="col-xs-4 form-group">
                                <label>Prénom 3<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom_c3" name="prenom_c3" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom 3<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom_c3" name="nom_c3" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance 3<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="datenaissance_c3" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div id="c4" class="row" style="display: none">
                            <div class="col-xs-4 form-group">
                                <label>Prénom 4<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom_c4" name="prenom_c4" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom 4<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom_c4" name="nom_c4" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance 4<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="datenaissance_c4" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="div_enfants" class="row" style="display: none">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Enfants</div>
                    <div class="panel-body">
                        <div id="e1" class="row">
                            <div class="col-xs-4 form-group">
                                <label>Prénom 1<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom_e1" name="prenom_e1" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom 1<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom_e1" name="nom_e1" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance 1<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="datenaissance_e1" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div id="e2" class="row" style="display: none">
                            <div class="col-xs-4 form-group">
                                <label>Prénom 2<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom_e2" name="prenom_e2" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom 2<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom_e2" name="nom_e2" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance 2<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="datenaissance_e2" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div id="e3" class="row" style="display: none">
                            <div class="col-xs-4 form-group">
                                <label>Prénom 3<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom_e3" name="prenom_e3" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom 3<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom_e3" name="nom_e3" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance 3<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="datenaissance_e3" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div id="e4" class="row" style="display: none">
                            <div class="col-xs-4 form-group">
                                <label>Prénom 4<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom_e4" name="prenom_e4" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom 4<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom_e4" name="nom_e4" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance 4<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="datenaissance_e4" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div id="e5" class="row" style="display: none">
                            <div class="col-xs-4 form-group">
                                <label>Prénom 5<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom_e5" name="prenom_e5" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom 5<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom_e5" name="nom_e5" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance 5<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="datenaissance_e5" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div id="e6" class="row" style="display: none">
                            <div class="col-xs-4 form-group">
                                <label>Prénom 6<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="prenom_e6" name="prenom_e6" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Nom 6<sup style="color:red">*</sup>:</label>
                                <input type="text" class="form-control" id="nom_e6" name="nom_e6" />
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance 6<sup style="color:red">*</sup>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="datenaissance_e6" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-xs-offset-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Détails de paiement</div>
                    <div class="panel-body">
                        <!-- <div class="form-group">
                            <label>Age de l'assuré: <b id="age">0</b></label>
                        </div> -->
                        <div class="form-group">
                            <label style="font-size: 19px;">Montant de la prime: <b id="prime_ttc" style="font-size: 25px;color: #4CAF50;">0</b> <b style="font-size: 25px;color: #4CAF50;">Dhs</b></label>
                        </div>
                        <!-- <div class="form-group">
                            <label>Montant à régler chez wafacash: <b id="montant_wafacash">0</b> <b>Dhs</b></label>
                        </div> -->
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="hidden" id="contrat_id" name="contrat_id" value="" />
                                <button type="submit" class="btn btn-success pull-right">Generate Code</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
  </div>
  <!-- /.box-body -->
</div>