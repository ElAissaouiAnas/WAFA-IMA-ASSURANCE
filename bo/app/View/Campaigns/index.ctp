<?php echo $this->Html->css('bootstrap-default.min'); ?>
<?php echo $this->Html->script('lib/bootstrap.min'); ?>
<?php echo $this->Html->script('lib/bootstrap-multiselect'); ?>
<div id="nowDealsContainer" class="pageContentContainer clearfix">
    <div class="leftNav">
		
    </div>
    <div class="rightNavContent" id="nowDealsRightNavContent1">
        <div class="grid_24">
            <h2 class="pageTitle left">  <label id="ndPageTitle"> </label> <span> Campaigns</span> </h2>
            <?php //echo $this->Html->link('<span>+</span> Nouveau', array('controller' => 'newsletters', 'action' => 'add'), array('escape' => false, 'class' => 'right button gray newDeal radioStyle blueText')) ?>
           
        </div>
        <div id="listeDiv">
            <div id="nowDealsSummary">
                <div id="nowSalesAndEarnings">
                    <div class="grid_24">
                        <table class="dealList" style="width: 875px;">
                            <thead>
                                <tr class="header">
                                    <th width="5%">ID</th>
                                    <th width="45%">Email name</th>
                                    <th >Status</th>
                                    <th width="20%">Date</th>
                                    <th width="2%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($campaigns)) {
								rsort($campaigns);
                                    foreach ($campaigns as $key => $campaign) {
                                        ?>
                                        <tr class="page_all page_<?php echo intval(ceil($key/10)) ?>">
                                            <td><?php echo $this->Html->link($campaign['id'], array('controller' => 'campaigns', 'action' => 'edit', $campaign['id'])) ?></td>
                                            <td><?php echo $this->Html->link($campaign['name'], array('controller' => 'campaigns', 'action' => 'edit', $campaign['id'])) ?></td>
                                            <td><?php echo $campaign['status'] ?></td>
                                            <td><?php echo date('d F Y - H:i:s',strtotime($campaign['modified_date']))  ?></td>
                                            <td>
											<a data-id="previewMail" newsletter-id="<?php echo $campaign['id'] ?>" data-href="campaigns/view/<?php echo $campaign['id'] ?>" data-action="/newsletter/campaigns/sendtest" class="loadPopup button orange medium_rare smallSend" style="width:80px">Preview</a>
											<br>
											<?php if($campaign['status']=='DRAFT'){ ?>
											<a data-id="sendMail" newsletter-id="<?php echo $campaign['id'] ?>" class="loadPopup2 button green medium_rare smallSend" style="width:80px">Envoyer</a>
											<?php
											}
											//echo $this->Html->link('Envoyer', array('controller' => 'newsletters', 'action' => 'sendcampaign', $newsletter['id']),array('escape' => false,'class' => 'remove button green medium_rare smallSend','style' =>'width:80px;color:#fff')) ?></td>

                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="4">Aucun newsletter ajoutée</td></tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                        <div id="pagination" class="paginations" style="margin-top:8px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
		var nb = <?php echo count($campaigns) ?>;
</script>
