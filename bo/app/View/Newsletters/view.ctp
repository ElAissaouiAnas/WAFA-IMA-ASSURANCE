<?php if(empty($newsletters['Newsletter']['body'])){ ?>
<table style="background-color: #585858; width: 100%; font-family: Arial,Sindbad,Kalimati,Verdana,Arial,sans-serif; " border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em;" width="10">
<table border="0" cellspacing="0" cellpadding="0" width="10">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em;">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
<td align="center">
<table border="0" cellspacing="0" cellpadding="0" width="604">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em;" height="30">&nbsp;</td>
</tr>
<tr>
<td width="25%" align="left"><a href="http://www.lavion.ma/" target="_blank"><img src="http://ec2-54-234-65-29.compute-1.amazonaws.com/logo-lavion.ma.png" border="0" alt="" /></a></td>
<td style="color: #f28300; font-size: 24px;" width="75%" align="right" valign="middle"></td>
</tr>
<tr>
<td style="font-size: 0px; line-height: 0em;" height="8">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="background-color: #fff;" border="0" cellspacing="0" cellpadding="0" width="604">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; border-top: 1px solid #585858;" width="5" height="5" valign="top"><img style="display: block;" src="https://www.kayak.com/eimg/coreImages/corners/585858-464646-ffffff-tl.png" alt="" width="5" height="5" /></td>
<td style="border-top: 1px solid #464646; font-size: 0px; line-height: 0em;" colspan="3" height="5">&nbsp;</td>
<td style="font-size: 0px; line-height: 0em; border-top: 1px solid #585858;" width="5" height="5" valign="top"><img style="display: block;" src="https://www.kayak.com/eimg/coreImages/corners/585858-464646-ffffff-tr.png" alt="" width="5" height="5" /></td>
</tr>
<tr>
<td style="border-left: 1px solid #464646; font-size: 0px; line-height: 0em;" width="4">&nbsp;</td>
<td style="font-size: 0px; line-height: 0em;" width="20">&nbsp;</td>
<td>
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em;" height="14">&nbsp;</td>
</tr>
<tr>
<td style="font-size: 22px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none; line-height: 1.231em;" align="left"><?php echo $newsletters['Newsletter']['name'] ?></td>
</tr>
<tr>
<td style="font-size: 0px; line-height: 0em;" height="10">&nbsp;</td>
</tr>
<?php
if (count($deals)) {
	foreach ($deals as $deal) {
?>
<tr>
<td style="width: 100%;">
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; background-color: #e2e2e2; width: 100%;" height="1">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; background-color: #ffffff; width: 100%;" height="8">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="width: 100%; line-height: 1.1em;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td rowspan="5" width="82" align="left" valign="top"><a href="http://www.lavion.ma/" target="_blank"><img src="http://www.royalairmaroc.com/images/logo/ram_be.gif" border="0" alt="" width="96" height="96" /></a></td>
<td rowspan="5" width="8">&nbsp;</td>
<td height="20" align="left" valign="middle"><span style="font-weight: bold; font-size: 14px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;">
<a class="pricelink" style="font-weight: bold; font-size: 14px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;" href="http://www.lavion.ma/" target="_blank"><strong>D&eacute;part: </strong><span style="font-weight: bold; font-size: 14px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-transform: uppercase;"><?php echo $deal['Deal']['depart'] ?></span></a></span></td>
</tr>
<?php if ($deal['Deal']['arriver1']) { ?>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;"><?php echo $deal['Deal']['arriver1'] ?>: <?php echo $deal['Deal']['prixArriver1'] ?> </span> (<?php echo $deal['Deal']['descArriver1'] ?>)</div>
</td>
</tr>
  <?php } ?>
<?php if ($deal['Deal']['arriver2']) { ?>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;"><?php echo $deal['Deal']['arriver2'] ?>: <?php echo $deal['Deal']['prixArriver2'] ?> </span> (<?php echo $deal['Deal']['descArriver2'] ?>)</div>
</td>
</tr>
  <?php } ?>
<?php if ($deal['Deal']['arriver3']) { ?>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;"><?php echo $deal['Deal']['arriver3'] ?>: <?php echo $deal['Deal']['prixArriver3'] ?> </span> (<?php echo $deal['Deal']['descArriver3'] ?>)</div>
</td>
</tr>
  <?php } ?>
<tr>
<td height="17" align="left" valign="bottom">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td align="left"><a class="pricelink" style="font-weight: bold; font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;" href="http://www.lavion.ma/" target="_blank">Royal Air Maroc</a></td>
<td align="right">&nbsp;</td>
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
<td style="font-size: 0px; line-height: 0em;" height="10">&nbsp;</td>
</tr>
<?php }}else{?>
<tr>
<td style="width: 100%;">
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; background-color: #e2e2e2; width: 100%;" height="1">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; background-color: #ffffff; width: 100%;" height="8">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="width: 100%; line-height: 1.1em;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td rowspan="5" width="82" align="left" valign="top"><a href="http://www.lavion.ma/" target="_blank"><img src="http://www.royalairmaroc.com/images/logo/ram_be.gif" border="0" alt="" width="96" height="96" /></a></td>
<td rowspan="5" width="8">&nbsp;</td>
<td height="20" align="left" valign="middle"><span style="font-weight: bold; font-size: 14px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;"><a class="pricelink" style="font-weight: bold; font-size: 14px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;" href="http://www.lavion.ma/" target="_blank"><strong>D&eacute;part: </strong><span style="font-weight: bold; font-size: 14px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-transform: uppercase;">CASABLANCA</span></a></span></td>
</tr>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;">Paris: 750DH A/R </span> (Tarif TTC valable du 12/8/2013 au 20/8/2013)</div>
</td>
</tr>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;">Paris: 750DH A/R </span> (Tarif TTC valable du 12/8/2013 au 20/8/2013)</div>
</td>
</tr>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;">Paris: 750DH A/R </span> (Tarif TTC valable du 12/8/2013 au 20/8/2013)</div>
</td>
</tr>
<tr>
<td height="17" align="left" valign="bottom">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td align="left"><a class="pricelink" style="font-weight: bold; font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;" href="http://www.lavion.ma/" target="_blank">Royal Air Maroc</a></td>
<td align="right">&nbsp;</td>
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
<td style="font-size: 0px; line-height: 0em;" height="10">&nbsp;</td>
</tr>
<tr>
<td style="width: 100%;">
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; background-color: #e2e2e2; width: 100%;" height="1">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; background-color: #ffffff; width: 100%;" height="8">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="width: 100%; line-height: 1.1em;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td rowspan="5" width="82" align="left" valign="top"><a href="http://www.lavion.ma/" target="_blank"><img src="http://www.pmdm.fr/wp/wp-content/uploads/2009/02/monogramme_copie.jpg" border="0" alt="" width="96" height="96" /></a></td>
<td rowspan="5" width="8">&nbsp;</td>
<td height="20" align="left" valign="middle"><span style="font-weight: bold; font-size: 14px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;"><a class="pricelink" style="font-weight: bold; font-size: 14px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;" href="http://www.lavion.ma/" target="_blank"><strong>D&eacute;part: </strong><span style="font-weight: bold; font-size: 14px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-transform: uppercase;">CASABLANCA</span></a></span></td>
</tr>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;">Paris: 750DH A/R </span> (Tarif TTC valable du 12/8/2013 au 20/8/2013)</div>
</td>
</tr>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;">Paris: 750DH A/R </span> (Tarif TTC valable du 12/8/2013 au 20/8/2013)</div>
</td>
</tr>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;">Paris: 750DH A/R </span> (Tarif TTC valable du 12/8/2013 au 20/8/2013)</div>
</td>
</tr>
<tr>
<td height="17" align="left" valign="bottom">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td align="left"><a class="pricelink" style="font-weight: bold; font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;" href="http://www.lavion.ma/" target="_blank">Royal Air Maroc</a></td>
<td align="right">&nbsp;</td>
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
<td style="font-size: 0px; line-height: 0em;" height="10">&nbsp;</td>
</tr>
<tr>
<td style="width: 100%;">
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; background-color: #e2e2e2; width: 100%;" height="1">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; background-color: #ffffff; width: 100%;" height="8">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="width: 100%; line-height: 1.1em;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td rowspan="5" width="82" align="left" valign="top"><a href="http://www.lavion.ma/" target="_blank"><img src="http://www.pmdm.fr/wp/wp-content/uploads/2009/02/monogramme_copie.jpg" border="0" alt="" width="96" height="96" /></a></td>
<td rowspan="5" width="8">&nbsp;</td>
<td height="20" align="left" valign="middle"><span style="font-weight: bold; font-size: 16px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;"><a class="pricelink" style="font-weight: bold; font-size: 16px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;" href="http://www.lavion.ma/" target="_blank"><strong>D&eacute;part: </strong><span style="font-weight: bold; font-size: 15px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf;">CASABLANCA</span></a></span></td>
</tr>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;">Paris: 750DH A/R </span> (Tarif TTC valable du 12/8/2013 au 20/8/2013)</div>
</td>
</tr>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;">Paris: 750DH A/R </span> (Tarif TTC valable du 12/8/2013 au 20/8/2013)</div>
</td>
</tr>
<tr>
<td height="20" align="left" valign="middle">
<div style="font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #333333; text-decoration: none;"><span style="font-size: 13px; font-weight: bold;">Paris: 750DH A/R </span> (Tarif TTC valable du 12/8/2013 au 20/8/2013)</div>
</td>
</tr>
<tr>
<td height="17" align="left" valign="bottom">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td align="left"><a class="pricelink" style="font-weight: bold; font-size: 11px; font-family: Arial,Sindbad,Kalimati,Verdana,sans-serif; color: #1d6dcf; text-decoration: none;" href="http://www.lavion.ma/" target="_blank">Royal Air Maroc</a></td>
<td align="right">&nbsp;</td>
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
<td style="font-size: 0px; line-height: 0em;" height="10">&nbsp;</td>
</tr>
<?php } ?>
</tbody>
</table>
</td>
<td width="20">&nbsp;</td>
<td style="border-right: 1px solid #464646; font-size: 0px; line-height: 0em;" width="4">&nbsp;</td>
</tr>
<tr>
<td style="border-left: 1px solid #464646; font-size: 0px; line-height: 0em;" width="4" height="20">&nbsp;</td>
<td style="font-size: 0px; line-height: 0em;" colspan="3" height="20">&nbsp;</td>
<td style="border-right: 1px solid #464646; font-size: 0px; line-height: 0em;" width="4" height="20">&nbsp;</td>
</tr>

<tr>
<td style="font-size: 0px; line-height: 0em;" width="5" height="5" valign="top"><img style="display: block;" src="https://www.kayak.com/eimg/coreImages/corners/585858-464646-ffffff-bl.png" alt="" width="5" height="5" /></td>
<td style="font-size: 0px; line-height: 0em;" colspan="3" height="5"><img style="display: block;" src="https://www.kayak.com/eimg/coreImages/corners/bubble-bottom-464646.png" alt="" width="594" height="5" /></td>
<td style="font-size: 0px; line-height: 0em;" width="5" height="5" valign="top"><img style="display: block;" src="https://www.kayak.com/eimg/coreImages/corners/585858-464646-ffffff-br.png" alt="" width="5" height="5" /></td>
</tr>
</tbody>
</table>
<table border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em;" height="16">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="background-color: #fff;" border="0" cellspacing="0" cellpadding="0" width="604">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; border-top: 1px solid #585858;" width="5" height="5" valign="top"><img style="display: block;" src="https://www.kayak.com/eimg/coreImages/corners/585858-464646-ffffff-tl.png" alt="" width="5" height="5" /></td>
<td style="border-top: 1px solid #464646; font-size: 0px; line-height: 0em;" colspan="3" height="5">&nbsp;</td>
<td style="font-size: 0px; line-height: 0em; border-top: 1px solid #585858;" width="5" height="5" valign="top"><img style="display: block;" src="https://www.kayak.com/eimg/coreImages/corners/585858-464646-ffffff-tr.png" alt="" width="5" height="5" /></td>
</tr>
<tr>
<td style="border-left: 1px solid #464646; font-size: 0px; line-height: 0em;" width="4" height="20">&nbsp;</td>
<td style="font-size: 0px; line-height: 0em;" colspan="3" height="20">&nbsp;</td>
<td style="border-right: 1px solid #464646; font-size: 0px; line-height: 0em;" width="4" height="20">&nbsp;</td>
</tr>
<tr>
<td style="border-left: 1px solid #464646; font-size: 0px; line-height: 0em;" width="4">&nbsp;</td>
<td style="font-size: 0px; line-height: 0em;" width="20">&nbsp;</td>
<td><span style="font-family: Arial,Sindbad,Kalimati,Verdana,Arial,sans-serif; font-size: 22px; color: #333333;">KAYAK Tips: How to get CheapCaribbean's best deals</span> 
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; background-color: #ffffff; width: 100%;" height="8">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em; background-color: #e2e2e2; width: 100%;" height="5">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-family: Arial,Sindbad,Kalimati,Verdana,Arial,sans-serif; color: #333333; font-size: 14px;" height="30" align="left" valign="middle">Bring a friend, as rates are based on double occupancy.</td>
</tr>
<tr>
<td style="font-size: 0px; line-height: 0em; border-bottom: 1px solid #E2E2E2;" width="`vacationEntryTableWidth`" height="2">&nbsp;</td>
</tr>
<tr>
<td style="font-size: 0px; line-height: 0em;" width="`vacationEntryTableWidth`" height="2">&nbsp;</td>
</tr>
<tr>
<td style="font-family: Arial,Sindbad,Kalimati,Verdana,Arial,sans-serif; color: #333333; font-size: 14px;" height="30" align="left" valign="middle">Airfares vary by departure city.</td>
</tr>
</tbody>
</table>
</td>
<td width="20">&nbsp;</td>
<td style="border-right: 1px solid #464646; font-size: 0px; line-height: 0em;" width="4">&nbsp;</td>
</tr>
<tr>
<td style="border-left: 1px solid #464646; font-size: 0px; line-height: 0em;" width="4" height="20">&nbsp;</td>
<td style="font-size: 0px; line-height: 0em;" colspan="3" height="20">&nbsp;</td>
<td style="border-right: 1px solid #464646; font-size: 0px; line-height: 0em;" width="4" height="20">&nbsp;</td>
</tr>
<tr>
<td style="font-size: 0px; line-height: 0em;" width="5" height="5" valign="top"><img style="display: block;" src="https://www.kayak.com/eimg/coreImages/corners/585858-464646-ffffff-bl.png" alt="" width="5" height="5" /></td>
<td style="font-size: 0px; line-height: 0em;" colspan="3" height="5"><img style="display: block;" src="https://www.kayak.com/eimg/coreImages/corners/bubble-bottom-464646.png" alt="" width="594" height="5" /></td>
<td style="font-size: 0px; line-height: 0em;" width="5" height="5" valign="top"><img style="display: block;" src="https://www.kayak.com/eimg/coreImages/corners/585858-464646-ffffff-br.png" alt="" width="5" height="5" /></td>
</tr>
</tbody>
</table>
<table border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em;" height="16">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="font-family: Arial,Sindbad,Kalimati,Verdana,Arial,sans-serif; color: #bababa; font-size: 12px; line-height: 1.6em;" border="0" cellspacing="0" cellpadding="0" width="604">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em;" height="16">&nbsp;</td>
</tr>
<tr>
<td style="font-family: Arial,Sindbad,Kalimati,Verdana,Arial,sans-serif; color: #bababa; font-size: 12px; line-height: 1.6em;" width="100%" align="center">&copy; 2013 LAVION.ma</td>
</tr>
<tr>
<td style="font-family: Arial,Sindbad,Kalimati,Verdana,Arial,sans-serif; color: #bababa; font-size: 12px; line-height: 1.6em;" width="100%" align="center">193, Bd de la R&eacute;sistance, 20 330 Casablanca</td>
</tr>
<tr>
<td width="100%" align="center"><a style="font-family: Arial,Sindbad,Kalimati,Verdana,Arial,sans-serif; color: #bababa; font-size: 12px; line-height: 1.6em; text-decoration: none;" href="http://www.lavion.ma/">Lavion.ma</a></td>
</tr>
<tr>
<td style="font-size: 0px; line-height: 0em;" height="30">&nbsp;</td>
</tr>
</tbody>
</table>
<td style="font-size: 0px; line-height: 0em;" width="10">
<table border="0" cellspacing="0" cellpadding="0" width="10">
<tbody>
<tr>
<td style="font-size: 0px; line-height: 0em;">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<?php }else{ 
echo $newsletters['Newsletter']['body'] ;
 } ?>
 <?php exit();?>