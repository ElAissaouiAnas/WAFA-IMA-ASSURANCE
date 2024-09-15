@extends('elements/layout') @section('stylesheets')
<link href="{{ asset('assets/plugins/bootstrap.datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/css/jquery.realperson.css')}}" rel="stylesheet" type="text/css" /> @endsection
@section('main')
<style>
.has-error .help-block {
    display: none !important
}
</style>
<section style="margin-top:20px; padding-top: 30px">
    <div class="container">
        @php($error = request()->input('error'))
        @if(isset($error))<div class="alert alert-danger" role="alert">{{$error ?? ''}}</div> @endif
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <ul class="process-steps  nav nav-justified text-center" style="padding-left: auto">
                    <li class="">
                        <a class="hiw mine-purple" style="margin-bottom: 20px">1</a>
                        <h5 style="margin:0">Identification</h5>
                    </li>
                    <li class="hidden-xs">
                        <a class="hiw" style="background-color: #eee;margin-bottom: 20px">2</a>
                        <h5 style="margin:0">Réservation</h5>
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
        <div class="col-lg-12 col-md-12">
            <form data-toggle="validator" role="form" method="post" action="{{ route('paiement') }}">
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
                                        <div class="col-md-4 form-group">
                                            <input type="hidden" id="company" name="company"
                                                value="WAFA IMA ASSISTANCE">
                                            <label>Company :</label>
                                            <div class="form-control">WAFA IMA ASSISTANCE</div>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label>Type de contrat<sup style="color:red">*</sup>:</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option></option>
                                                <option value="Wafa Monde" <?php echo isset($contrat['type'])
                                                    && trim($contrat['type'])=='Wafa Monde' ? 'selected' : ''
                                                    ?>>
                                                    Wafa Monde</option>
                                                <option value="Wafa Schengen" <?php
                                                    echo isset($contrat['type']) &&
                                                    trim($contrat['type'])=='Wafa Schengen'
                                                    ? 'selected' : '' ?>>
                                                    Wafa Schengen</option>
                                                <option value="Wafa Schengen" <?php
                                                    echo isset($contrat['type']) &&
                                                    trim($contrat['type'])=='Wafa Etudiant Expatrié'
                                                    ? 'selected' : '' ?>>
                                                    Wafa Etudiant Expatrié</option>
                                            </select>
                                            <small>Choix disponibles : Schengen ou Monde</small>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Durée<sup style="color:red">*</sup>:</label>
                                            <select class="form-control" id="duree" name="duree" required>
                                                <option></option>
                                                <option value="6 mois" <?php echo isset($contrat['duree']) &&
                                                    trim($contrat['duree'])=='6 mois' ? 'selected' : '' ?>>
                                                    6 mois</option>
                                                <option value="1 an" <?php echo isset($contrat['duree']) &&
                                                    trim($contrat['duree'])=='1 an' ? 'selected' : '' ?>>
                                                    1 an</option>
                                            </select>
                                            <small>Choix disponibles : 6 mois, 1 an</small>
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
                                            <label>Date d'effet<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_min datepicker_"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    autocomplete="off" name="date_effet" id="date_effet"
                                                    value="<?php echo isset($assurance['date_effet']) ? $assurance['date_effet'] : '' ?>"
                                                    required />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom<sup style="color:red">*</sup>:</label>
                                            <input type="text" pattern="[A-Za-z ]{3,100}" class="form-control"
                                                id="prenom" name="prenom"
                                                value="<?php echo isset($assurance['prenom']) ? $assurance['prenom'] : '' ?>"
                                                required />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom<sup style="color:red">*</sup>:</label>
                                            <input type="text" pattern="[A-Za-z ]{3,100}" class="form-control" id="nom"
                                                name="nom"
                                                value="<?php echo isset($assurance['nom']) ? $assurance['nom'] : '' ?>"
                                                required />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>CIN / N° passeport<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="cin" name="cin"
                                                value="<?php echo isset($assurance['cin']) ? $assurance['cin'] : '' ?>"
                                                required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Email<sup style="color:red">*</sup>:</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="<?php echo isset($assurance['email']) ? $assurance['email'] : '' ?>"
                                                required />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Confirmez votre email<sup style="color:red">*</sup>:</label>
                                            <input type="email" name="confirmationEmail" class="form-control"
                                                value="<?php echo isset($assurance['email']) ? $assurance['email'] : '' ?>"
                                                required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Numéro de Téléphone<sup style="color:red">*</sup>:</label>
                                            <input type="tel" pattern="[0-9]{10,16}" class="form-control" id="tel"
                                                name="tel"
                                                value="<?php echo isset($assurance['tel']) ? $assurance['tel'] : '' ?>"
                                                required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Lieu de naissance<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="lieunaissance"
                                                name="lieunaissance"
                                                value="<?php echo isset($assurance['datenaissance']) ? $assurance['datenaissance'] : '' ?>"
                                                required />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker_" autocomplete="off"
                                                    name="datenaissance" id="date_naissance"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['datenaissance']) ? $assurance['datenaissance'] : '' ?>"
                                                    required />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Véhicule:</label>
                                            <select class="form-control" id="vehicule" name="vehicule">
                                                <option value="Non" <?php echo isset($assurance['vehicule']) &&
                                                    trim($assurance['vehicule'])=='Non' ? 'selected' : '' ?>>
                                                    Non</option>
                                                <option value="Oui" <?php echo isset($assurance['vehicule']) &&
                                                    trim($assurance['vehicule'])=='Oui' ? 'selected' : '' ?>>
                                                    Oui</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group" id="d_conjoints"
                                            style="<?php echo isset($contrat['type']) && trim($contrat['type']) != 'Assistance Schengen' ? 'display: block' : 'display: none'; ?>">
                                            <label>Conjoint(s):</label>
                                            <select class="form-control" id="conjoints" name="conjoints">
                                                <option value="0" <?php echo isset($assurance['conjoints']) &&
                                                    trim($assurance['conjoints'])=='0' ? 'selected' : '' ?>>
                                                    0</option>
                                                <option value="1" <?php echo isset($assurance['conjoints']) &&
                                                    trim($assurance['conjoints'])=='1' ? 'selected' : '' ?>>
                                                    1</option>
                                                <option value="2" <?php echo isset($assurance['conjoints']) &&
                                                    trim($assurance['conjoints'])=='2' ? 'selected' : '' ?>>
                                                    2</option>
                                                <option value="3" <?php echo isset($assurance['conjoints']) &&
                                                    trim($assurance['conjoints'])=='3' ? 'selected' : '' ?>>
                                                    3</option>
                                                <option value="4" <?php echo isset($assurance['conjoints']) &&
                                                    trim($assurance['conjoints'])=='4' ? 'selected' : '' ?>>
                                                    4</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group" id="d_enfants"
                                            style="<?php echo isset($contrat['type']) && trim($contrat['type']) != 'Assistance Schengen' ? 'display: block' : 'display: none'; ?>">
                                            <label>Enfants à charge <small>(25 ans maximum)</small>:</label>
                                            <select class="form-control" id="enfants" name="enfants">
                                                <option value="0" <?php echo isset($assurance['enfants']) &&
                                                    trim($assurance['enfants'])=='0' ? 'selected' : '' ?>>
                                                    0</option>
                                                <option value="1" <?php echo isset($assurance['enfants']) &&
                                                    trim($assurance['enfants'])=='1' ? 'selected' : '' ?>>
                                                    1</option>
                                                <option value="2" <?php echo isset($assurance['enfants']) &&
                                                    trim($assurance['enfants'])=='2' ? 'selected' : '' ?>>
                                                    2</option>
                                                <option value="3" <?php echo isset($assurance['enfants']) &&
                                                    trim($assurance['enfants'])=='3' ? 'selected' : '' ?>>
                                                    3</option>
                                                <option value="4" <?php echo isset($assurance['enfants']) &&
                                                    trim($assurance['enfants'])=='4' ? 'selected' : '' ?>>
                                                    4</option>
                                                <option value="5" <?php echo isset($assurance['enfants']) &&
                                                    trim($assurance['enfants'])=='5' ? 'selected' : '' ?>>
                                                    5</option>
                                                <option value="6" <?php echo isset($assurance['enfants']) &&
                                                    trim($assurance['enfants'])=='6' ? 'selected' : '' ?>>
                                                    6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 form-group">
                                            <label>Adresse de l’assuré:</label>
                                            <textarea class="form-control" id="addresse" name="addresse"
                                                rows="6"><?php echo isset($assurance['addresse']) ? $assurance['addresse'] : '' ?></textarea>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>
                                                Veuillez saisir l'image<sup style="color:red">*</sup>
                                                <span style="cursor: pointer" class='popover-notitle' data-rel="popover"
                                                    data-placement="right"
                                                    data-content="<div style='width:250px'>Veuillez entrer les caractères qui s'affichent dans l'image</div>">
                                                    <i class="fa fa-info-circle text-info"></i>
                                                </span>
                                            </label>

                                            <input type="text" name="defaultReal" id="defaultReal" value="" required
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Ville:<sup style="color:red">*</sup></label>
                                            <input type="text" class="form-control" id="ville" name="ville"
                                                value="<?php echo isset($assurance['ville']) ? $assurance['ville'] : '' ?>"
                                                required />
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
                </div>
                <div id="div_conjoints" class="box-light"
                    style="margin-top:20px;<?php echo isset($assurance['conjoints']) && $assurance['conjoints'] > 0 ? 'display: block' : 'display: none'; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-transparent">
                                    <h2 class="panel-title my-green">Conjoint(s)</h2>
                                </div>
                                <div class="panel-body">
                                    <div id="c1" class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom 1<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="prenom_c1" name="prenom_c1"
                                                value="<?php echo isset($assurance['prenom_c1']) ? $assurance['prenom_c1'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom 1<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="nom_c1" name="nom_c1"
                                                value="<?php echo isset($assurance['nom_c1']) ? $assurance['nom_c1'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance 1<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_min datepicker_"
                                                    autocomplete="off" id="datenaissance_c1" name="datenaissance_c1"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['datenaissance_c1']) ? $assurance['datenaissance_c1'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="c2" class="row"
                                        style="<?php echo isset($assurance['conjoints']) && $assurance['conjoints'] > 1 ? 'display: block' : 'display: none'; ?>">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom 2<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="prenom_c2" name="prenom_c2"
                                                value="<?php echo isset($assurance['prenom_c2']) ? $assurance['prenom_c2'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom 2<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="nom_c2" name="nom_c2"
                                                value="<?php echo isset($assurance['nom_c2']) ? $assurance['nom_c2'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance 2<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_min datepicker_"
                                                    autocomplete="off" id="datenaissance_c2" name="datenaissance_c2"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['datenaissance_c2']) ? $assurance['datenaissance_c2'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="c3" class="row"
                                        style="<?php echo isset($assurance['conjoints']) && $assurance['conjoints'] > 2 ? 'display: block' : 'display: none'; ?>">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom 3<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="prenom_c3" name="prenom_c3"
                                                value="<?php echo isset($assurance['prenom_c3']) ? $assurance['prenom_c3'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom 3<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="nom_c3" name="nom_c3"
                                                value="<?php echo isset($assurance['nom_c3']) ? $assurance['nom_c3'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance 3<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_min datepicker_"
                                                    autocomplete="off" id="datenaissance_c3" name="datenaissance_c3"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['nom_c3']) ? $assurance['nom_c3'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="c4" class="row"
                                        style="<?php echo isset($assurance['conjoints']) && $assurance['conjoints'] > 3 ? 'display: block' : 'display: none'; ?>">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom 4<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="prenom_c4" name="prenom_c4"
                                                value="<?php echo isset($assurance['prenom_c4']) ? $assurance['prenom_c4'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom 4<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="nom_c4" name="nom_c4"
                                                value="<?php echo isset($assurance['nom_c4']) ? $assurance['nom_c4'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance 4<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_min datepicker_"
                                                    autocomplete="off" id="datenaissance_c4" name="datenaissance_c4"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['datenaissance_c4']) ? $assurance['datenaissance_c4'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="div_enfants" class="box-light"
                    style="margin-top:20px;<?php echo isset($assurance['enfants']) && $assurance['enfants'] > 0 ? 'display: block' : 'display: none'; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-transparent">
                                    <h2 class="panel-title my-green">Enfants</h2>
                                </div>
                                <div class="panel-body">
                                    <div id="e1" class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom 1<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="prenom_e1" name="prenom_e1"
                                                value="<?php echo isset($assurance['prenom_e1']) ? $assurance['prenom_e1'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom 1<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="nom_e1" name="nom_e1"
                                                value="<?php echo isset($assurance['nom_e1']) ? $assurance['nom_e1'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance 1<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_enfants datepicker_"
                                                    autocomplete="off" name="datenaissance_e1"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['datenaissance_e1']) ? $assurance['datenaissance_e1'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                            <small class="text-danger err" style="display: none">Les enfants de plus de
                                                25 ans ne sont pas pris en charge</small>
                                        </div>
                                    </div>
                                    <div id="e2" class="row"
                                        style="<?php echo isset($assurance['enfants']) && $assurance['enfants'] > 1 ? 'display: block' : 'display: none'; ?>">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom 2<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="prenom_e2" name="prenom_e2"
                                                value="<?php echo isset($assurance['prenom_e2']) ? $assurance['prenom_e2'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom 2<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="nom_e2" name="nom_e2"
                                                value="<?php echo isset($assurance['nom_e2']) ? $assurance['nom_e2'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance 2<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_enfants datepicker_"
                                                    autocomplete="off" name="datenaissance_e2"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['datenaissance_e2']) ? $assurance['datenaissance_e2'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                            <small class="text-danger err" style="display: none">Les enfants de plus de
                                                25 ans ne sont pas pris en charge</small>
                                        </div>
                                    </div>
                                    <div id="e3" class="row"
                                        style="<?php echo isset($assurance['enfants']) && $assurance['enfants'] > 2 ? 'display: block' : 'display: none'; ?>">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom 3<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="prenom_e3" name="prenom_e3"
                                                value="<?php echo isset($assurance['prenom_e3']) ? $assurance['prenom_e3'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom 3<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="nom_e3" name="nom_e3"
                                                value="<?php echo isset($assurance['nom_e3']) ? $assurance['nom_e3'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance 3<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_enfants datepicker_"
                                                    autocomplete="off" name="datenaissance_e3"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['datenaissance_e3']) ? $assurance['datenaissance_e3'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                            <small class="text-danger err" style="display: none">Les enfants de plus de
                                                25 ans ne sont pas pris en charge</small>
                                        </div>
                                    </div>
                                    <div id="e4" class="row"
                                        style="<?php echo isset($assurance['enfants']) && $assurance['enfants'] > 3 ? 'display: block' : 'display: none'; ?>">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom 4<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="prenom_e4" name="prenom_e4"
                                                value="<?php echo isset($assurance['prenom_e4']) ? $assurance['prenom_e4'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom 4<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="nom_e4" name="nom_e4"
                                                value="<?php echo isset($assurance['nom_e4']) ? $assurance['nom_e4'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance 4<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_enfants datepicker_"
                                                    autocomplete="off" name="datenaissance_e4"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['datenaissance_e4']) ? $assurance['datenaissance_e4'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                            <small class="text-danger err" style="display: none">Les enfants de plus de
                                                25 ans ne sont pas pris en charge</small>
                                        </div>
                                    </div>
                                    <div id="e5" class="row"
                                        style="<?php echo isset($assurance['enfants']) && $assurance['enfants'] > 4 ? 'display: block' : 'display: none'; ?>">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom 5<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="prenom_e5" name="prenom_e5"
                                                value="<?php echo isset($assurance['prenom_e5']) ? $assurance['prenom_e5'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom 5<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="nom_e5" name="nom_e5"
                                                value="<?php echo isset($assurance['nom_e5']) ? $assurance['nom_e5'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance 5<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_enfants datepicker_"
                                                    autocomplete="off" name="datenaissance_e5"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['datenaissance_e5']) ? $assurance['datenaissance_e5'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                            <small class="text-danger err" style="display: none">Les enfants de plus de
                                                25 ans ne sont pas pris en charge</small>
                                        </div>
                                    </div>
                                    <div id="e6" class="row"
                                        style="<?php echo isset($assurance['enfants']) && $assurance['enfants'] > 5 ? 'display: block' : 'display: none'; ?>">
                                        <div class="col-md-4 form-group">
                                            <label>Prénom 6<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="prenom_e6" name="prenom_e6"
                                                value="<?php echo isset($assurance['prenom_e6']) ? $assurance['prenom_e6'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Nom 6<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" id="nom_e6" name="nom_e6"
                                                value="<?php echo isset($assurance['nom_e6']) ? $assurance['nom_e6'] : '' ?>" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Date de naissance 6<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control date_enfants datepicker_"
                                                    autocomplete="off" name="datenaissance_e6"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                    value="<?php echo isset($assurance['datenaissance_e6']) ? $assurance['datenaissance_e6'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                            <small class="text-danger err" style="display: none">Les enfants de plus de
                                                25 ans ne sont pas pris en charge</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="div_vehicule" class="box-light"
                    style="margin-top:20px;<?php echo isset($assurance['vehicule']) && trim($assurance['vehicule']) == 'Oui' ? 'display: block' : 'display: none'; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-transparent">
                                    <h2 class="panel-title my-green">Véhicule</h2>
                                </div>
                                <div class="panel-body">
                                    <div id="v" class="row">
                                        <div class="col-md-3 form-group">
                                            <label>Année<sup style="color:red">*</sup>:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker_" autocomplete="off"
                                                    name="annee_vehicule" data-inputmask="'alias': 'dd/mm/yyyy'"
                                                    data-mask=""
                                                    value="<?php echo isset($assurance['annee_vehicule']) ? $assurance['annee_vehicule'] : '' ?>" />
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Marque<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" name="marque_vehicule"
                                                value="<?php echo isset($assurance['marque_vehicule']) ? $assurance['marque_vehicule'] : '' ?>" />
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Modèle<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" name="modele_vehicule"
                                                value="<?php echo isset($assurance['modele_vehicule']) ? $assurance['modele_vehicule'] : '' ?>" />
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Plaque d'immatriculation<sup style="color:red">*</sup>:</label>
                                            <input type="text" class="form-control" name="num_vehicule"
                                                value="<?php echo isset($assurance['num_vehicule']) ? $assurance['num_vehicule'] : '' ?>" />
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <p><b>*Véhicule inclus dans toutes les assurances Monde et dans l'assurance
                                                    MAI Schengen<br />
                                                    *En option +100 Dh</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="col-md-12">
                        <small class="text-red">* Champs obligatoires</small>
                    </div>
                    <div class="col-md-6" style="margin-top:20px">
                        <div class="col-md-12 form-group">
                            <label class="checkbox no-padding-right size-12">
                                <input type="checkbox" value="2" name="radio-condition-2" required />
                                <i></i> Je confirme que l'adresse email communiquée précédemment est bien celle de
                                livraison du contrat et de l'attestation de paiement.
                            </label>
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="checkbox no-padding-right size-12">
                                <input type="checkbox" value="3" name="radio-condition-3" required />
                                <i></i> <a href="{{ route('conditions_generales') }}" target="_blank">J’ai bien pris
                                    connaissance des conditions générales de vente et les conditions générales du
                                    contrat.</a>
                            </label>
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="checkbox no-padding-right size-12">
                                <input type="checkbox" value="4" name="radio-condition-4" required />
                                <i></i> J'autorise à WAFA IMA ASSISTANCE à utiliser l’information saisie
                                dans ce formulaire
                                de souscription pour établir mon contrat.
                            </label>
                        </div>
                    </div>
                    <div class="box-light col-md-6 " style="margin-top:20px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-heading-transparent">
                                        <h2 class="panel-title my-green">Détails de paiement</h2>
                                    </div>
                                    <div class="panel-body">
                                        <!-- <div class="form-group">
                                            <label>Age de l'assuré: <b id="age">0</b></label>
                                        </div> -->
                                        <div class="form-group">
                                            <label style="font-size: 19px;">Montant de la réservation: <b id="prime_ttc"
                                                    style="font-size: 25px;color: #4CAF50;">
                                                    <?php echo isset($assurance['montant']) ? $assurance['montant'] : '0' ?>
                                                </b>
                                                <b style="font-size: 25px;color: #4CAF50;">Dhs</b></label>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Montant à régler chez wafacash: <b id="montant_wafacash">0</b> <b>Dhs</b></label>
                                        </div> -->
                                    </div>
                                    <div class="panel-footer" style="background:#fff">
                                        <div class="row">
                                            <div class="col-md-8 hidden-xs"></div>
                                            <div class="col-md-4 col-xs-12">
                                                <input type="hidden" id="contrat_id" name="contrat_id"
                                                    value="<?php echo isset($assurance['contrat_id']) ? $assurance['contrat_id'] : '' ?>"
                                                    required />
                                                <input type="hidden" id="prime_ttc_v" name="prime_ttc"
                                                    value="<?php echo isset($assurance['montant']) ? $assurance['montant'] : '' ?>"
                                                    required />
                                                <button id="btn_submit" type="submit"
                                                    class="btn btn-block btn-pay pull-right">VALIDER <i
                                                        class="fa fa-arrow-right"></i></button>
                                            </div>
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




@endsection @section('javascripts')
<!-- <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap.datepicker/js/bootstrap-datepicker.min.js')}}"></script> -->
<script type="text/javascript" src="{{ asset('assets/js/validator.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.realperson.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.inputmask.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.inputmask.date.extensions.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.inputmask.extensions.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('[data-mask]').inputmask();
    // $('.datepicker').datepicker({
    //   format: 'dd/mm/yyyy',
    //   autoclose: true,
    //   todayHighlight: true,
    //   startDate: '-9131d',
    //   endDate: '0d',
    // });
    // $( ".date_min" ).blur(function() {
    //     var parts = $(this).val().split("/");
    //     var d1 = new Date(parts[2], parts[1] - 1, parts[0]);
    //     var d2 = new Date(<?php echo date('Y') ?>, <?php echo date('m') ?> - 1, <?php echo date('d') ?>);
    //     if (d1 < d2) {
    //         $(this).val('').change();
    //     }
    // });
    $(".date_enfants").blur(function() {
        $('.err').hide();
        var parts = $(this).val().split("/");
        var start = new Date(parts[2], parts[1] - 1, parts[0]);
        var end = new Date(<?php echo date('Y') ?>, <?php echo date('m') ?> - 1,
            <?php echo date('d') ?>);

        var diff = new Date(end - start);

        var days = diff / 1000 / 60 / 60 / 24;
        if (days > 9131) {
            $(this).parent().next('.err').show();
            $(this).val('').change();
        }
    });
    $('#defaultReal').realperson();
    $("[data-rel='popover']").popover({
        html: true,
        placement: 'top',
        trigger: 'hover'
    });
    $("[data-rel='popoverContact']").popover({
        html: true,
        placement: 'bottom',
        container: 'body'
    });

    $('#company').on('change', function() {
        $('#type').find('option').remove();
        if ($(this).val() == 'MAROC ASSISTANCE INTERNATIONAL' || $(this).val() == 'WAFA IMA') {
            $('#type').append('<option value=""></option>');
            $('#type').append('<option value="Assistance Schengen">Assistance Schengen</option>');
            $('#type').append('<option value="Assistance Monde">Assistance Monde</option>');
        }
        // if ($(this).val() == 'AXA ASSISTANCE') {
        //     $('#type').append('<option value=""></option>');
        //     $('#type').append('<option value="Assistance Schengen">Assistance Schengen</option>');
        //     $('#type').append(
        //         '<option value="Assistance Monde famille avec ou sans véhicule">Assistance Monde famille avec ou sans véhicule</option>'
        //     );
        //     $('#type').append('<option value="Etudiant expatrié">Etudiant expatrié</option>');

        // }
    });

    $('#type').on('change', function() {
        if ($(this).val() == 'Assistance Schengen' || $(this).val() == 'Etudiant expatrié') {
            $('#d_conjoints').hide();
            $('#div_conjoints').hide();
            $('#d_enfants').hide();
            // $('#d_vehicule').hide();
            $('#div_enfants').hide();
            $('#conjoints').val(0);
            $('#enfants').val(0);
        } else {
            $('#d_conjoints').show();
            $('#d_enfants').show();
            // $('#d_vehicule').show();
        }
    });


    $('#company,#type,#duree,#date_naissance,#datenaissance_c1,#datenaissance_c2,#datenaissance_c3,#datenaissance_c4')
        .on('input', function() {
            getPrice();
        });

    $('#conjoints').on('change', function() {
        if ($(this).val() > 0) {
            $('#div_conjoints').show();
            show_element('#c1');
            hide_element('#c2');
            hide_element('#c3');
            hide_element('#c4');
            if ($(this).val() == 2) {
                show_element('#c2');
                hide_element('#c3');
                hide_element('#c4');
            }
            if ($(this).val() == 3) {
                $('#c2').show();
                $('#c3').show();
                $('#c4').hide();
            }
            if ($(this).val() == 4) {
                show_element('#c2');
                show_element('#c3');
                show_element('#c4');
            }
        } else {
            $('#div_conjoints').hide();
            hide_element('#c1');
            hide_element('#c2');
            hide_element('#c3');
            hide_element('#c4');
        }

    });

    $('#enfants').on('change', function() {
        if ($(this).val() > 0) {
            $('#div_enfants').show();
            show_element('#e1');
            hide_element('#e2');
            hide_element('#e3');
            hide_element('#e4');
            hide_element('#e5');
            hide_element('#e6');
            if ($(this).val() == 2) {
                show_element('#e2');
                hide_element('#e3');
                hide_element('#e4');
                hide_element('#e5');
                hide_element('#e6');
            }
            if ($(this).val() == 3) {
                show_element('#e2');
                show_element('#e3');
                hide_element('#e4');
                hide_element('#e5');
                hide_element('#e6');
            }
            if ($(this).val() == 4) {
                show_element('#e2');
                show_element('#e3');
                show_element('#e4');
                hide_element('#e5');
                hide_element('#e6');
            }
            if ($(this).val() == 5) {
                show_element('#e2');
                show_element('#e3');
                show_element('#e4');
                show_element('#e5');
                hide_element('#e6');
            }
            if ($(this).val() == 6) {
                show_element('#e2');
                show_element('#e3');
                show_element('#e4');
                show_element('#e5');
                show_element('#e6');
            }
        } else {
            $('#div_conjoints').hide();
            hide_element('#e1');
            hide_element('#e2');
            hide_element('#e3');
            hide_element('#e4');
            hide_element('#e5');
            hide_element('#e6');
        }

    });

    $('#vehicule').on('change', function() {
        getPrice();
        if ($(this).val() == 'Oui') {
            $('#div_vehicule').show();
            show_element('#v');
        } else {
            $('#div_vehicule').hide();
            hide_element('#v');
        }

    });

});

