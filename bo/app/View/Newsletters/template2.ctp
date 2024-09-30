<?php echo $this->Html->css('bootstrap-default.min'); ?>
<?php echo $this->Html->script('lib/bootstrap.min'); ?>
<?php echo $this->Html->script('lib/bootstrap-multiselect'); ?>
<?php echo $this->Html->script('lib/bootstrap-datetimepicker.min'); ?>
<div id="nowDealsContainer" class="pageContentContainer clearfix">
    <div class="leftNav">
	<?php echo $this->Html->link('Template1', array('controller' => 'newsletters', 'action' => 'index'),array('class' => '')) ?>
	<?php echo $this->Html->link('Template2', array('controller' => 'newsletters', 'action' => 'template2'),array('class' => 'selected')) ?>
	<?php echo $this->Html->link('Template3', array('controller' => 'newsletters', 'action' => 'template3'),array('class' => '')) ?>
		
    </div>
    <div class="rightNavContent" id="nowDealsRightNavContent1">
        <div class="grid_24">
            <h2 class="pageTitle left">  <label id="ndPageTitle"> </label> <span> Newsletters</span> </h2>
            <?php echo $this->Html->link('<span>+</span> Nouveau', array('controller' => 'newsletters', 'action' => 'add2'), array('escape' => false, 'class' => 'right button gray newDeal radioStyle blueText')) ?>
           
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
                                    <th>Date création</th>
                                    <th width="2%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($newsletters)) {
                                    foreach ($newsletters as $newsletter) {
                                        ?>
                                        <tr>
                                            <td><?php echo $this->Html->link($newsletter['Newsletter']['id'], array('controller' => 'newsletters', 'action' => 'edit2', $newsletter['Newsletter']['id'])) ?></td>
                                            <td><?php echo $this->Html->link($newsletter['Newsletter']['name'], array('controller' => 'newsletters', 'action' => 'edit2', $newsletter['Newsletter']['id'])) ?></td>
                                            <td><?php echo $newsletter['Newsletter']['created'] ?></td>
                                            <td>
											<a data-id="previewMail" newsletter-id="<?php echo $newsletter['Newsletter']['id'] ?>" data-href="newsletters/view/<?php echo $newsletter['Newsletter']['id'] ?>" class="loadPopup button orange medium_rare smallSend" style="width:80px">Preview</a>
											<br>
											<a data-id="sendMail" newsletter-id="<?php echo $newsletter['Newsletter']['id'] ?>" class="loadPopup2 button green medium_rare smallSend" style="width:80px">Envoyer</a>
											<?php //echo $this->Html->link('Envoyer', array('controller' => 'newsletters', 'action' => 'sendcampaign', $newsletter['Newsletter']['id']),array('escape' => false,'class' => 'remove button green medium_rare smallSend','style' =>'width:80px;color:#fff')) ?></td>

                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="4">Aucun newsletter ajoutée</td></tr>';
                                }
                                ?>

                            </tbody>
                        </table>

                        <?php
                        echo $this->Paginator->numbers(array(
                            'before' => '<div class="pagination"><ul>',
                            'separator' => '',
                            'currentClass' => 'active',
                            'tag' => 'li',
                            'after' => '</ul></div>'
                        ));
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
