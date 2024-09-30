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
            <td class="tableTd">ID</td>
            <td class="tableTd"> <?php echo mb_convert_encoding("N° PNR",'utf-16','utf-8') ?></td>
            <td class="tableTd">Name</td>
            <td class="tableTd">Email</td>
            <td class="tableTd"><?php echo mb_convert_encoding("Tél",'utf-16','utf-8') ?></td>
            <td class="tableTd"><?php echo mb_convert_encoding("Code réservation Binga",'utf-16','utf-8') ?></td>
            <td class="tableTd">Amount</td>
            <td class="tableTd">Status</td>
            <td class="tableTd">Creation Date</td>
            <td class="tableTd">Payment Date</td>
            <td class="tableTd">Estimated Payment Date</td>
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
	$paidDate ='';
	$esPaidDate ='';
  foreach($data as $row):
	$status = $row['Payment']['status'];
	  if($row['Payment']['valid'] && $row['Payment']['status'] == 'PAID'){
		$status = 'ISSUED';
	  }
	 
	  if($row['Payment']['paidDate']){
		$paidDate = strftime("%A", strtotime($row['Payment']['paidDate']))." ".date("d-m-Y H:i",strtotime($row['Payment']['paidDate']));
		$k = strftime("%A", strtotime($row['Payment']['paidDate']));
		$esPaidDate = strftime("%A", strtotime($row['Payment']['paidDate']. " +".$days[$k]." days"))." ".date("d-m-Y", strtotime($row['Payment']['paidDate']. " +".$days[$k]." days"));
	  }
	$nom = explode("Carte(s) de fidélité :", $row['Payment']['nom']);
	$phone = str_replace('téléphoneportable:',' / ',str_replace('Téléphoneportable:',' / ',str_replace('<','',str_replace('*Votrenumérodecartedefidélitéaétéenregistré.','',$row['Payment']['buyerPhone']))));
   echo '<tr>';
   echo '<td class="tableTdContent">'.$row['Payment']['idpayments'].'</td>';
   echo '<td class="tableTdContent">'.$row['Payment']['pnr'].'</td>';
   echo '<td class="tableTdContent">'.mb_convert_encoding($nom[0],'utf-16','utf-8').'</td>';
   echo '<td class="tableTdContent">'.mb_convert_encoding($row['Payment']['buyerEmail'],'utf-16','utf-8').'</td>';
   echo '<td class="tableTdContent">&nbsp;'.$phone.'</td>';
   echo '<td class="tableTdContent">&nbsp;'.$row['Payment']['id_transaction'].'</td>';
   echo '<td class="tableTdContent">'.str_replace('.',',',$row['Payment']['montant']).'</td>';
   echo '<td class="tableTdContent">'.$status.'</td>';
   echo '<td class="tableTdContent">'.date("d-m-Y H:i",strtotime($row['Payment']['created'])).'</td>';
   echo '<td class="tableTdContent">'.$paidDate.'</td>';
   echo '<td class="tableTdContent">'.$esPaidDate.'</td>';
   echo '</tr>';
   endforeach;
  ?>
</table>