function show_element(element) {
    $(element).show();
    $("div" + element + " input").attr("required", true);
}

function hide_element(element) {
    $(element).hide();
    $("div" + element + " input").attr("required", false);
}

function getPrice() {
    $("#prime_ttc").html(0);
    $("#prime_ttc_v").val();
    $("#contrat_id").val();
    $("#btn_submit").attr('disabled', true);


    if ($('#type').val() && $('#date_naissance').val() && $('#duree').val() && $('#company').val() && $('#vehicule')
        .val()) {
        $.ajax({
            url: "{{ route('contrat') }}",
            type: 'GET',
            data: 'type=' + $('#type').val() + '&age=' + $('#date_naissance').val() + '&duree=' + $('#duree')
                .val() + '&company=' + $('#company').val() + '&vehicule=' + $('#vehicule').val() +
                '&datenaissance_c1=' + $('#datenaissance_c1').val() + '&datenaissance_c2=' + $(
                    '#datenaissance_c2').val() + '&datenaissance_c3=' + $('#datenaissance_c3').val() +
                '&datenaissance_c4=' + $('#datenaissance_c4').val(),
            success: function(data) {
                //response = $.parseJSON(data);
                response = data;
                $("#contrat_id").val(response.id);
                $("#age").html(response.age);
                $("#prime_ttc").html(response.prime_ttc);
                $("#prime_ttc_v").val(response.prime_ttc);
                $("#btn_submit").attr('disabled', false);
            }
        });
    }

}
</script>
@endsection