@extends('elements/layout')
@section('main')
<style type="text/css">
table {
    border-collapse: collapse;
    table-layout: fixed;
    width: 100%;
    text-align: center !important;
}

th {
    background: #F5F5F5;
}

td,
th {
    height: 53px;
    text-align: center !important;
}

td,
th {
    border: 1px solid #DDD;
    padding: 10px;
    empty-cells: show;
}

td,
th {
    text-align: left;
}

td.default {
    display: table-cell;
}

.bg-purple {
    border-top: 3px solid #A32362;
}

.bg-blue {
    border-top: 3px solid #0097CF;
}

.sep {
    background: #F5F5F5;
    font-weight: bold;
}

.txt-l {
    font-size: 28px;
    font-weight: bold;
}

.txt-top {
    position: relative;
    top: -9px;
    left: -2px;
}

.tick {
    font-size: 18px;
    color: #2CA01C;
}

.hide {
    border: 0;
    background: none;
}

table a {
    color: #179BD7;
    text-decoration: underline;
}
</style>
<section class="page-header page-header-xs">
    <div class="container">
        <h1 class="text-info">Comparatif assurances</h1>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p><b>ASSURANCES EUROPE :</b> Des contrats d´assurance conformes aux exigences de l´administration
                    délivrant les visas pour l´espace Schengen.<br>
                    <b>ASSURANCES MONDE :</b> Des contrats d´assurance qui vous offrent une couverture dans le monde
                    entier lors de vos séjours à l´étranger.<br>
                    <b>DUREE :</b> Minimum 6 mois et jusqu´à 5 ans (selon vos besoins).
                </p>
            </div>
        </div>
        <!--header class="text-center margin-bottom-20">
            <h2>Notre choix d´assurances:</h2>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <table>
                    <tbody>
                        <tr>
                            <td><img src="{{ asset('/images/AXA.png')}}" class="img-responsive" style="height:60px;width: auto"></td>
                            <td><img src="{{ asset('/images/ma.png')}}" class="img-responsive" style="height:60px;width: auto"></td>
                            <td><img src="{{ asset('/images/WAFA_IMA_Assistance_RVB.png')}}" class="img-responsive" style="height:60px;width: auto"></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="sep">
                                SCHENGEN<br>
                                <a href="{{ asset('/files/Comparatif Schengen.pdf')}}" target="_blank">Télécharger
                                    document complet</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Ce contrat répond aux exigences consulaires des pays de l´espace Schengen et
                                vous couvre vous et votre famille ainsi que votre véhicule au Maroc et dans les pays ou
                                la carte verte d’assurance est valable pendant une durée minimum de 6 mois et jusqu´à 5
                                ans.</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background: #2196f33b;font-weight: bold;font-size: 21px;">Couverture
                                médicale</td>
                        </tr>
                        <tr>
                            <td>Frais médicaux : plafond de 350 000 MAD. Frais dentaires : plafond de 800 MAD.
                                Transport, hébergement, et retour des bénéficiaires en cas d´hospitalisation de
                                l´assuré.</td>
                            <td>Frais médicaux : plafond de 350 000 MAD. Frais dentaires : plafond de 1 000 MAD.
                                Transport, hébergement, retour des bénéficiaires en cas d´hospitalisation de l´assuré.
                            </td>
                            <td>Frais médicaux : plafond de 350 000 MAD. Frais dentaires : plafond de 1 000 MAD.
                                Transport, hébergement, retour des bénéficiaires en cas d´hospitalisation de l´assuré.
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background: #2196f33b;font-weight: bold;font-size: 21px;">Assurance
                                en cas de décès</td>
                        </tr>
                        <tr>
                            <td>Rapatriement du/de la défunt(e) : formalités, transport et frais funéraires : 10 000
                                MAD. Rapatriement des bénéficiaires. Retour prématuré pour cause de décès : billet
                                retour.</td>
                            <td>Rapatriement du défunt : formalités, transport et accompagnement. Rapatriement des
                                bénéficiaires. Retour prématuré pour cause de décès d'un proche : billet retour.</td>
                            <td>Rapatriement du défunt : formalités, transport et accompagnement. Rapatriement des
                                bénéficiaires. Retour prématuré pour cause de décès d'un proche : billet retour.</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background: #2196f33b;font-weight: bold;font-size: 21px;">Assistance
                                automobile</td>
                        </tr>
                        <tr>
                            <td>Pas d'assistance automobile.</td>
                            <td>Remorquage du véhicule : plafond 1 400 MAD. Transport des passagers. Hébergement.
                                Récupération du véhicule.</td>
                            <td>Remorquage du véhicule : plafond 1 400 MAD. Transport des passagers. Hébergement.
                                Récupération du véhicule.</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background: #2196f33b;font-weight: bold;font-size: 21px;">Assistance
                                juridique</td>
                        </tr>
                        <tr>
                            <td>Conseil, défense et avance de trésorerie.</td>
                            <td>Pas de couverture en cas de procédure juridique.</td>
                            <td>Conseil, défense et avance de trésorerie.</td>
                        </tr>
                        <tr>
                            <td>Plafonds honoraires d'avocat : 20 000 MAD ; Avance de caution pénale : 50 000 MAD.</td>
                            <td></td>
                            <td>Plafonds honoraires d'avocat : 10 000 MAD ; Avance de caution pénale : 50 000 MAD.</td>
                        </tr>
                        <tr>
                            <td>6 mois - Prix (moins de 70 ans) : 450 MAD</td>
                            <td>6 mois - Prix (moins de 70 ans) : 450 MAD</td>
                            <td>6 mois - Prix (moins de 70 ans) : 450 MAD</td>
                        </tr>
                        <tr>
                            <td>1 an - Prix (moins de 70 ans) : 650 MAD</td>
                            <td>1 an - Prix (moins de 70 ans) : 650 MAD</td>
                            <td>1 an - Prix (moins de 70 ans) : 650 MAD</td>
                        </tr>
                        <tr>
                            <td><a href="{{ asset('/files/AXA CONDITIONS GENERALES ACCUEIL PLUS EN EUROPE.pdf')}}" target="_blank">Télécharger document complet</a></td>
                            <td><a href="{{ asset('/files/MAI schengen-visa-CG.pdf')}}" target="_blank">Télécharger
                                    document complet</a></td>
                            <td><a href="{{ asset('/files/WAFA IMA CG Wafa Schengen.pdf')}}" target="_blank">Télécharger
                                    document complet</a></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="sep">
                                MONDE<br>
                                <a href="{{ asset('/files/Comparatif Monde.pdf')}}" target="_blank">Télécharger document
                                    complet</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Ce contrat répond aux exigences consulaires et vous couvre vous et votre
                                famille dans le monde entier ainsi que votre véhicule au Maroc et dans les pays ou la
                                carte verte d´assurance est valable pendant une durée minimum de 6 mois et jusqu´à 5
                                ans.</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background: #2196f33b;font-weight: bold;font-size: 21px;">Couverture
                                médicale</td>
                        </tr>
                        <tr>
                            <td>Frais médicaux : plafond de 350 000 MAD. 60 000 DH en cas d'évacuation sanitaire du
                                Maroc vers l'étranger. Soins dentaires d'urgence à l'étranger : 1 000 MAD par personne
                                assurée et par sinistre. Franchise absolue par sinistre: 100 DH.</td>
                            <td>Frais médicaux : plafond de 350 000 MAD. Franchise absolu par sinistre: 300 DH. Soins
                                dentaires d'urgence à l'étranger : 1 000 MAD par personne assurée et par sinistre.</td>
                            <td>Frais médicaux : plafond de 350 000 MAD. 100 000 DH en cas d'évacuation sanitaire du
                                Maroc vers l'étranger. Soins dentaires d'urgence à l'étranger : 1 000 MAD par personne
                                assurée et par sinistre.</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background: #2196f33b;font-weight: bold;font-size: 21px;">Assurance
                                en cas de décès</td>
                        </tr>
                        <tr>
                            <td>Rapatriement du défunt : formalités, transport, frais funéraires : 10 000 MAD.
                                Rapatriement des bénéficiaires : billet d’avion retour. Retour prématuré.</td>
                            <td>Rapatriement du défunt, accompagnement, retour des membres de la famille et versement
                                d'une dotation obsèque de 10 000 MAD. Retour prématuré pris en charge.</td>
                            <td>Rapatriement du défunt, accompagnement, retour des membres de la famille et versement
                                d'une dotation obsèque de 10 000 MAD. Retour prématuré pris en charge.</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background: #2196f33b;font-weight: bold;font-size: 21px;">Assistance
                                automobile</td>
                        </tr>
                        <tr>
                            <td>En cas d’accident, panne et vol : diagnostique technique, remorquage, hébergement, frais
                                de retour, récupération du véhicule pris en charge. plafond 1500 MAD au Maroc / plafond
                                2000 MAD à l’étranger. Avance de fonds pour réparation : 20 000 MAD.</td>
                            <td>Accident, vol et panne : remorquage du véhicule à l’étranger : plafond 1500 MAD au Maroc
                                / plafond 2000 MAD à l’étranger. Avance de fonds pour réparation : 20 000 MAD.</td>
                            <td>Accident, vol et panne : remorquage du véhicule à l’étranger : plafond 1400 MAD au
                                Maroc. Avance de fonds pour réparation : 20 000 MAD.</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background: #2196f33b;font-weight: bold;font-size: 21px;">Assistance
                                juridique</td>
                        </tr>
                        <tr>
                            <td>Conseil, défense et Avance de trésorerie en cas de pépin juridique : plafond honoraires
                                d'avocat 20 000 MAD. Avance de caution pénale : plafond de 50 000 MAD.</td>
                            <td>Conseil, défense et Avance de trésorerie en cas de pépin juridique : plafond honoraires
                                d'avocat 20 000 MAD. Avance de caution pénale : plafond de 50 000 MAD.</td>
                            <td>Conseil, défense et Avance de trésorerie en cas de pépin juridique : plafond honoraires
                                d'avocat 10 000 MAD. Avance de caution pénale : plafond de 50 000 MAD.</td>
                        </tr>
                        <tr>
                            <td>6 mois - Prix (moins de 70 ans) : 700 MAD</td>
                            <td>6 mois - Prix (moins de 70 ans) : 700 MAD</td>
                            <td>6 mois - Prix (moins de 70 ans) : 700 MAD</td>
                        </tr>
                        <tr>
                            <td>1 an - Prix (moins de 70 ans) : 890 MAD</td>
                            <td>1 an - Prix (moins de 70 ans) : 890 MAD</td>
                            <td>1 an - Prix (moins de 70 ans) : 890 MAD</td>
                        </tr>
                        <tr>
                            <td><a href="{{ asset('/files/AXA CONDITIONS GENERALES GLOBAL ASSISTANCE VOYAGE.pdf')}}" target="_blank">Télécharger document complet</a></td>
                            <td><a href="{{ asset('/files/MAI CG_injad_monde.pdf')}}" target="_blank">Télécharger
                                    document complet</a></td>
                            <td><a href="{{ asset('/files/WAFA Fiche Produit Wafa Monde.pdf')}}" target="_blank">Télécharger document complet</a></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="sep">Déclaration sinistre</td>
                        </tr>
                        <tr>
                            <td>AXA Assistance :</td>
                            <td>Maroc Assistance Internationale :</td>
                            <td>WAFA Assistance :</td>
                        </tr>
                        <tr>
                            <td rowspan="2">au Maroc et à l´etranger +212(0)5 22 54 23 23</td>
                            <td>au Maroc +212(0)5 22 30 30 30</td>
                            <td rowspan="2">au Maroc et à l´etranger +212 5 29 042 042</td>
                        </tr>
                        <tr>
                            <td>l´étranger +33(1) 45 81 16 16</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <p><a style="width:100%" class="btn btn-pay" rel="nofollow" href="{{ route('formulaire') }}">Achetez
                        maintenant</a></p>
            </div>
            <div class="col-lg-4"></div>
        </div>

    </div-->
        <div class="row">
            <div class="col-lg-12">
                <table>
                    <tbody>

                        <tr>
                            <td colspan="3" class="sep">Déclaration sinistre</td>
                        </tr>
                        <tr>
                            <td colspan="3">Sauf cas fortuit ou cas de force majeure, l’assuré doit adresser à
                                l’Assureur, sous
                                peine de
                                déchéance, une déclaration relatant les circonstances du sinistre, ses causes connues ou
                                présumées, au plus tard dans les cinq (5) jours de la survenance de tout sinistre de
                                nature
                                à entraîner la mise en œuvre des garanties.</td>
                        </tr>
                        <tr>
                            <td colspan="3">Service d’assistance H24 7/7 : Tel : +212 5 22 58 95 15 Mail : Adresse :
                                No.2 Lotissement Mandarona Imm Casablanca Business Center, Casablanca </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <p><a style="width:100%" class="btn btn-pay" rel="nofollow" href="{{ route('formulaire') }}">Achetez
                        maintenant</a></p>
            </div>
            <div class="col-lg-4"></div>
        </div>
</section>
@endsection