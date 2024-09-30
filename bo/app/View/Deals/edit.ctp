<?php echo $this->Html->css('bootstrap-default.min'); ?>
<?php echo $this->Html->css('bootstrap-fileupload.min'); ?>
<?php echo $this->Html->script('lib/bootstrap.min'); ?>
<?php echo $this->Html->script('lib/bootstrap-fileupload'); ?>
<?php 
					if(!empty($this->request->data['Deal']['arriver3'])){
						$nbr_dest = "3";
					}
					elseif(!empty($this->request->data['Deal']['arriver2'])){
						$nbr_dest = "2";
					}else{
						$nbr_dest = "1";
						}
					?>
<div id="tabs" class="pageContentContainer clearfix">
    <div class="leftNav">
        <a class="selected " id="menuStep1" >Template1</a>
		<a class=" " id="menuStep2" >Template2</a>
    </div>
    <div class="rightNavContent">
        <div id="step1" class="">


            <div id="spectacleInfoData" style="min-height: 250px;">

                <h2 class="pageTitle"><span> Modifier un offre</span></h2>
                <div>
                    <?php
                    echo $this->Form->create
                            (
                            'Deal', array
                        (
                        'class' => 'SpectacleForm',
                        'inputDefaults' => array
                            (
                            'label' => false,
                            'error' => false
                        ),
                'type' => 'file'
                            )
                    );
                    ?>
                    <table style="width:100%">
                        <tbody>
                            <tr>
                                <td>
                                    <label class="td1">Nom :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('name');
                                    ?>
                                </td>
                            </tr>
							<tr>
                                <td>
                                    <label class="td1">Compagnie Aerienne :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('compAir');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="td1">Logo Compagnie Aerienne :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    //echo $this->Form->input('logoCompAir');
                                    ?>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 80px; height: 80px;"><?php echo $this->Html->image($this->request->data['Deal']['logoCompAir'] ? 'deals/'.$this->request->data['Deal']['logoCompAir'] : 'http://www.placehold.it/80x80/EFEFEF/AAAAAA', array('alt' => '','style' => 'width:80px'))?></div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 80px; height: 80px;"></div>
                                        <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="data[Deal][logoCompAir]" /></span>
                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                      </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="td1">Départ :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('depart');
                                    ?>
                                </td>
                            </tr>
							<tr>
								<td colspan="4">
								<hr/>
								</td>
							</tr>
                            <tr>
                                <td>
                                    <label class="td1">Destination :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('arriver1');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="td1">Prix :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('prixArriver1');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="td1">Description :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('descArriver1');
                                    ?>
                                </td>
                            </tr>
							<tr >
                                <td>
                                    <label class="td1">Url :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('url1');
                                    ?>
                                </td>
                            </tr>
							<tr class="arr2" <?php if(empty($this->request->data['Deal']['arriver2'])){ echo 'style="display:none"';}?>>
								<td colspan="4">
								<hr/>
								</td>
							</tr>
                            <tr class="arr2" <?php if(empty($this->request->data['Deal']['arriver2'])){ echo 'style="display:none"';}?>>
                                <td>
                                    <label class="td1">Destination :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('arriver2');
                                    ?>
                                </td>
                            </tr>
                            <tr class="arr2" <?php if(empty($this->request->data['Deal']['arriver2'])){ echo 'style="display:none"';}?>>
                                <td>
                                    <label class="td1">Prix :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('prixArriver2');
                                    ?>
                                </td>
                            </tr>
                            <tr class="arr2" <?php if(empty($this->request->data['Deal']['arriver2'])){ echo 'style="display:none"';}?>>
                                <td>
                                    <label class="td1">Description :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('descArriver2');
                                    ?>
                                </td>
                            </tr>
							<tr class="arr2" <?php if(empty($this->request->data['Deal']['arriver2'])){ echo 'style="display:none"';}?>>
                                <td>
                                    <label class="td1">Url :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('url2');
                                    ?>
                                </td>
                            </tr>
							<tr class="arr3" <?php if(empty($this->request->data['Deal']['arriver3'])){ echo 'style="display:none"';}?>>
								<td colspan="4">
								<hr/>
								</td>
							</tr>
                            <tr class="arr3" <?php if(empty($this->request->data['Deal']['arriver3'])){ echo 'style="display:none"';}?>>
                                <td>
                                    <label class="td1">Destination :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('arriver3');
                                    ?>
                                </td>
                            </tr>
                            <tr class="arr3" <?php if(empty($this->request->data['Deal']['arriver3'])){ echo 'style="display:none"';}?>>
                                <td>
                                    <label class="td1">Prix :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('prixArriver3');
                                    ?>
                                </td>
                            </tr>
                            <tr class="arr3" <?php if(empty($this->request->data['Deal']['arriver3'])){ echo 'style="display:none"';}?>>
                                <td>
                                    <label class="td1">Description :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('descArriver3');
                                    ?>
                                </td>
                            </tr>
							<tr class="arr3" <?php if(empty($this->request->data['Deal']['arriver3'])){ echo 'style="display:none"';}?>>
                                <td>
                                    <label class="td1">Url :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('url3');
                                    ?>
                                </td>
                            </tr>

                            <tr>
								<td colspan="2">         
                                    <div class="clearfix" id="" style="text-align: center;margin-top: 10px;">
                                        <input type="button" value="Add destination" id="add_dst" class="button green medium_rare smallSend" style="color:#FFFFFF" />
                                    </div>
                                </td>
                                <td colspan="2">         
                                    <div class="clearfix" id="loginBoxFooter" style="text-align: center;margin-top: 10px;">
                                        <input type="submit" value="Enregistrer" id="" class="button green medium_rare smallSend" style="color:#FFFFFF" />
                                    </div>
                                </td>
                            </tr>

                        </tbody></table>
                    </form>
					<input type="hidden" id="nbr_dest" value="<?php echo $nbr_dest ?>" />
                </div>
            </div>

        </div>
    </div>
</div>