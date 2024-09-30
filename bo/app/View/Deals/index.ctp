<div id="nowDealsContainer" class="pageContentContainer clearfix">
    <div class="leftNav">
		<?php echo $this->Html->link('Template1', array('controller' => 'deals', 'action' => 'index'),array('class' => 'selected')) ?>
		<?php echo $this->Html->link('Template2', array('controller' => 'offres', 'action' => 'index'),array('class' => '')) ?>
    </div>
    <div class="rightNavContent" id="nowDealsRightNavContent1">
        <div class="grid_24">
            <h2 class="pageTitle left">  <label id="ndPageTitle"> </label> <span> Liste des offres</span> </h2>
            <?php echo $this->Html->link('<span>+</span> Nouveau', array('controller' => 'deals', 'action' => 'add'), array('escape' => false, 'class' => 'right button gray newDeal radioStyle blueText')) ?>
           
        </div>
        <div id="listeDiv">
            <div id="nowDealsSummary">
                <div id="nowSalesAndEarnings">
                    <div class="grid_24">
                        <table class="dealList" style="width: 875px;">
                            <thead>
                                <tr>
                                    <th>Compagnie Aerienne</th>
                                    <th>Départ</th>
                                    <th width="40%">Retour</th>
                                    <th>Date création</th>
                                    <th width="2%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($deals)) {
                                    foreach ($deals as $deal) {
                                        ?>
                                        <tr>
                                            <td><?php echo $this->Html->link( $this->Html->image($deal['Deal']['logoCompAir'] ? 'deals/'.$deal['Deal']['logoCompAir'] : 'http://www.placehold.it/80x80/EFEFEF/AAAAAA', array('alt' => 'CakePHP','style' => 'width:80px')), array('controller' => 'deals', 'action' => 'edit', $deal['Deal']['id']),array('escape' => false)) ?></td>
                                            <td><?php echo $deal['Deal']['depart'] ?></td>
                                            <td>
                                                <?php if ($deal['Deal']['arriver1']) { ?>
                                                    <div style="text-align: left;padding: 1px;font-size: 11px; font-family:Arial,Sindbad,Kalimati,Verdana,sans-serif;color:#333333;text-decoration:none;">
                                                        <span style="font-size:13px;font-weight:bold;"><?php echo $deal['Deal']['arriver1'] ?>: <?php echo $deal['Deal']['prixArriver1'] ?> </span> (<?php echo $deal['Deal']['descArriver1'] ?>)
                                                    </div>
                                                <?php } ?>
                                                <?php if ($deal['Deal']['arriver2']) { ?>
                                                    <div style="text-align: left;padding: 1px;font-size: 11px; font-family:Arial,Sindbad,Kalimati,Verdana,sans-serif;color:#333333;text-decoration:none;">
                                                        <span style="font-size:13px;font-weight:bold;"><?php echo $deal['Deal']['arriver2'] ?>: <?php echo $deal['Deal']['prixArriver2'] ?> </span> (<?php echo $deal['Deal']['descArriver2'] ?>)
                                                    </div>
                                                <?php } ?><?php if ($deal['Deal']['arriver3']) { ?>
                                                    <div style="text-align: left;padding: 1px;font-size: 11px; font-family:Arial,Sindbad,Kalimati,Verdana,sans-serif;color:#333333;text-decoration:none;">
                                                        <span style="font-size:13px;font-weight:bold;"><?php echo $deal['Deal']['arriver3'] ?>: <?php echo $deal['Deal']['prixArriver3'] ?> </span> (<?php echo $deal['Deal']['descArriver3'] ?>)
                                                    </div>
                                                <?php } ?>

                                            </td>
                                            <td><?php echo $deal['Deal']['created'] ?></td>
                                            <td><?php echo $this->Html->link('Modifier', array('controller' => 'deals', 'action' => 'edit', $deal['Deal']['id']),array('escape' => false,'class' => 'button green medium_rare smallSend','style' =>'width:80px')) ?><br><?php echo $this->Html->link('Supprimer', array('controller' => 'deals', 'action' => 'delete', $deal['Deal']['id']),array('escape' => false,'class' => 'remove button red medium_rare smallSend','style' =>'width:80px;color:#fff')) ?></td>

                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="4">Aucun deal ajouté</td></tr>';
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

