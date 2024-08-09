<div id="header" class="sticky header-sm clearfix">
    <header id="topNav">
        <div class="container">
            <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="logo pull-left" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.png')}}" alt="" />
            </a>
            <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
                <nav class="nav-main">
                    <ul id="topMain" class="nav nav-pills nav-main">
                        <li class="dropdown">
                            <a href="{{ route('hiw') }}">Comment souscrire ?</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('imprimer') }}">Espace personnel</a>
                        </li>
                        <li class="dropdown">
                            <a data-content='<div class="row text-center">
                                    <div class="col-md-offset-1 col-md-12 col-sm-12">
                                        <i class="glyphicon glyphicon-headphones size-40 text-mine-orange" style="float:left"></i>
                                        <h3 class="size-25 col-md-9 col-sm-9 bold text-mine-orange" style="padding-top:10px">Centre Service Client</h3>
                                    </div>
                                    <p class="col-md-12 col-sm-12 bold" style="margin-bottom: 10px">Pour toutes remarques, questions, ou réclamations nos conseillers sont à votre disposition:</p>
                                    <h3 class="col-md-12 col-sm-12 size-30"><span class="text-mine-orange">05 22 58 95 15</span></h3>
                                    <p class="col-md-12 col-sm-12 bold" style="margin-bottom: 5px">Du Lundi au Vendredi de 9h à 17h</p>
                                    <p class="col-md-12 col-sm-12 bold" style="margin-bottom: 5px">25, boulevard Rachidi 20070 Casablanca  – Maroc.</p>
                                    <p class="col-md-12 col-sm-12 bold" style="margin-bottom: 10px"><strong>E-mail :</strong> info@wafaimaassistance.com 
</p>
                                    <p class="col-md-12 col-sm-12 bold" style="margin-bottom: 10px"><strong>Pour les réclamations :</strong>reclamations@wafaimaassistance.com
</p> 
                                </div>' data-rel="popoverContact" data-placement="bottom">
                                Contact
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</div>