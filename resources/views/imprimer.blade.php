@extends('elements/layout')
@section('main')
<section style="margin-top:20px; padding-top: 30px">
    <div class="container" style="margin-top:20px">
        <div class="col-lg-12 col-md-12">
            <div class="box-light">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-transparent">
                                <h2 class="panel-title  my-green">Saisissez vos informations</h2>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" role="form" method="get" action="{{ route('recap') }}" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                                    <!-- {{ csrf_field() }} -->
                                    <!-- <div class="form-group">
                                        <label style="cursor: pointer" class="col-sm-5 control-label no-padding-right" for="form-field-1">
                                            Numéro de transaction
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="code" value="" class="form-control" type="text" required_ />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="cursor: pointer" class="col-sm-5 control-label no-padding-right" for="form-field-1">
                                            Numéro de contrat <span style="cursor: pointer" class='popover-notitle' data-rel="popover" data-placement="right" data-content="<div style='width:320px'>24 heures après la contratation de votre assurance, votre contrat sera disponible en ligne</div>"><i class="fa fa-info-circle text-info"></i></span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="contrat" value="" class="form-control" type="text" required_ />
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label style="cursor: pointer" class="col-sm-5 control-label no-padding-right" for="form-field-1">
                                            Votre CIN / N° passeport<sup style="color:red">*</sup>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="cin" value="" class="form-control" type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="cursor: pointer" class="col-sm-5 control-label no-padding-right" for="form-field-1">
                                            Votre email<sup style="color:red">*</sup>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="email" value="" class="form-control" type="email" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-xs-12" style="padding-top:10px">
                                            <small class="text-red">* Champs obligatoires</small>
                                            <br>
                                            <small>
                                                Merci de nous envoyer votre contrat dûment signé (scan ou photo de qualité) :<br>
                                                - à l'adresse suivante : bd.casablanca@mai.ma<br>
                                                <!-- - par whatsapp service au +212 7 07 94 08 30<br> -->
                                                <!-- -par la rubrique "Espace personnel"<br> -->
                                                ou dans nos locaux à l’adresse 25 Boulevard Rachidi à Casablanca
                                            </small>
                                        </div>
                                        <div class="col-sm-3 col-xs-12" style="padding-top:10px">
                                            <button type="submit" style="float:right" class="btn btn-pay btn-next btn-block">
                                                Imprimer
                                                <i class="fa fa-arrow-right"></i>
                                            </button>
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
</section>
@endsection
@section('javascripts')
<script type="text/javascript" src="{{ asset('assets/js/validator.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("[data-rel='popover']").popover({
            html: true,
            placement: 'top',
            trigger: 'hover'
        });
    })
</script>
@endsection