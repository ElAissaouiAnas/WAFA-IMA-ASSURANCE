<div id="tabs" class="pageContentContainer clearfix">
    <div class="leftNav">
	
    </div>
    <div class="rightNavContent">
        <div id="step1" class="">


            <div id="spectacleInfoData" style="min-height: 250px;">

                <h2 class="pageTitle"><span> Edit Campaign</span></h2>
                <div>
                    <?php
                    echo $this->Form->create
                            (
                            'Newsletter', array
                        (
                        'inputDefaults' => array
                            (
                            'label' => false,
                            'error' => false
                        )
                            )
                    );
                    ?>
                    <table style="width:100%">
                        <tbody>
                            <tr>
                                <td>
                                    <label class="td1">Campaign name :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('name', array('value' => $campaigns['name']));
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="td1">Newsletter subject :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('subject', array('type' => 'textarea','class' => 'mceNoEditor','value' => $campaigns['subject']));
                                    ?>
                                </td>
                            </tr>
							<!--<tr>
                                <td>
                                    <label class="td1">Email from :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('from_email', array('value' => $campaigns['from_email']));
                                    ?>
                                </td>
                            </tr>-->
							<tr>
                                <td>
                                    <label class="td1">Name from :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('from_name', array('value' => $campaigns['from_name']));
                                    ?>
                                </td>
                            </tr>
							<!--<tr>
                                <td>
                                    <label class="td1">Replay to :</label>
                                </td>
                                <td colspan="3">
                                    <?php
                                    echo $this->Form->input('reply_to_email', array('value' => $campaigns['reply_to_email']));
                                    ?>
                                </td>
                            </tr>-->
                            <tr>
                                <td colspan="4">
								<div style="margin-top:5px">
                                    <?php
                                     $this->TinyMCE->editor(
                                             array(
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
												 'convert_urls' => false,
												 'editor_deselector' => "mceNoEditor",
												 'height ' => "900px",
                                                 )
                                             );
                                    echo $this->Form->input('body', array('value' => $campaigns['email_content']));
                                    ?>
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">         
                                    <div class="clearfix" id="loginBoxFooter" style="text-align: center;margin-top: 10px;">
                                        <input type="submit" value="Modifier" id="" class="button green medium_rare smallSend" style="color:#FFFFFF" />
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