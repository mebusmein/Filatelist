<div style="background-image: url('<?= base_url('assets/img/home-bg.png')?>');">
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="<?=site_url('auth')?>" class="active" id="login-form-link">Inloggen</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="<?=site_url('auth/registrer')?>" id="register-form-link">Registeren</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if( isset( $login_error_mesg ) )
                            {
                            echo '
                            <div style="border:1px solid red;">
                                <p>
                                    Login Error #' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') . ': Invalid Username, Email Address, or Password.
                                </p>
                                <p>
                                    Username, email address and password are all case sensitive.
                                </p>
                            </div>
                            ';
                            }

                            if( $this->input->get('logout') )
                            {
                            echo '
                            <div style="border:1px solid green">
                                <p>
                                    You have successfully logged out.
                                </p>
                            </div>
                            ';
                            }
                            echo form_open( $login_url, ['id' => 'login-form'] );
                            ?>
                            <form id="login-form" action="" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="login_string" id="username" tabindex="1" class="form-control" placeholder="Gebruikersnaam" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="login_pass" id="password" tabindex="2" class="form-control" placeholder="Wachtwoord">
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember_me" id="remember">
                                    <label for="remember" style="color: #315AB6;"> Onthouden </label>
                                </div>
                                <?php $user = User::find($this->auth_user_id); echo $user ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Login">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="" tabindex="5" class="forgot-password">Wachtwoord vergeten?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form id="register-form" action="<?=site_url('auth/registerPost')?>" method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="register-username" tabindex="1" class="form-control" placeholder="Gebruikersnaam" value="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="register-email" tabindex="1" class="form-control" placeholder="Email" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="register-password" tabindex="2" class="form-control" placeholder="Wachtwoord">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" tabindex="2" class="form-control" placeholder="Bevestig wachtwoord">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Registreer nu">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
