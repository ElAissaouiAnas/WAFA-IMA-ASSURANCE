<style type="text/css">
    body{margin: 0;padding: 0}
    @media print {
        header  {
            display: none;
        }}</style>

    <header style="margin: 0 0 10px;background: #e6edf6;padding: 10px;text-align: center;overflow: hidden;border-bottom: 1px solid #779bca;_height: 1%;">
        <?php echo $this->Html->image('logo.png', array('style' => 'float: left;background: none;height: auto;overflow: visible;padding: 0;width: auto;position: static;')) ?>
        <?php echo $this->Html->link('Imprimer', '/spectacles/' . $this->params->action . '2/' . $this->request['pass'][0], array('style' => 'float: right;-moz-border-radius: 8px;background-color: #6FBD2D;border: 3px solid #fff;color: #FFFFFF;font-size: 1.5em;font-weight: bold;overflow: visible;padding: 0.15em 0.5em;cursor: pointer;', 'target' => '_blank')); ?>
    <p style="float: left;margin: 10px 20px;font: 1.3em Arial, Helvetica, sans-serif;color: #003580;">Imprimer les tickets en cliquant sur « Imprimer ».</p>
</header>
<div style="width: 161mm;margin:0  auto;">
    <?php
//  debug($ticket);
//$ticket = $ticket[0];
    if (count($ticket)) {
        foreach ($ticket as $ticket) {
            ?>
            <div style="font-family: courier;font-size: 15px;margin:  auto;width:160.9mm;height:auto;position: relative">
                <div style="font-family: courier;font-size: 10px;position:absolute;right:10px;top:8px">www.ticket.ma</div>
                <div style="font-family: courier;font-size: 10px;position:absolute;right:45mm;top:8px">www.ticket.ma</div>
                <table style="border: 1px solid;width: 100%;">
                    <tr>
                        <td style="border-right: 1px dashed;padding: 2mm 2mm;width: 75%;height:90.9%;overflow: hidden;">
                            <p style="font-size: 10px;letter-spacing: 1;margin: 0;"><?php if ($ticket['Salle']['id'] != 1) { ?><?php echo $ticket['Salle']['name'] ?> - <?php } ?><?php echo $ticket['Spectacle']['city'] ?> <?php echo $ticket['Spectacle']['adress'] ?>&nbsp;</p>
                            <p style="margin: 0;font-size: 10px;margin-right: 15px;text-align: right;">&nbsp;</p>
                            <p style="font-size: 15px;margin: 0;"><?php echo $ticket['User']['name'] ?> (Tél. <?php echo $ticket['User']['phone'] ?>)</p>
                            <p style="font-size: 25px;margin: 0;"><?php echo $ticket['Spectacle']['name'] ?></p>
                            <p style="font-size: 30px;font-weight: bold;margin-top: 0;margin-bottom: 15px;"><?php echo $ticket['Spectacle']['date'] ?></p>
                            <p style="font-size: 29px;margin-top: 0;margin-bottom: 10px;"><?php echo ($ticket['Ticket']['client_name'] ? $ticket['Ticket']['client_name'] : '&nbsp;') ?></p>
                            <p style="font-size: 13px;margin: 0;"><?php echo $ticket['Categorie']['name'] ?></p>
                            <p style="font-size: 13px;margin: 0;">Valeur : <?php echo $ticket['Categorie']['prix'] ?> Dhs</p>
                            <p style="font-size: 9px;margin: 0;">Frais de loc. inclus</p>
                            <p style="font-size: 30px;font-weight: bold;text-align: center;margin: 0;"><?php if ($ticket['Salle']['id'] != 1) { ?>PLACE <?php echo $ticket['Place']['code'] ?><?php } ?>&nbsp;</p>
                            <p style="font-size: 15px;margin: 0;">Billet <?php echo $ticket['Ticket']['code'] ?></p>
                            <p style="font-size: 15px;margin-top: 0;margin-bottom: 10px;">Achat <?php echo $ticket['Ticket']['date_achat'] ?></p>
                            <table style="width:435px;">
                                <tr>
                                    <td style="width:80mm;"><p style="font-size: 15px;margin: 0;text-transform: uppercase;"> <?php
        foreach ($sponsors as $key => $sponsor) {
            echo $sponsor['Sponsor']['name'];
            if (count($sponsors) - 1 != $key)
                echo ' - ';
//                    if( count($sponsors-1) > $key   )echo ' - ' ;
        }
            ?>
                                        </p></td>
                                    <td style="width:30mm;text-align:right"><?php echo $this->Html->image('genbc.php?string=' . htmlentities($ticket['Ticket']['code'], ENT_QUOTES, "ISO8859-1") . '&amp;control=1', array('style' => 'height: 35px;')) ?> </td>
                                </tr>
                            </table>



                        </td>
                        <td style="text-align: center;width: 25%;height: 120px;">
                            <p style="font-size: 10px;letter-spacing: 1;margin: 10px 0 0 0;"><?php if ($ticket['Salle']['id'] != 1) { ?><?php echo $ticket['Salle']['name'] ?> - <?php } ?><?php echo $ticket['Spectacle']['city'] ?> <?php echo $ticket['Spectacle']['adress'] ?>&nbsp;</p>
                            <p style="font-size: 11px;font-weight: bold;margin-top: 10px;margin-bottom: 15px;"><?php echo $ticket['Spectacle']['date'] ?></p>
                            <p style="font-size: 13px;margin: 0;"><?php echo $ticket['Categorie']['name'] ?></p>
                            <p style="font-size: 13px;margin: 10px 0 50px 0;">Valeur : <?php echo $ticket['Categorie']['prix'] ?> Dhs</p>
                            <p style="font-size: 20px;font-weight: bold;text-align: center;margin: 0 0 20px 0;padding-top: 10px;"><?php if ($ticket['Salle']['id'] != 1) { ?>PLACE <?php echo $ticket['Place']['code'] ?><?php } ?>&nbsp;</p>
                            <?php echo $this->Html->image('genbc.php?string=' . htmlentities($ticket['Ticket']['code'], ENT_QUOTES, "ISO8859-1") . '&amp;control=1', array('style' => 'margin-bottom: 30px;height: 25px;')) ?> 
                        </td>
                    </tr>
                </table>
            </div>

            <?php
        }
    } else {
        echo '<p style="float: left;margin: 10px 20px;font: 1.1em Arial, Helvetica, sans-serif;color: #222;">Aucun ticket disponible .Veuillez regénérer les tickets .</p>';
    }
    ?>
</div>