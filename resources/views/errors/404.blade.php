@extends('elements/layout')
@section('main')
<section class="page-header page-header-xs">
    <div class="container">
        <h1 class="text-info">404 - Page introuvable</h1>
    </div>
</section>
<section class="">
    <div class="container">
        <h2 style="margin-bottom: 5px;color:#e38d13 !important"> <strong>Désolé, cette page n'existe pas ou n'existe plus.</strong></h2>
        <h3> Nous vous prions de nous excuser pour la gêne occasionée.</h3>
        <a class="size-20 font-lato" href="{{ route('home') }}"><i class="glyphicon glyphicon-menu-left margin-right-10 size-16"></i> Nous vous invitons à revenir à la page d'acceuil.</a>
    </div>
</section>
@endsection
