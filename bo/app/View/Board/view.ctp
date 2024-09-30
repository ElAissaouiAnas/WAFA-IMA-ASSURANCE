<div class="box box-default">
  <div class="box-header with-border no-print">
    <h3 class="box-title pull-left"> </h3>
    <button type="submit" class="btn btn-primary pull-right no-print" onClick="print();" ><i class="fa fa-print"></i> Imprimer</button>
    <a href="<?php echo $this->Html->url('/board/callcenter')?>" class="btn btn-info pull-right no-print" style="margin-right: 10px"><i class="fa fa-arrow-left"></i> Retour</a>
  </div>
  <div class="box-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Contrat</div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-3 form-group">
                            <label>Issuer:</label>
                            <p class="form-control-static"><?php echo $payment['Assurance']['issuer'] ?></p>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label>Compagnie d'Assurance:</label>
                            <p class="form-control-static"><?php echo $payment['Contrat']['company'] ?></p>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label>Type de contrat</label>
                            <p class="form-control-static"><?php echo $payment['Contrat']['type'] ?></p>
                        </div>
                        <div class="col-xs-3 form-group">
                            <label>Durée</label>
                            <p class="form-control-static"><?php echo $payment['Contrat']['duree'] ?></p>
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
                                <label>Nom:</label>
                            	<p class="form-control-static"><?php echo $payment['Assurance']['nom'] ?></p>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Prénom:</label>
                            	<p class="form-control-static"><?php echo $payment['Assurance']['prenom'] ?></p>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>CIN / N° passeport:</label>
                            	<p class="form-control-static"><?php echo $payment['Assurance']['cin'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 form-group">
                                <label>Date d'effet:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['date_effet'] ?></p>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>E-mail:</label>
                            	<p class="form-control-static"><?php echo $payment['Assurance']['email'] ?></p>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Numéro de Téléphone GSM:</label>
                            	<p class="form-control-static"><?php echo $payment['Assurance']['tel'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 form-group">
                                <label>Lieu de naissance:</label>
                                <div class="input-group">
                            		<p class="form-control-static"><?php echo $payment['Assurance']['lieunaissance'] ?></p>
                                </div>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance:</label>
                                <div class="input-group">
                                    <p class="form-control-static"><?php echo $payment['Assurance']['datenaissance'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 form-group">
                                <label>Addresse de l'assuré:</label>
                                <div class="input-group">
                                    <p class="form-control-static"><?php echo $payment['Assurance']['addresse'] ?></p>
                                </div>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Ville:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['ville'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 form-group">
                                <label>Véhicule:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['vehicule'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <?php if ($payment['Assurance']['annee_vehicule']): ?>
                            <div class="col-xs-4 form-group">
                                <label>Année:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['annee_vehicule'] ?></p>
                            </div>
                            <?php endif ?>
                            <?php if ($payment['Assurance']['marque_vehicule']): ?>
                            <div class="col-xs-4 form-group">
                                <label>Marque:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['marque_vehicule'] ?></p>
                            </div>
                            <?php endif ?>
                            <?php if ($payment['Assurance']['modele_vehicule']): ?>
                            <div class="col-xs-4 form-group">
                                <label>Modèle:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['modele_vehicule'] ?></p>
                            </div>
                            <?php endif ?>
                            <?php if ($payment['Assurance']['num_vehicule']): ?>
                            <div class="col-xs-4 form-group">
                                <label>Plaque d'immatriculation:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['num_vehicule'] ?></p>
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="row">
                            <?php if ($payment['Assurance']['conjoints']): ?>
                                <div class="col-xs-4 form-group">
                                    <label>Conjoint(s):</label>
                                    <p class="form-control-static"><?php echo $payment['Assurance']['conjoints'] ?></p>
                                </div>
                                <div class="col-xs-4 form-group">
                                    <label>Enfants à charge <small>(25 ans maximum)</small>:</label>
                                    <p class="form-control-static"><?php echo $payment['Assurance']['enfants'] ?></p>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($payment['Assurance']['conjoints']): ?>
        <div id="div_conjoints" class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Conjoint(s)</div>
                    <div class="panel-body">
                    	<?php for ($i=1; $i <= $payment['Assurance']['conjoints']; $i++) { ?>
                        <div id="c<?php echo $i ?>" class="row">
                            <div class="col-xs-4 form-group">
                                <label>Nom <?php echo $i ?>:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['nom_c'.$i] ?></p>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Prénom <?php echo $i ?>:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['prenom_c'.$i] ?></p>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance <?php echo $i ?>:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['datenaissance_c'.$i] ?></p>
                            </div>
                        </div>
                    	<?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <?php if ($payment['Assurance']['enfants']): ?>
        <div id="div_enfants" class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Enfants</div>
                    <div class="panel-body">
                    	<?php for ($i=1; $i <= $payment['Assurance']['enfants']; $i++) { ?>
                        <div id="e<?php echo $i ?>" class="row">
                            <div class="col-xs-4 form-group">
                                <label>Nom <?php echo $i ?>:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['nom_e'.$i] ?></p>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Prénom <?php echo $i ?>:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['prenom_e'.$i] ?></p>
                            </div>
                            <div class="col-xs-4 form-group">
                                <label>Date de naissance <?php echo $i ?>:</label>
                                <p class="form-control-static"><?php echo $payment['Assurance']['datenaissance_e'.$i] ?></p>
                            </div>
                        </div>
                    	<?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <div class="row">
            <div class="col-xs-6 col-xs-offset-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Détails de paiement</div>
                    <div class="panel-body">
                        <!-- <div class="form-group">
                            <label>Age de l'assuré: <b id="age">0</b></label>
                        </div> -->
                        <div class="form-group">
                            <label style="font-size: 19px;">Montant de la prime: <b id="prime_ttc" style="font-size: 25px;color: #4CAF50;"><?php echo $payment['Contrat']['prime_ttc'] ?></b> <b style="font-size: 25px;color: #4CAF50;">Dhs</b></label>
                        </div>
                        <!-- <div class="form-group">
                            <label>Montant à régler chez wafacash: <b id="montant_wafacash">0</b> <b>Dhs</b></label>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
  </div>
  <!-- /.box-body -->
</div>