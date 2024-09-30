<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php 
    // echo $this->Html->css('bootstrap');
    // echo $this->Html->css('datepicker');
?>
<style type="text/css">
label.error{
    color: #ff1921;
    font-weight: bold;
}
</style>
<div id="nowDealsContainer" class="pageContentContainer clearfix">
    <div class="leftNav">
    </div>
    <div class="rightNavContent" id="nowDealsRightNavContent1">
        <div class="grid_24">
            <h2 class="pageTitle left"> <span> Add a new reservation</span> </h2>
        </div>
        <div id="resumeDiv" >
            <div id="nowDealsSummary">
                <div id="nowSalesAndEarnings">
                    <div class="grid_24">
                        <div class="toShowAfterLoading" id="merchantInfoSaveTable" style="display: block;">
                            <form data-toggle="validator" role="form" method="POST">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Contrat</div>
                                            <div class="panel-body">
                                              <div class="row">
                                                <div class="col-xs-5 form-group">
                                                    <label>Compagnie d'Assurance<sup style="color:red">*</sup>:</label>
                                                    <select class="form-control" id="company" name="company" required>
                                                      <option></option>
                                                      <option value="MAROC ASSISTANCE INTERNATIONAL">MAROC ASSISTANCE INTERNATIONAL</option>
                                                      <option value="WAFA IMA">WAFA IMA</option>
                                                      <option value="AXA ASSISTANCE: OPTION1 ( de 1 à 500 contrats par mois)">AXA ASSISTANCE: OPTION1 ( de 1 à 500 contrats par mois)</option>
                                                      <option value="AXA ASSISTANCE: OPTION 2 ( au-delà de 500 contrats par mois)">AXA ASSISTANCE: OPTION 2 ( au-delà de 500 contrats par mois)</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-4 form-group">
                                                    <label>Type de contrat<sup style="color:red">*</sup></label>
                                                    <select class="form-control" id="type" name="type" required>
                                                      <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-3 form-group">
                                                    <label>Durée<sup style="color:red">*</sup></label>
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
                                                        <label>Nom<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom" name="nom" required />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom" name="prenom" required />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>CIN:</label>
                                                        <input type="text" class="form-control" id="cin" name="cin" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- <div class="col-xs-4 form-group">
                                                        <label>Réf.:</label>
                                                        <input type="text" class="form-control" id="ref" name="ref" />
                                                    </div> -->
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
                                                        <label>Date de naissance<sup style="color:red">*</sup>:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="datenaissance" id="date_naissance" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" required />
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Conjoint(s):</label>
                                                        <select class="form-control" id="conjoints" name="conjoints">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-4 form-group">
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
                                                        <label>Nom 1<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom_c1" name="nom_c1" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom 1<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom_c1" name="prenom_c1" />
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
                                                        <label>Nom 2<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom_c2" name="nom_c2" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom 2<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom_c2" name="prenom_c2" />
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
                                                        <label>Nom 3<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom_c3" name="nom_c3" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom 3<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom_c3" name="prenom_c3" />
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
                                                        <label>Nom 4<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom_c4" name="nom_c4" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom 4<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom_c4" name="prenom_c4" />
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
                                                        <label>Nom 1<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom_e1" name="nom_e1" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom 1<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom_e1" name="prenom_e1" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Date de naissance 1<sup style="color:red">*</sup>:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="datenaissance_e1" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="e2" class="row" style="display: none">
                                                    <div class="col-xs-4 form-group">
                                                        <label>Nom 2<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom_e2" name="nom_e2" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom 2<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom_e2" name="prenom_e2" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Date de naissance 2<sup style="color:red">*</sup>:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="datenaissance_e2" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="e3" class="row" style="display: none">
                                                    <div class="col-xs-4 form-group">
                                                        <label>Nom 3<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom_e3" name="nom_e3" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom 3<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom_e3" name="prenom_e3" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Date de naissance 3<sup style="color:red">*</sup>:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="datenaissance_e3" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="e4" class="row" style="display: none">
                                                    <div class="col-xs-4 form-group">
                                                        <label>Nom 4<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom_e4" name="nom_e4" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom 4<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom_e4" name="prenom_e4" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Date de naissance 4<sup style="color:red">*</sup>:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="datenaissance_e4" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="e5" class="row" style="display: none">
                                                    <div class="col-xs-4 form-group">
                                                        <label>Nom 5<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom_e5" name="nom_e5" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom 5<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom_e5" name="prenom_e5" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Date de naissance 5<sup style="color:red">*</sup>:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="datenaissance_e5" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="e6" class="row" style="display: none">
                                                    <div class="col-xs-4 form-group">
                                                        <label>Nom 6<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="nom_e6" name="nom_e6" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Prénom 6<sup style="color:red">*</sup>:</label>
                                                        <input type="text" class="form-control" id="prenom_e6" name="prenom_e6" />
                                                    </div>
                                                    <div class="col-xs-4 form-group">
                                                        <label>Date de naissance 6<sup style="color:red">*</sup>:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="datenaissance_e6" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" />
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $this->Html->url( '/js/validator.min.js') ?>" type="text/javascript"></script>
<!-- InputMask -->
<script src="<?php echo $this->Html->url( '/js/input-mask/jquery.inputmask.js') ?>" type="text/javascript"></script>
<script src="<?php echo $this->Html->url( '/js/input-mask/jquery.inputmask.date.extensions.js') ?>" type="text/javascript"></script>
<script src="<?php echo $this->Html->url( '/js/input-mask/jquery.inputmask.extensions.js') ?>" type="text/javascript"></script>

