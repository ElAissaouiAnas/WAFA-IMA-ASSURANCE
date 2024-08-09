@extends('elements/layout')
@section('stylesheets')
<link href="{{ asset('assets/css/jquery.realperson.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('main')
<style>
.has-error .help-block {
    display: none !important
}

.has-error a {
    color: #a94442 !important;
}
</style>
<section style="margin-top:20px; padding-top: 30px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <ul class="process-steps  nav nav-justified text-center" style="padding-left: auto">
                    <li class="hidden-xs">
                        <a class="hiw" style="background-color: #eee;margin-bottom: 20px">1</a>
                        <h5 style="margin:0">Identification</h5>
                    </li>
                    <li class="">
                        <a class="hiw mine-purple" style="margin-bottom: 20px">2</a>
                        <h5 style="margin:0">Validation</h5>
                    </li>
                    <li class="hidden-xs">
                        <a class="hiw" style="background-color: #eee;margin-bottom: 20px">3</a>
                        <h5 style="margin:0">Confirmation</h5>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:20px">
        <h1 class="text-center">Résumé de votre demande d'assurance voyage</h1>
        <div class="col-lg-12 col-md-12">
            <form data-toggle="validator" role="form" method="post" action="{{ route('checkout') }}">
                {{ csrf_field() }}
                <div class="box-light">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-transparent">
                                    <h2 class="panel-title my-green">Contrat</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4 form-group">
                                            <label>Compagnie d'Assurance:</label>
                                            <p class="form-control-static">{{ $contrat['company']}}</p>
                                        </div>
                                        <div class="col-sm-6 col-md-3 form-group">
                                            <label>Type de contrat:</label>
                                            <p class="form-control-static">{{ $contrat['type']}}</p>
                                        </div>
                                        <div class="col-sm-6 col-md-2 form-group">
                                            <label>Durée:</label>
                                            <p class="form-control-static">{{ $contrat['duree']}}</p>
                                        </div>
                                        <div class="col-sm-6 col-md-3 form-group">
                                            <label>Prix TTC:</label>
                                            <p class="form-control-static"><label style="font-size: 19px;"><b
                                                        style="font-size: 25px;color: #4CAF50;">{{ $data['montant'] }}</b>
                                                    <b style="font-size: 25px;color: #4CAF50;">Dhs</b></label></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-light" style="margin-top:20px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-transparent">
                                    <h2 class="panel-title my-green">Assuré</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Date d'effet:</label>
                                            <p class="form-control-static">{{ $data['date_effet']}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom:</label>
                                            <p class="form-control-static">{{ $data['prenom']}}</p>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom:</label>
                                            <p class="form-control-static">{{ $data['nom']}}</p>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>CIN / N° passeport:</label>
                                            <p class="form-control-static">{{ $data['cin']}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>E-mail:</label>
                                            <p class="form-control-static">{{ $data['email']}}</p>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Numéro de Téléphone GSM:</label>
                                            <p class="form-control-static">{{ $data['tel']}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Lieu de naissance:</label>
                                            <p class="form-control-static">{{ $data['lieunaissance']}}</p>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance:</label>
                                            <p class="form-control-static">{{ $data['datenaissance']}}</p>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Véhicule:</label>
                                            <p class="form-control-static">{{ $data['vehicule']}}</p>
                                        </div>
                                        <div class="col-md-4 form-group" id="d_conjoints" style="display: none">
                                            <label>Conjoint(s):</label>
                                            <p class="form-control-static">{{ $data['conjoints']}}</p>
                                        </div>
                                        <div class="col-md-4 form-group" id="d_enfants" style="display: none">
                                            <label>Enfants à charge <small>(25 ans maximum)</small>:</label>
                                            <p class="form-control-static">{{ $data['enfants']}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 form-group">
                                            <label>Addresse de l'assuré:</label>
                                            <p class="form-control-static">{{ $data['addresse']}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Ville:</label>
                                            <p class="form-control-static">{{ $data['ville']}}</p>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Pays:</label>
                                            <p class="form-control-static">{{ $data['pays']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($data['conjoints']): ?>
                <div id="div_conjoints" class="box-light" style="margin-top:20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-transparent">
                                    <h2 class="panel-title my-green">Conjoint(s)</h2>
                                </div>
                                <div class="panel-body">
                                    <?php for ($i=1; $i <= $data['conjoints']; $i++) { ?>
                                    <div id="c<?php echo $i ?>" class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom <?php echo $i ?>:</label>
                                            <p class="form-control-static"><?php echo $data['prenom_c'.$i] ?></p>
                                            <input type="hidden" name="prenom_c<?php echo $i ?>"
                                                value="<?php echo $data['prenom_c'.$i] ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom <?php echo $i ?>:</label>
                                            <p class="form-control-static"><?php echo $data['nom_c'.$i] ?></p>
                                            <input type="hidden" name="nom_c<?php echo $i ?>"
                                                value="<?php echo $data['nom_c'.$i] ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance <?php echo $i ?>:</label>
                                            <p class="form-control-static"><?php echo $data['datenaissance_c'.$i] ?></p>
                                            <input type="hidden" name="datenaissance_c<?php echo $i ?>"
                                                value="<?php echo $data['datenaissance_c'.$i] ?>" />
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
                <?php if ($data['enfants']): ?>
                <div id="div_enfants" class="box-light" style="margin-top:20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-transparent">
                                    <h2 class="panel-title my-green">Enfants</h2>
                                </div>
                                <div class="panel-body">
                                    <?php for ($i=1; $i <= $data['enfants']; $i++) { ?>
                                    <div id="e1" class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom <?php echo $i ?>:</label>
                                            <p class="form-control-static"><?php echo $data['prenom_e'.$i] ?></p>
                                            <input type="hidden" name="prenom_e<?php echo $i ?>"
                                                value="<?php echo $data['prenom_e'.$i] ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom <?php echo $i ?>:</label>
                                            <p class="form-control-static"><?php echo $data['nom_e'.$i] ?></p>
                                            <input type="hidden" name="nom_e<?php echo $i ?>"
                                                value="<?php echo $data['nom_e'.$i] ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance <?php echo $i ?>:</label>
                                            <p class="form-control-static"><?php echo $data['datenaissance_e'.$i] ?></p>
                                            <input type="hidden" name="datenaissance_e<?php echo $i ?>"
                                                value="<?php echo $data['datenaissance_e'.$i] ?>" />
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
                <?php if ($data['vehicule'] == 'Oui'): ?>
                <div id="div_enfants" class="box-light" style="margin-top:20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-transparent">
                                    <h2 class="panel-title my-green">Véhicule</h2>
                                </div>
                                <div class="panel-body">
                                    <div id="e1" class="row">
                                        <div class="col-md-3 form-group">
                                            <label>Année:</label>
                                            <p class="form-control-static"><?php echo $data['annee_vehicule'] ?></p>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Marque:</label>
                                            <p class="form-control-static"><?php echo $data['marque_vehicule'] ?></p>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Modèle:</label>
                                            <p class="form-control-static"><?php echo $data['modele_vehicule'] ?></p>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Plaque d'immatriculation:</label>
                                            <p class="form-control-static"><?php echo $data['num_vehicule'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <div class="box-light col-md-12" style="margin-top:20px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-transparent">
                                    <h2 class="panel-title my-green">Mode de réservation</h2>
                                </div>
                                <div class="panel-body" style="min-height: 355px;">
                                    <div class="row">
                                        {{--<div class="col-md-12 form-group">
                                            <label class="radio no-padding-right size-12">
                                                <input type="radio" value="binga" name="payment_method" required
                                                     />

                                                <i></i>
                                                <div style="margin-bottom: 10px;">
                                                    Paiement espèces auprès de notre partenaire Binga. Confirmez votre
                                                    commande pour obtenir votre pré-réservation. Présentez-là dans une
                                                    des agences Wafacash pour régler votre achat ( sous 7 jours ).
                                                    <!-- <br>Cette option implique des frais de service par Wafacash. --><br>Pour
                                                    plus d'info <a href="http://www.binga.ma/" target="_blank"
                                                        style="text-decoration:underline">cliquez ici</a>. <br>
                                                </div>
                                                <div><img src="{{ asset('/images/binga.png')}}" alt="Binga.ma"
                                        height="50px" /></div>
                                    </label>
                                </div>--}}
                                <div class="col-md-12 form-group">
                                    <label class="radio no-padding-right size-12">
                                        <input type="radio" value="mtc" name="payment_method" required />
                                        <i></i>
                                        <div style="margin-bottom: 10px;">
                                            Carte bancaire
                                        </div>
                                        <div><img src="{{ asset('/images/cardCredit.jpg')}}" alt="PAYZONE" />
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="checkbox no-padding-right size-12">
                                        <input type="checkbox" value="3" name="radio-condition-3" required />
                                        <i></i> <a href="{{ route('conditions_generales') }}" target="_blank">Je
                                            confirme avoir lu les conditions générales du contrat et exprime par
                                            la même occasion mon consentement à les accepter.</a>
                                    </label>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="checkbox no-padding-right size-12">
                                        <input type="checkbox" value="4" name="radio-condition-4" required />
                                        <i></i> J’ai bien compris la nécessité de retourner le contrat signé
                                        pour l’obtention de l’attestation de voyage.
                                    </label>
                                </div>
                                <div class="col-md-12 form-group text-right">
                                    <label style="font-size: 19px;">Montant de la réservation : <b
                                            style="font-size: 25px;color: #4CAF50;">{{ $data['montant'] }}</b>
                                        <b style="font-size: 25px;color: #4CAF50;">Dhs</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" style="background:#fff">
                            <div class="row">
                                <div class="col-md-3 hidden-xs">
                                    <a href="{{ route('formulaire') }}/{{ base64_encode($data['id']) }}"
                                        class="btn btn-danger btn-block"><i class="fa fa-arrow-left"></i>
                                        MODIFIER </a>
                                </div>
                                <div class="col-md-6 hidden-xs"></div>
                                <div class="col-md-3">
                                    <input type="hidden" id="assurance_id" name="assurance_id"
                                        value="{{ $data['id'] }}" />
                                    <button type="submit" class="btn btn-success btn-block">CONFIRMER <i
                                            class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    </form>
    </div>
    </div>
</section>
@endsection
@section('javascripts')
<script type="text/javascript" src="{{ asset('assets/js/validator.min.js')}}"></script>
@endsection