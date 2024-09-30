<?php echo $this->Html->css('bootstrap-default.min'); ?>
<?php echo $this->Html->css('bootstrap-fileupload.min'); ?>
<?php echo $this->Html->script('lib/bootstrap.min'); ?>
<?php echo $this->Html->script('lib/bootstrap-fileupload'); ?>
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
                            'Offre', array
                        (
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
                                    <label class="td1">Titre :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('titre');
                                    ?>
                                </td>
                            </tr>
							<tr>
                                <td>
                                    <label class="td1">Description :</label>
                                </td>
                                <td colspan="3">
								<div style="margin-top:5px;">
                                    <?php
									$this->TinyMCE->editor(
                                             array(
												 'height' => '250px',
												 'width' => '300px',
                                                 'theme' => 'advanced',
                                                 'mode' => 'textareas',
                                                 'plugins' => "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
                                                 'theme_advanced_buttons1' => "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                                                 'theme_advanced_buttons2' => "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                                                 'theme_advanced_buttons3' => "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                                                 'theme_advanced_buttons4' => "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
                                                 'theme_advanced_toolbar_location' => "top",
                                                 'theme_advanced_toolbar_align' => "left",
                                                 'theme_advanced_statusbar_location' => "bottom",
                                                 'theme_advanced_resizing' => 'true',
                                                 'skin' => "o2k7",
                                                 'skin_variant' => "silver",
												 'convert_urls' => false
                                                 )
                                             );
                                    echo $this->Form->input('description');
                                    ?>
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="td1">Image :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    //echo $this->Form->input('logoCompAir');
                                    ?>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 80px; height: 80px;"><?php echo $this->Html->image($this->request->data['Offre']['image'] ? 'offres/'.$this->request->data['Offre']['image'] : 'http://www.placehold.it/80x80/EFEFEF/AAAAAA', array('alt' => '','style' => 'width:80px'))?></div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 80px; height: 80px;"></div>
                                        <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="data[Offre][image]" /></span>
                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                      </div>
                                </td>
                            </tr>
							<tr>
                                <td>
                                    <label class="td1">Valable :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('valable');
                                    ?>
                                </td>
                            </tr>
							<tr>
                                <td>
                                    <label class="td1">Url :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('url');
                                    ?>
                                </td>
                            </tr>
                            <tr>
								<td colspan="2">         
                                    <div class="clearfix" id="" style="text-align: center;margin-top: 10px;">
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
                </div>
            </div>

        </div>
    </div>
</div>