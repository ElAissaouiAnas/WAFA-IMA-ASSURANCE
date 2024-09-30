<?php
ob_start();
    foreach ($ticket as $ticket) {
        ?>
        <page format="81x161" orientation="P" backcolor="#fff" style="font: courier;">
                <div style="rotate: 90;width:160.9mm;height:80mm">
                    <div style="font-family: courier;font-size: 10px;position:absolute;right:10px;top:8px">www.ticket.ma</div>
                    <div style="font-family: courier;font-size: 10px;position:absolute;right:45mm;top:8px">www.ticket.ma</div>
                    <table style=" font-family: courier;width:100%;" >
                        <tr>
                            <td style="border-right: 1px dashed;padding: 2mm 2mm;width: 75%;height:90.9%;overflow: hidden;">
                                <p style="font-size: 10px;letter-spacing: 1;margin: 0;"><?php if($ticket['Salle']['id']!=1){ ?><?php echo $ticket['Salle']['name'] ?> - <?php } ?><?php echo $ticket['Spectacle']['city'] ?> <?php echo $ticket['Spectacle']['adress'] ?>&nbsp;</p>
                                <p style="margin: 0;font-size: 10px;margin-right: 15px;text-align: right;">&nbsp;</p>
                                <p style="font-size: 15px;margin: 0;"><?php echo $ticket['User']['name'] ?> (Tél. <?php echo $ticket['User']['phone'] ?>)</p>
                                <p style="font-size: 25px;margin: 0;"><?php echo $ticket['Spectacle']['name'] ?></p>
                                <p style="font-size: 30px;font-weight: bold;margin-top: 0;margin-bottom: 15px;"><?php echo $ticket['Spectacle']['date'] ?></p>
                                <p style="font-size: 25px;margin-top: 0;margin-bottom: 0px;text-align:center"><?php echo ($ticket['Ticket']['client_name'] ? $ticket['Ticket']['client_name'] : '&nbsp;') ?></p>
                                <p style="font-size: 13px;margin: 0;"><?php echo $ticket['Categorie']['name'] ?></p>
                                <p style="font-size: 13px;margin: 0;">Valeur : <?php echo $ticket['Categorie']['prix'] ?> Dhs</p>
                                <p style="font-size: 9px;margin: 0;">Frais de loc. inclus</p>

                                <table style="width:100mm;">
                                    <tr>
                                        <td style="width:80mm;">
                                            <p style="font-size: 30px;font-weight: bold;text-align: center;margin: 0;"><?php if($ticket['Salle']['id']!=1){ ?>PLACE <?php echo $ticket['Place']['code'] ?><?php } ?>&nbsp;</p>
                                            <p style="font-size: 15px;margin: 0;">Billet <?php echo $ticket['Ticket']['code'] ?></p>
                                            <p style="font-size: 15px;margin-top: 0;margin-bottom: 5px;">Achat <?php echo $ticket['Ticket']['date_achat'] ?></p>
                                            <p style="font-size: 11px;margin: 0;text-transform: uppercase;">
                                                <?php
                                                foreach ($sponsors as $key => $sponsor) {
                                                    echo $sponsor['Sponsor']['name'];
                                                    if (count($sponsors) - 1 != $key)
                                                        echo ' - ';
                                                }
                                                ?>
                                            </p>
                                        </td>
                                        <td style="width:30mm;text-align:right">
                                    <qrcode value="<?php echo $ticket['Ticket']['code'] ?>" ec="H" style="border: none;width: 20mm; background-color: white; color: black;"></qrcode>
                            </td>
                        </tr>
                    </table>
                    </td>
                    <td style="text-align: center;width: 25%;height: 120px;padding: 0;">
                        <p style="font-size: 10px;letter-spacing: 1;margin: 10mm 0 0 0;"><?php if($ticket['Salle']['id']!=1){ ?><?php echo $ticket['Salle']['name'] ?> - <?php } ?><?php echo $ticket['Spectacle']['city'] ?> <?php echo $ticket['Spectacle']['adress'] ?>&nbsp;</p>
                        <p style="font-size: 11px;font-weight: bold;margin-top: 10px;margin-bottom: 15px;"><?php echo $ticket['Spectacle']['date'] ?></p>
                        <p style="font-size: 13px;margin: 0;"><?php echo $ticket['Categorie']['name'] ?></p>
                        <p style="font-size: 13px;margin: 10px 0 20px 0;">Valeur : <?php echo $ticket['Categorie']['prix'] ?> Dhs</p>
                        <p style="font-size: 20px;font-weight: bold;text-align: center;margin: 0 0 20px 0;padding-top: 10px;"><?php if($ticket['Salle']['id']!=1){ ?>PLACE <?php echo $ticket['Place']['code'] ?><?php } ?>&nbsp;</p>
                    <qrcode value="<?php echo $ticket['Ticket']['code'] ?>" ec="H" style="border: none;width: 15mm; background-color: white; color: black;"></qrcode>
                    </td>
                    </tr>
                    </table>

                </div>
            </page>

    <?php
} 
?>