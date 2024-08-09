@extends('elements/layout')
@section('stylesheets')
<style type="text/css">
ul.clients-dotted>li:after {
    border-bottom: 0
}
</style>
@endsection
@section('main')
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="{{ route('formulaire') }}">
                <img src="{{ asset('/images/ima_slider_1.png')}}" style="width: 100%">
            </a>
        </div>
        <div class="item">
            <a href="{{ route('formulaire') }}">
                <img src="{{ asset('/images/ima_slider_2.png')}}" style="width: 100%">
            </a>
        </div>
        <div class="item">
            <a href="{{ route('formulaire') }}">
                <img src="{{ asset('/images/ima_slider_3.png')}}" style="width: 100%">
            </a>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="alert alert-transparent bordered-bottom">
    <div class="container" style="margin-bottom: 10px;">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 style="margin-bottom: 15px;">ASSURANCE VOYAGE PAR WAFA IMA ASSISTANCE </h1>
                <!-- <img src="{{ asset('/images/logo.png')}}" style="width: 300px;" > -->
                <!-- <h3>
                    Votre contrat d'assurance est automatiquement joint à votre documentation de demande de visa.<br>
                    Paiement securisé par Wafacash.<br>
                    Axa assistance est un partenaire de TLS.<br>
                </h3> -->
            </div>
            <div class="col-md-4 col-md-offset-4 text-right padding-top-20">
                <!-- right btn -->
                <a style="width:100%" class="btn btn-lg btn-pay" rel="nofollow" href="{{ route('formulaire') }}">Achetez
                    maintenant</a>
            </div>
            <!-- /right btn -->
        </div>
    </div>
</div>
<section class="info-bar info-bar-clean alternate" style="padding-bottom:30px">
    <div class="container">
        <div class="row">
            <!--div class="col-sm-4 col-xs-12 descrip-slogan pull-left" data-type='text-info'>
                <div class="col-md-2 col-sm-2 col-xs-2"><img src="{{ asset('/images/2.png')}}"></div>
                <div class="col-md-10 col-sm-10 col-xs-10 text-left">
                    <h3 class="size-25 text-info " style="margin-bottom:10px">Choix</h3>
                    Choississez parmi 3 compagnies d'assurances les garanties qui vous conviennent. <p class="size-15">
                        <a href="{{ route('compare_price') }}" target="_blank">Cliquez ici pour plus d'infos</a>
                    </p>
                </div>
            </div-->
            <div class="col-sm-4 col-xs-12 descrip-slogan pull-left" data-type='text-mine-orange'>
                <div class="col-md-2 col-sm-12 col-xs-12 disponibilite_securite"><img src="{{ asset('/images/3.png')}}">
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12 text-left disponibilite_securite">
                    <h3 class="size-25 text-mine-orange" style="margin-bottom:10px">Sécurité</h3>
                    <p class="size-15">’’Nous garantissons la sécurité totale de vos transactions et la confidentialité
                        de de toutes les informations que vous avez saisies sur le site’’</p>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12 descrip-slogan pull-left" data-type='text-mine-green'>
                <div class="col-md-2 col-sm-12 col-xs-12 disponibilite_securite"><img src="{{ asset('/images/4.png')}}">
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12 text-left disponibilite_securite">
                    <h3 class="size-25 text-mine-green" style="margin-bottom:10px">Disponibilité</h3>
                    <p class="size-15">Vous pouvez maintenant acheter votre assurance voyage en quelques clicks</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="hiw" style="padding-top: 15px;">
    <div class="container">
        <header class="text-center margin-bottom-20">
            <h2>Comment ça marche ?</h2>
        </header>
        <div class="row">
            <div class="col-md-3">
                <div class="box-icon box-icon-side box-icon-color box-icon-round description-co"
                    data-type="text-mine-orange">
                    <a class="hiw mine-orange">1</a>
                    <h3 class="size-25 text-mine-orange" style="margin-bottom: 0">Saisissez vos informations</h3>
                    <p class="size-15" style="color:#333">Renseignez vos informations sur le formulaire de l’assurance.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-icon box-icon-side box-icon-color box-icon-round description-co"
                    data-type="text-mine-purple">
                    <a class="hiw mine-purple">2</a>
                    <h3 class="size-25 text-mine-purple" style="margin-bottom: 0">Réservez votre assurance voyage</h3>
                    <p class="size-15" style="color:#333">Payez avec votre Carte Bancaire</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-icon box-icon-side box-icon-color box-icon-round description-co"
                    data-type="text-mine-green">
                    <a class="hiw mine-green">3</a>
                    <h3 class="size-25 text-mine-green" style="margin-bottom: 0">Signez votre contrat</h3>
                    <p class="size-15" style="color:#333">Signez votre contrat d'assurance que nous vous transmettrons
                        via e-mail ou sur la rubrique "Espace personnel".</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-icon box-icon-side box-icon-color box-icon-round description-co"
                    data-type="text-mine-blue">
                    <a class="hiw mine-blue">4</a>
                    <h3 class="size-25 text-mine-blue" style="margin-bottom: 0">Votre assurance est prête</h3>
                    <p class="size-15" style="color:#333">Votre attestation vous sera envoyée par adresse mail.
                        Vos documents sont conservés et mis à votre disposition dans la rubrique " Espace personnel"
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section style="padding: 30px 0;">

    <div class="container" id="divpartners">
        <header class="text-center ">
            <h2>Notre choix d'assurances:</h2>
        </header>
        <ul class="row clients-dotted list-inline">
            <li class="col-md-4 col-sm-4 col-xs-12">
                <a target="_blank" href="{{ route('compare_price') }}">
                    <img alt="AXA Assurance Maroc" src="{{ asset('/images/AXA.png')}}" class="img-responsive" style="height:80px">
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-12">
                <a target="_blank" href="{{ route('compare_price') }}">
                    <img alt="Wafa IMA Assistance" src="{{ asset('/images/WAFA_IMA_Assistance_RVB.png')}}" class="img-responsive" style="height:100px">
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-12">
                <a target="_blank" href="{{ route('compare_price') }}">
                    <img alt="Maroc Assistance Internationale" src="{{ asset('/images/ma.png')}}" class="img-responsive" style="height:90px">
                </a>
            </li>
        </ul>
        <hr />
        <header class="text-center margin-bottom-20">
            <h2>Paiement sécurisé par nos partenaires:</h2>
        </header>
        <ul class="row clients-dotted list-inline">
            <li class="col-md-6 col-sm-6 col-xs-6 text-right"> 
                <img alt="wafacash" src="{{ asset('/images/w.png')}}" class="img-responsive" style="height:50px;margin-right: 30px">
                 
            </li>
            <li class="col-md-6 col-sm-6 col-xs-6">
                <a class=" text-left" target="_blank" href="http://www.binga.ma/" style="height: auto;">
                    <img alt="binga.ma" src="{{ asset('/images/bbb.png')}}" class="img-responsive" style="height:60px;margin-left: 30px">
                </a>
            </li>
        </ul>
    </div>
</section-->
@endsection
@section('javascripts')
<script type="text/javascript" src="{{ asset('assets/js/booststrapValidator.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.carousel').carousel();
})
</script>
@endsection