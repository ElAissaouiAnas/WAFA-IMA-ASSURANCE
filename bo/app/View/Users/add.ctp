<div id="nowDealsContainer" class="pageContentContainer clearfix">
    <div class="leftNav">
        <?php echo $this->Html->link('Informations', array('controller' => 'users', 'action' => 'add'), array('class' => 'selected')) ?>
    </div>
    <div class="rightNavContent" id="nowDealsRightNavContent1">
        <div class="grid_24">
            <h2 class="pageTitle left">  <label id="ndPageTitle"><?php echo $current_user['User']['name'] ?></label> <span> Informations</span> </h2>
        </div>
        <div id="resumeDiv" >
            <div id="nowDealsSummary">
                <div id="nowSalesAndEarnings">
                    <div class="grid_24">
                        <div class="toShowAfterLoading" id="merchantInfoSaveTable" style="display: block;">
                            <?php
                            echo $this->Form->create
                                    (
                                    'User', array
                                (
                                
                                'class' => 'well',
                                'inputDefaults' => array
                                    (
                                    'label' => false,
                                    'error' => false
                                )
                                    )
                            );
                            ?>
                            <table style="width:100%">
                                <tbody><tr>
                                        <td>
                                            <label class="td1">Username:</label>
                                        </td>
                                        <td colspan="3">
                                            <?php
                                            echo $this->Form->input('username', array(
                                                'placeholder' => __('Username'),
                                                'style' => 'width:300px',
                                                'value' => !empty($user['User']['username']) ? $user['User']['username'] : ''
                                                    )
                                            );
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="td1">Password:</label>
                                        </td>
                                        <td colspan="3">
                                            <?php
                                            echo $this->Form->input('password', array(
                                                'placeholder' => __('password'),
                                                'style' => 'width:300px'
                                                    )
                                            );
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="td1">Email:</label>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('email', array(
                                                'placeholder' => __('email'),
                                                'style' => 'width:300px',
                                                'value' => !empty($user['User']['email']) ? $user['User']['email'] : ''
                                                    )
                                            );
                                            ?>
                                        </td>                    
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="td1">Website:</label>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('website', array(
                                                'placeholder' => __('website'),
                                                'style' => 'width:300px',
                                                'value' => !empty($user['User']['website']) ? $user['User']['website'] : ''
                                                    )
                                            );
                                            ?>
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="td1">Téléphone:</label>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('phone', array(
                                                'placeholder' => __('phone'),
                                                'style' => 'width:300px',
                                                'value' => !empty($user['User']['phone']) ? $user['User']['phone'] : ''
                                                    )
                                            );
                                            ?>
                                        </td>                    
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="td1">Adresse:</label>
                                        </td>
                                        <td colspan="3">
                                            <?php
                                            echo $this->Form->textarea('address'
                                                    , array('rows' => '5', 'cols' => '60','value' => !empty($user['User']['address']) ? $user['User']['address'] : '')
                                            );
                                            ?>
                                        </td>
                                    </tr>                
                                    <tr>
                                        <td>
                                            <label class="td1">Ville:</label>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('city', array(
                                                'placeholder' => __('city'),
                                                'style' => 'width:300px',
                                                'value' => !empty($user['User']['city']) ? $user['User']['city'] : ''
                                                    )
                                            );
                                            ?>
                                        </td>                   
                                    </tr>              

                                    <tr>
                                        <td colspan="4">         
                                            <div style="text-align: center;">
                                                <input type="submit" value="Save" class="button green medium_rare smallSend" />
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
    </div>
</div>