<script type="text/javascript">

    $(document).ready(function() { 
        $('[data-mask]').inputmask();

        $('#company').on('change', function() {
            $('#type').find('option').remove();
            if($(this).val() == 'MAROC ASSISTANCE INTERNATIONAL' || $(this).val() == 'WAFA IMA' ){
                $('#type').append('<option value=""></option>');
                $('#type').append('<option value="Assistance Shengen">Assistance Shengen</option>');
                $('#type').append('<option value="Assistance Monde">Assistance Monde</option>');
            }
            if($(this).val() == 'AXA ASSISTANCE: OPTION1 ( de 1 à 500 contrats par mois)' || $(this).val() == 'AXA ASSISTANCE: OPTION 2 ( au-delà de 500 contrats par mois)' ){
                $('#type').append('<option value=""></option>');
                $('#type').append('<option value="Assistance Shengen">Assistance Shengen</option>');
                $('#type').append('<option value="Assistance Monde famille avec ou sans véhicule">Assistance Monde famille avec ou sans véhicule</option>');
            }
        });

        $('#company,#type,#duree,#date_naissance').on('change', function() {
            // if(){
                getPrice();
            // }
		});

        $('#conjoints').on('change', function() {
            if($(this).val()>0){
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
            }else{
                $('#div_conjoints').hide();
                hide_element('#c1');
                hide_element('#c2');
                hide_element('#c3');
                hide_element('#c4');
            }

        });

        $('#enfants').on('change', function() {
            if($(this).val()>0){
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
            }else{
                $('#div_conjoints').hide();
                hide_element('#e1');
                hide_element('#e2');
                hide_element('#e3');
                hide_element('#e4');
                hide_element('#e5');
                hide_element('#e6');
            }

        });
        
    });

    function show_element(element) {
        $(element).show();
        $("div" + element + " :input").attr("required", true);
    }

    function hide_element(element) {
        $(element).hide();
        $("div" + element + " :input").attr("required", false);
    }

    function getCompanies(){

        $("#prime_ttc").html( 0 );
        $("#montant_wafacash").html( 0 );
        $("#contrat_id").val();

        var $select = $('#PaymentCompagny');
        $select.find('option').remove();
        $select.append('<option value=""></option>');

        if($('#PaymentTypeContrat').val() && $('#PaymentAgeAssure').val() && $('#PaymentDuree').val()){
            $.ajax({
                url : '<?php echo $this->Html->url( '/board/getCompanies' ) ?>',
                type : 'POST',
                data : 'type=' + $('#PaymentTypeContrat').val() + '&age=' + $('#PaymentAgeAssure').val() + '&duree=' + $('#PaymentDuree').val(),
                success : function(data){

                    response = $.parseJSON(data);

                    $("#PaymentCompagny").attr('disabled', false);

                    $.each(response.compagnies,function(key, value)
                    {
                        $select.append('<option value="' + key + '">' + value + '</option>'); // return empty
                    });

                    // console.log(response);

                }
            });
        }

    }

    function getPrice(){
        // console.log('getPrice');
        
        $("#prime_ttc").html( 0 );
        // $("#montant_wafacash").html( 0 );
        $("#contrat_id").val();

        if($('#type').val() && $('#date_naissance').val() && $('#duree').val() && $('#company').val()){
            $.ajax({

                url : '<?php echo $this->Html->url( '/board/getPrice' ) ?>',
                type : 'POST',
                data : 'type=' + $('#type').val() + '&age=' + $('#date_naissance').val() + '&duree=' + $('#duree').val() + '&company=' + $('#company').val(),
                success : function(data){

                    response = $.parseJSON(data);

                    $("#contrat_id").val( response.id );
                    $("#age").html( response.age );
                    $("#prime_ttc").html( response.prime_ttc );
                    // $("#montant_wafacash").html( Math.round( response.prime_ttc * 112) / 100);

                    // console.log(response);

                }
            });
        }

    }

</script>
