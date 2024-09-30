<div id="nowDealsContainer" class="pageContentContainer clearfix">
    <div class="leftNav">
		<?php echo $this->Html->link('Template1', array('controller' => 'deals', 'action' => 'index'),array('class' => '')) ?>
		<?php echo $this->Html->link('Template2', array('controller' => 'offres', 'action' => 'index'),array('class' => 'selected')) ?>
    </div>
    <div class="rightNavContent" id="nowDealsRightNavContent1">
        <div class="grid_24">
            <h2 class="pageTitle left">  <label id="ndPageTitle"> </label> <span> Liste des offres</span> </h2>
            <?php echo $this->Html->link('<span>+</span> Nouveau', array('controller' => 'offres', 'action' => 'add'), array('escape' => false, 'class' => 'right button gray newDeal radioStyle blueText')) ?>
           
        </div>
        <div id="listeDiv">
            <div id="nowDealsSummary">
                <div id="nowSalesAndEarnings">
                    <div class="grid_24">
                        <table class="dealList" style="width: 875px;">
                            <thead>
                                <tr>
									<th width="5%">ID</th>
                                    <th>Titre</th>
                                    <th>Date création</th>
                                    <th width="2%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($offres)) {
                                    foreach ($offres as $offre) {
                                        ?>
                                        <tr>
											<td><?php echo $this->Html->link($offre['Offre']['id'], array('controller' => 'offres', 'action' => 'edit', $offre['Offre']['id'])) ?></td>
                                            <td><?php echo $offre['Offre']['titre'] ?></td>
                                            <td><?php echo $offre['Offre']['created'] ?></td>
                                            <td><?php echo $this->Html->link('Modifier', array('controller' => 'offres', 'action' => 'edit', $offre['Offre']['id']),array('escape' => false,'class' => 'button green medium_rare smallSend','style' =>'width:80px')) ?><br><?php echo $this->Html->link('Supprimer', array('controller' => 'offres', 'action' => 'delete', $offre['Offre']['id']),array('escape' => false,'class' => 'remove button red medium_rare smallSend','style' =>'width:80px;color:#fff')) ?></td>

                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="4">Aucun offre ajouté</td></tr>';
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

