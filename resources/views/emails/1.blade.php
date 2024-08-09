<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reçu de transaction</title>
    <style>
        html,
        body {
            width: 210mm;
            height: 297mm;
            margin: 0;
            padding: 0;
        }

        .content {
            /* Adjust margins for your content as needed */
            margin: 20mm;
        }

        .company-logo {
            display: block;
            width: 100px;
        }

        .bold-list {
            font-weight: bold;
        }

        .bar {
            background-color: rgba(145, 65, 70, 255);
            width: 100%;
            height: 100px;
            color: white;
        }

        .bar1 {
            background-color: rgba(145, 144, 172, 255);
            width: 100%;
            height: 250px;
            color: white;
        }
    </style>
</head>

<body>
    <img src={{asset('/images/logo.png')}} alt="Logo" class="company-logo">

    <br>

    <div class="bar">
        <center>
            <h1>Nous vous remercions</h1>
            <h3>de votre souscription !</h3>
        </center>
    </div>

    <p>Cher(e) {{$data->prenom}} {{$data->nom}},</p>
    <p>Nous vous remercions d'avoir effectué votre achat chez Maroc Assistance Internationale.</p>
    <p>Votre transaction a été traitée avec succès et nous sommes heureux de confirmer les détails de votre commande :</p>
    <ul>
        <li><b>Numéro de commande : #{{$data->id}}</b></li>
        <li><b>Date de commande : {{$data->created_at->format('d/m/Y')}}</b></li>
        <li><b>Montant total : {{$data->montant}}</b></li>
        <li><b>Mode de paiement : Carte Bancaire</b></li>
    </ul>
    <p>Vous trouverez ci-joint une copie du reçu de votre transaction.</p>
    <p>Nous tenons à vous remercier encore une fois pour votre confiance et votre soutien continu. Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter. Nous serons ravis de vous aider.</p>
    <p>Cordialement,</p>
    <p>Département commercial</p>
    <p>Maroc Assistance Internationale</p>

    <div class="bar1">
        <center>
            <br>
            <h1>Une question ?</h1>
            <h1>Une modification ?</h1>
            <br>
            <h3>CONTACTEZ VOTRE ASSUREUR</h3>
        </center>
    </div>

</body>

</html>