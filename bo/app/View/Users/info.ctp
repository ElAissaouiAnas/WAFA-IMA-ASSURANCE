<section class="content-header">
    <h1><?php echo $current_user['User']['name'] ?></h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Modification du Mot de passe</h3>
                </div>
                <?php
                echo $this->Form->create
                        (
                        'User', array
                    (
                    'url' => array
                        (
                        'controller' => 'users',
                        'action' => 'info'
                    ),
                    'class' => '',
                    'data-toggle'=>"validator",
                     'role'=>"form",
                    'inputDefaults' => array
                        (
                        'label' => false,
                        'error' => false
                    )
                        )
                );
                ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input type="email" class="form-control" name="data[User][username]" value="<?php echo !empty($user['User']['username']) ? $user['User']['username'] : '' ?>" placeholder="Enter email" readonly disabled />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="data[User][password]" value="" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>