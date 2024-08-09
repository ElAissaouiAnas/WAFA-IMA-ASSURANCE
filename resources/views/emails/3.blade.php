<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>l'upload de l'attestation</title>
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

    <p>
        Nous sommes ravis de vous informer que le contrat Maroc Assistance Internationale est prêt à être signé.
    </p>

    <p>
        Afin de faciliter le processus de signature, nous avons mis en place un système de téléchargement sécurisé. Veuillez trouver ci-joint le contrat {{$data->contrat->type}}. Vous pouvez le télécharger, le lire attentivement et le retourner signer soit aux locaux de Maroc Assistance Internationale ou via la boite mail dédiée.
    </p>

    <p>
        Si vous avez des questions concernant le contrat ou si vous avez besoin d'une assistance supplémentaire, n'hésitez pas à nous contacter. Nous sommes là pour vous aider.
    </p>

    <p>
        Nous vous remercions de votre collaboration et nous attendons avec impatience la finalisation de ce contrat.
    </p>

    <p>
        Cordialement,
        Département commercial
        Maroc Assistance Internationale
    </p>

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