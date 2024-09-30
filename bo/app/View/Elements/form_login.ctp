<div id="loginHolder">
    <div style="padding-top:80px;padding-bottom: 10px;">
		<?php echo $this->Html->image('tls.jpg', array('width' => '220','height' => '', 'id' => 'logoimg' )); ?>

    </div>
    <div style="top: 50px;" id="loginContent">
        <div id="loginShakerContainer">

            <div id="loginFadingContainer" style="display: block">
                <div id="loginBox">
                    <?php echo $this->Session->flash(); ?>
                    <?php
                    echo $this->Form->create
                            (
                            'User', array
                        (
                        'url' => array
                            (
                            'controller' => 'users',
                            'action' => 'login'
                        ),
                        'inputDefaults' => array
                            (
                            'label' => false,
                            'error' => true
                        )
                            )
                    );


                    echo $this->Form->input('username', array('placeholder' => __('Username'), 'class' => '', 'label' => 'Login:'));
                    echo $this->Form->input('password', array('placeholder' => __('Password'), 'type' => 'password', 'label' => 'Mot de passe:'));
                    ?> 
                </div>
                <div class="clearfix" id="loginBoxFooter" style="text-align: center;"> 
                    <button class="button left green" id="loginButton_" type="submit"> Se connecter </button>
                    <!-- <div id="loginProcessingDiv" style="display:block">
                        <div class="loadingSpinner" id="loginSpinner">
                            <?php //echo $this->Html->image('Loadingspinnerdotless.png', array('alt' => 'Loadingspinnerdotless', 'class' => 'circle')); ?>
                            <?php echo $this->Html->image('loadingSpinnerDot.gif', array('alt' => 'Loadingspinnerdot', 'class' => 'dot')); ?>
                        </div>
                        <span class="left" id="loginText"> ... patientez </span> </div> -->
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>