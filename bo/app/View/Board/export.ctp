<STYLE type="text/css">
 .tableTd {
     border-width: 0.5pt;
  border: solid;
 }
 .tableTdContent{
  border-width: 0.5pt;
  border: solid;
 }
 #titles{
  font-weight: bolder;
 }
  
</STYLE>
<table>
 <tr>
  <td><b>Payments Data Export<b></td>
 </tr>
 <tr>
  <td><b>Exported Date:</b></td>
  <td><?php echo date("F j, Y, g:i a"); ?></td>
 </tr>
 <tr>
  <td><b>Number of Rows:</b></td>
  <td style="text-align:left"><?php echo count($data);?></td>
 </tr>
 <tr>
  <td></td>
 </tr>
  <tr id="titles">
            <td class="tableTd"><?php echo mb_convert_encoding("Code réservation Binga",'utf-16','utf-8') ?></td>
            <td class="tableTd">Date de RDV</td>
            <td class="tableTd"> <?php echo mb_convert_encoding("Réf. Dossier",'utf-16','utf-8') ?></td>
            <td class="tableTd">Issuer</td>
            <td class="tableTd">Email</td>
            <td class="tableTd"><?php echo mb_convert_encoding("Tél",'utf-16','utf-8') ?></td>
            <td class="tableTd">Frais de Visa </td>
            <td class="tableTd">Frais de Service </td>
            <td class="tableTd">Total TLS </td>
            <td class="tableTd">Montant Wafacash</td>
            <td class="tableTd">Status</td>
            <td class="tableTd">Creation Date</td>
            <td class="tableTd">Payment Date</td>
            <!-- <td class="tableTd">Estimated Payment Date</td> -->
  </tr> 
  <?php 
  $days = array(
		'Sunday' => 3,
		'Monday' => 2,
		'Tuesday' => 2,
		'Wednesday' => 2,
		'Thursday' => 4,
		'Friday' => 4,
		'Saturday' => 4,
	);
  $services = array(
        'cas2fr' => 'Casablanca France',
        'cas2be' => 'Casablanca Belgique',
        'cas2it' => 'Casablanca Italie',
        'rba2fr' => 'Rabat France',
        'rba2it' => 'Rabat Italie',
        'rba2dk' => 'Rabat Danemark',
        'rba2de' => 'Rabat Allemagne',
        'rak2de' => 'Marrakech Allemagne',
        'rak2fr' => 'Marrakech France',
        'ndr2de' => 'Nador Allemagne',
        'oud2dk' => 'Oujda Danemark',

    );
	$paidDate ='';
	$esPaidDate ='';
  foreach($data as $row):
        $status = $row['Payment']['status'];

    if($status == 'PRE-PAY'){
        continue;
    }
	  if($row['Payment']['valid'] && $row['Payment']['status'] == 'PAID'){
		    $status = 'ISSUED';
	  }
	  if($row['Payment']['cancel'] && $row['Payment']['status'] == 'PAID'){
		    $status = 'CANCELLED';
	  }
    
	 
	  if($row['Payment']['paidDate']){
		$paidDate = strftime("%A", strtotime($row['Payment']['paidDate']))." ".date("d-m-Y H:i",strtotime($row['Payment']['paidDate']));
		$k = strftime("%A", strtotime($row['Payment']['paidDate']));
		$esPaidDate = strftime("%A", strtotime($row['Payment']['paidDate']. " +".$days[$k]." days"))." ".date("d-m-Y", strtotime($row['Payment']['paidDate']. " +".$days[$k]." days"));
	  }
   echo '<tr>';
   echo '<td class="tableTdContent">'.$row['Payment']['id_transaction'].'</td>';
   echo '<td class="tableTdContent">'.$row['Payment']['rdv'].'</td>';
   echo '<td class="tableTdContent">'.$row['Payment']['pnr'].'</td>';
   echo '<td class="tableTdContent">'.$services[$row['Payment']['service']].'</td>';
   echo '<td class="tableTdContent">'.mb_convert_encoding($row['Payment']['buyerEmail'],'utf-16','utf-8').'</td>';
   echo '<td class="tableTdContent">&nbsp;'.$row['Payment']['buyerPhone'].'</td>';
   echo '<td class="tableTdContent">'.str_replace('.',',',$row['Payment']['montant_visa']).'</td>';
   echo '<td class="tableTdContent">'.str_replace('.',',',$row['Payment']['montant_service']).'</td>';
   echo '<td class="tableTdContent">'.str_replace('.',',',round($row['Payment']['montant']/1.12,2)).'</td>';
   echo '<td class="tableTdContent">'.str_replace('.',',',$row['Payment']['montant']).'</td>';
   echo '<td class="tableTdContent">'.$status.'</td>';
   echo '<td class="tableTdContent">'.date("d-m-Y H:i",strtotime($row['Payment']['created'])).'</td>';
   echo '<td class="tableTdContent">'.$paidDate.'</td>';
   // echo '<td class="tableTdContent">'.$esPaidDate.'</td>';
   echo '</tr>';
   endforeach;
  ?>
</table>