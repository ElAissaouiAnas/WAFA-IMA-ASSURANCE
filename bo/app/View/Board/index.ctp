<meta http-equiv="refresh" content="60" >
<?php 
	echo $this->Html->css('bootstrap');
    echo $this->Html->css('datepicker');
?>
<div class="pageContentContainer clearfix">

    <!-- Content -->
    <div class="rightNavContent" style="margin-left: 0;padding-left: 0;width: 100%;">
		
		<div class="">
            <h2 class="pageTitle left">  <label id="ndPageTitle"> </label> <span> Payments Report</span> </h2>
           
        </div>

        <div id="listeDiv">
            <div id="nowDealsSummary">
                <div id="nowSalesAndEarnings">
				<div class="clearfix">
                <div class="grid_24" style="width:98%">
                    <div class="module ">
                        <div class="moduleHeader ">Rechercher :</div>
                        <div class="moduleContent">
                            <div class="nowDealCreationModal" style="height:auto">
                                <table style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td>
											<form id="report-form" method="get" action="<?php echo $this->Html->url(array("controller" => "board","action" => "index"));?>">
												<div class="" style="float: left;width: 56%;">
                                                    <div class="dollarInputContainer">
                                                        <div class="input-appen" >
															<input class="span2" size="16" type="text" name="q" value="<?php echo $q ?>" placeholder="Recherche par PNR, Nom ou Email" style="width: 95%;height: 18px;">
														  </div>
                                                    </div>
                                                </div>
												<div class="" style="float: left;padding-left:20px">
                                                    <div class="dollarInputContainer">
                                                        <div class="input-appen" >
															<select name="status" onChange="javascript:submit();">
																<option value="">All</option>
																<option value="PENDING" <?php echo $status =='PENDING' ? 'selected' : '' ?>>PENDING</option>
																<option value="PAID" <?php echo $status =='PAID' ? 'selected' : '' ?>>PAID</option>
																<option value="ISSUED" <?php echo $status =='ISSUED' ? 'selected' : '' ?>>ISSUED</option>
																<option value="CANCELLED" <?php echo $status=='CANCELLED' ? 'selected' : '' ?>>CANCELLED</option>
																<option value="EXPIRED" <?php echo $status =='EXPIRED' ? 'selected' : '' ?>>EXPIRED</option>
															</select>
														</div>
                                                    </div>
                                                </div>
												<div style="text-align:right;width: 21%;float: right;" class="half inputBox verifyButton">
													 <div class="dollarInputContainer">
													<input type="button" value="Rechercher"  class="button green btn_submit" data-action="<?php echo $this->Html->url("/board");?>" style="width: 110px;">
													<input type="button" value="Exporter"  class="button green loadPopup" style="width: 110px;">
													</div>
												</div>
												</form>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                    <div class="">
					<?php if (count($payments)) {?>
                        <table class="dealList " style="width: 98%;">
                            <thead>
                                <tr class="header">
                                    <th><?php echo $this->Paginator->sort('idpayments','ID'); ?></th>
                                    <th><?php echo $this->Paginator->sort('pnr','N° PNR'); ?></th>
                                    <th><?php echo $this->Paginator->sort('nom','Nom'); ?></th>
                                    <th><?php echo $this->Paginator->sort('buyerEmail','Email'); ?></th>
                                    <th><?php echo $this->Paginator->sort('buyerPhone','Tél'); ?></th>
                                    <th><?php echo $this->Paginator->sort('id_transaction','Code Binga'); ?></th>
                                    <th><?php echo $this->Paginator->sort('montant','Montant'); ?></th>
                                    <th><?php echo $this->Paginator->sort('status','Statut'); ?></th>
                                    <th><?php echo $this->Paginator->sort('confirmed','Réception des fonds'); ?></th>
                                    <th><?php echo $this->Paginator->sort('created','Date de création'); ?></th>
									<!--<th>Reservation Date</th>-->
									<th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // if (count($payments)) {
								// debug($payments);
                                    foreach ($payments as $key => $v) {
									if( $v['Payment']['status'] !='DELETED' /*&& $v['Payment']['status'] !='PRE-PAY'*/){
									// echo $v['Payment']['pnr']
                                        ?>
                                        <tr class="" style="<?php 
										if($v['Payment']['valid'] && $v['Payment']['status'] =='PAID' && $v['Payment']['confirmed'] =='Y'){
											echo 'background-color: rgb(174, 255, 174);';
										}elseif(!$v['Payment']['valid'] && $v['Payment']['status'] =='PAID' && $v['Payment']['confirmed'] =='Y'){
											echo 'background-color: rgb(255, 255, 163)';
										}elseif(!$v['Payment']['valid'] && $v['Payment']['status'] =='PAID' && $v['Payment']['confirmed'] !='Y'){
											echo 'background-color: rgb(255, 192, 98)';
										}elseif($v['Payment']['valid'] && $v['Payment']['status'] =='PAID' && $v['Payment']['confirmed'] !='Y'){
											echo 'background-color: rgb(174, 226, 255)';
										}
										?>">
											<td><?php echo $v['Payment']['idpayments'] ?></td>
											<td><?php echo $this->Html->link($v['Payment']['pnr'],array('controller' => 'board', 'action' => 'view', $v['Payment']['idpayments']), array( 'target' => '_blank')); ?></td>
											<td><?php 
											
											$nom = explode("Carte(s) de fidélité :", $v['Payment']['nom']);
											echo $nom[0];

											?></td>
											<td><?php echo $v['Payment']['buyerEmail'] ?></td>
											<td style="max-width:180px;max-width:180px;text-overflow: ellipsis;overflow: hidden;" title="<?php echo str_replace('-','/',str_replace('téléphoneportable:','/',str_replace('Téléphoneportable:','/',str_replace('<','',str_replace('*Votrenumérodecartedefidélitéaétéenregistré.','',$v['Payment']['buyerPhone']))))) ?>"><?php echo str_replace('-','<br>',str_replace('téléphoneportable:','<br>',str_replace('Téléphoneportable:','<br>',str_replace('<','',str_replace('*Votrenumérodecartedefidélitéaétéenregistré.','',$v['Payment']['buyerPhone']))))) ?></td>
											<td><?php echo $v['Payment']['id_transaction'] ?></td>
                                            <td><?php echo $v['Payment']['montant'] ?></td>
											<td><?php 
												if(!$v['Payment']['cancel'] && $v['Payment']['valid'] && $v['Payment']['status']== 'PAID'){
													echo 'ISSUED';
												}elseif($v['Payment']['cancel'] && $v['Payment']['valid'] && $v['Payment']['status']== 'PAID'){
													echo 'CANCELLED';
												}elseif($v['Payment']['expirationDate'] < date('Y-m-d H:i:s')){
													echo '<b style="color:red">EXPIRED</b>';
												}else{
													echo $v['Payment']['status'];
												}
												if($v['Payment']['status'] != 'PENDING'){
													echo '<br><span style="font-size:75%">'.date("d-m-Y H:i",strtotime($v['Payment']['paidDate'])).'</span>';
												}
											?></td>
											<td><?php echo $v['Payment']['confirmed'] =='Y' ? 'Oui' : 'Non' ?></td>
											<!--<td><?php echo $v['Payment']['expirationDate'] ?></td>-->
											<td><?php 
											if($v['Payment']['created'] < date('2014-10-27')){
												echo date("d-m-Y H:i",strtotime($v['Payment']['created'])+3600) ;
											}else{
												echo date("d-m-Y H:i",strtotime($v['Payment']['created'])) ;
											}
											
											?></td>
											<!--<td><?php echo $v['Payment']['updated']  ?></td>-->
											<td><span style="display: block;width: 148px;"><?php
											if($v['Payment']['status'] == 'PAID' && !$v['Payment']['valid']){
												// echo $this->Html->link('Valider',array('controller' => 'board', 'action' => 'valid', $v['Payment']['idpayments']));
												echo '<a href="/board/valid/'.$v['Payment']['idpayments'].'"  class="button green medium_rare smallSend">Valider</a>';
											}elseif($v['Payment']['valid'] && $v['Payment']['status'] =='PAID'){
												echo '<img src="/img/button_ok.png" style="width: 20px;"><br> Validé Par: <b title="'.$v['User']['email'].'">'.$v['User']['name'].'</b><br><span style="font-size: 12px;">';
												if($v['Payment']['confirmedDate'] < date('2014-10-27')){
													echo date("d-m-Y H:i",strtotime($v['Payment']['confirmedDate'])+3600) ;
												}else{
													echo date("d-m-Y H:i",strtotime($v['Payment']['confirmedDate'])) ;
												}
												echo '</span>';
												if($v['Payment']['confirmed'] != 'Y' && !$v['Payment']['cancel'] && (strtotime($v['Payment']['paidDate'])+3600 <= time()) ){
													echo '<br><br><a href="/board/cancel/'.$v['Payment']['idpayments'].'"  class="button red medium_rare smallSend" style="color: #fff;">Annuler</a>';
												}elseif($v['Payment']['confirmed'] != 'Y' && $v['Payment']['cancel']){
													echo '<hr><img src="/img/button_ko.png" style="width: 20px;"><br> Annulé Par: <b title="'.$v['Cuser']['email'].'">'.$v['Cuser']['name'].'</b><br><span style="font-size: 12px;">';
													if($v['Payment']['cancelledDate'] < date('2014-10-27')){
														echo date("d-m-Y H:i",strtotime($v['Payment']['cancelledDate'])+3600) ;
													}else{
														echo date("d-m-Y H:i",strtotime($v['Payment']['cancelledDate'])) ;
													}
													echo'</span>';
												}
											}
											?></span></td>
                                        </tr>
                                        <?php
										}
                                    }
                                // } else {
                                    // echo '<tr><td colspan="11" width="100%">Aucun paiement trouvé</td></tr>';
                                // }
                                ?>

                            </tbody>
                        </table>
						<?php 
						} else {
                                    echo '<p style="font-weight: bold;padding-left: 22px;">Aucun paiement trouvé</p>';
                                }
						?>
						<div class="pagination pagination-right">  
							<ul>  
								<?php     
									echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a' ) );   
								?>  
							</ul>  
						</div>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
	$(".btn_submit").click(function() {
	  var action = $(this).attr('data-action');
	  $("#report-form").attr("action",  action);
	  $("#report-form").submit();
	});
		
	setTimeout(function(){$(".alert").hide();}, 3000);
	
	$(".loadPopup").click(function(){
        $("#popup").show();
    });
    $(".close").click(function(){
        $(".popup").hide();
    }) ;
});

</script>
<script type="text/javascript">

		jQuery(document).ready(function() {
			var checkin = $('#from').datepicker({
			  format: 'yyyy-mm-dd',
			  // onRender: function(date) {
				// return date.valueOf() < now.valueOf() ? 'disabled' : '';
			  // }
			}).on('changeDate', function(ev) {
			  if (ev.date.valueOf() > checkout.date.valueOf()) {
				var newDate = new Date(ev.date)
				newDate.setDate(newDate.getDate() + 1);
				checkout.setValue(newDate);
			  }
			  checkin.hide();
			  $('#to')[0].focus();
			}).data('datepicker');
			var checkout = $('#to').datepicker({
			  format: 'yyyy-mm-dd',
			  onRender: function(date) {
				// console.log(checkin.date.valueOf());
				return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			  }
			}).on('changeDate', function(ev) {
			  checkout.hide();
			}).data('datepicker');
		});
		</script>
    