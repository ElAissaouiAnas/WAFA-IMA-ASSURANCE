<!DOCTYPE html>
<html>
<head>
    <title></title>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

</head>
<body>

<center style="color:rgb(0,0,0);font-family:sans-serif;font-size:medium">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ededed" align="center" style="table-layout:fixed;margin:0px auto">
        <tbody>
            <tr>
                <td align="center">
                    <table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#ededed" align="center">
                        <tbody>
                            <tr>
                                <td width="100%" bgcolor="#ededed" align="left">
                                    <table width="230" cellspacing="0" cellpadding="0" border="0" bgcolor="#ededed" align="left">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ededed" align="center" style="table-layout:fixed;margin:0px auto">
        <tbody>
            <tr>
                <td align="center">
                    <table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#ededed" align="center">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" style="border:1px solid rgb(255,255,255);border-radius:4px">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <table cellspacing="0" cellpadding="0" border="0" align="center">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="15" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="590" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td width="20" style="height:10px"></td>
                                                                                                <td>
                                                                                                    <table width="556" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td style="color:rgb(127,140,157);font-family:sans-serif;font-size:18px;line-height:25px">Bonjour {{$data->prenom}},</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td height="20" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">
                                                                                                                    @if ($data->status == 'PAID')
                                                                                                                        Votre paiement a été confirmé avec succès. Nous vous remercions de votre confiance.
                                                                                                                    @else
                                                                                                                        Votre réservation a été confirmée avec succès. Nous vous remercions de votre confiance.
                                                                                                                    @endif
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td height="20" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td height="20" style="border-bottom:1px solid rgb(204,204,204);color:rgb(227,141,19);font-weight:bold;font-size:16px;font-family:sans-serif;line-height:23px">Information sur votre réservation:</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                                        <tbody>
                                                                                                                            <tr>
                                                                                                                                <td style="width:277.778px;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">Nom du l'assuré:</td>
                                                                                                                                <td style="width:277.778px;text-align:right;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px;text-transform: uppercase;">{{$data->prenom}} {{$data->nom}}</td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td style="width:277.778px;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">Compagnie choisie :</td>
                                                                                                                                <td style="width:277.778px;text-align:right;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">{{$data->company}}</td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td style="width:277.778px;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">Type de assurance:</td>
                                                                                                                                <td style="width:277.778px;text-align:right;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">{{$data->type}}</td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td style="width:277.778px;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">Durée:</td>
                                                                                                                                <td style="width:277.778px;text-align:right;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">{{$data->duree}}</td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td height="20" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td height="20" style="color:rgb(227,141,19);line-height:0;border-bottom:1px solid rgb(204,204,204);font-family: sans-serif;font-weight:bold;font-size:16px">Informations sur la réservation:</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="border-bottom:1px solid rgb(204,204,204)">
                                                                                                                        <tbody>
                                                                                                                            <tr>
                                                                                                                                <td style="width:277.778px;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">Prix HT:</td>
                                                                                                                                <td style="width:277.778px;text-align:right;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">{{$data->prime_ht}} DH</td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="border-bottom:1px solid rgb(204,204,204)">
                                                                                                                        <tbody>
                                                                                                                            <tr>
                                                                                                                                <td style="width:277.778px;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">Frais de service:</td>
                                                                                                                                <td style="width:277.778px;text-align:right;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">0 DH</td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td style="width:277.778px;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">dont TVA:</td>
                                                                                                                                <td style="width:277.778px;text-align:right;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">{{$data->prime_tva}} DH</td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                                        <tbody>
                                                                                                                            <tr>
                                                                                                                                <td style="width:277.778px;font-weight:bold;color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:23px">Total TTC:</td>
                                                                                                                                <td style="width:277.778px;text-align:right;color:rgb(119,119,119);font-weight:bold;font-family:sans-serif;font-size:13px;line-height:23px">{{$data->prime_ttc}} DH</td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td height="20" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="20" style="height:10px"></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="15" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <table cellspacing="0" cellpadding="0" border="0" bgcolor="#ff8725" align="center" style="border-radius:4px">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td width="20" style="height:10px"></td>
                                                                                                <td>
                                                                                                    <table width="200" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td height="8" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td width="200" style="color:rgb(255,255,255);font-family:sans-serif;font-size:15px;font-weight:lighter;line-height:23px;text-align:center"><a style="font-weight:bold;color:rgb(255,255,255);text-decoration-line:none" href="#" onClick="window.print();return false">Imprimez</a></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td height="8" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="20" style="height:10px"></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <table cellspacing="0" cellpadding="0" border="0" align="center" style="padding-top:20px">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td width="20" style="height:10px"></td>
                                                                                                <td>
                                                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td height="8" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:16px">
                                                                                                                Payez votre réservation d'assurance.<br>Vous recevrez votre contrat par e-mail. Veuillez le signer et nous le retourner. Vous disposez de plusieurs moyens de nous le renvoyer, consultez-les sur www.assurancevoyagevisa.com<br>
                                                                                                                La signature du contrat et le paiement de la réserve par le souscripteur font foi d'acceptation du contrat.
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="color:rgb(127,140,157);font-family:sans-serif;font-size:11px;line-height:16px">
                                                                                                                    Ce mail n’est pas considéré comme un reçu de paiement.
                                                                                                                    <br>Prière de ne pas répondre à cette adresse email.</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td height="20" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:16px;font-weight:bold">Pour toutes remarques, questions, ou réclamations, notre Centre Service Client est à votre disposition au 05 22 58 95 15, reclamations@wafaimaassistance.com:&nbsp;
                                                                                                                    <br>
                                                                                                                    <div style="padding-top:10px">Du Lundi au Vendredi de 9h à 17h&nbsp;
                                                                                                                    </div>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td height="8" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="20" style="height:10px"></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="21" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table cellspacing="0" cellpadding="0" border="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#ededed" align="center">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="10" colspan="3" style="font-size:0px;line-height:0">&nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="20" style="height:10px"></td>
                                                                                <td>
                                                                                    <table width="270" cellspacing="0" cellpadding="0" border="0" bgcolor="#ededed" align="right">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="font-family: sans-serif;font-size: 12px;text-align:right"><a>assurancevoyagevisa.com</a>&nbsp;|&nbsp;<a>Conditions générales</a></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <table width="270" cellspacing="0" cellpadding="0" border="0" bgcolor="#ededed" align="left">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="font-family: sans-serif;font-size: 12px;">© Assurance Voyage MAI {{date('Y')}}</td>
                                                                                                <td width="20"></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td width="1" style="height:10px"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ededed" align="center" style="table-layout:fixed">
        <tbody>
            <tr>
                <td width="610" height="30" bgcolor="#ededed" align="center" style="font-size:0px;line-height:0">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <p style="color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:16px;padding-left:10px;padding-right:10px">Conformément à la loi 09/08, vous disposez à tout moment d’un droit individuel d’accès ainsi que d'un droit d'information complémentaire, de rectification des données vous concernant et, le cas échéant, d'opposition au traitement de ces données ou à leur transmission. Pour l’exercer, il vous suffit d’adresser un courrier à : reclamations@wafaimaassistance.com, Service Conformité - Traitement des données personnelles - CASABLANCA – MAROC</p>
    <p style="color:rgb(127,140,157);font-family:sans-serif;font-size:13px;line-height:16px;padding-left:10px;padding-right:10px;padding-bottom:20px">Ce message a été établi à l'intention exclusive de ses destinataires . Si vous recevez ce message par erreur, merci de le détruire . Toute utilisation de ce message non conforme à sa destination, toute diffusion ou toute publication, totale ou partielle, est interdite. L'internet ne permettant pas d'assurer l'intégrité de ce message, « <a href="" target="_blank">www.assurancevoyagevisa.com</a> » décline toute responsabilité au titre de ce message, dans l'hypothèse où il aurait été modifié.</p>
</center>

</body>
</html>