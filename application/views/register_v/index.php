<?php $this->load->view("includes/head") ?>

    <!-- Login Register area Start-->
    <div class="login-content">
        <!-- Register -->
        <div class="nk-block toggled down" id="l-register">
            <div class="login-title container mg-tb-40 ">
                <h1 class="font-1">WORDTEST</h1>
                <small class="font-2">İstediğiniz dili öğrenmek artık çok daha kolay! Hem de her yerde, istediğiniz şekilde!</small>
            </div>
            <div class="nk-form">
                <div>
                    <h1 class="text-teal font-2">KAYDOL</h1>
                </div>
                <form action="<?php echo base_url("register/register") ?>" method="post">
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-app"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" required value="<?php echo (isset($username)) ? $username : "" ?>" name="username" placeholder="Kullanıcı Adı">
                        </div>
                    </div>

                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" required value="<?php echo (isset($name)) ? $name : "" ?>" name="name" placeholder="İsim">
                        </div>
                    </div>

                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" required name="surname" value="<?php echo (isset($surname)) ? $surname : "" ?>" placeholder="Soyisim">
                        </div>
                    </div>

                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" required name="email" placeholder="Email Adresi" value="<?php echo (isset($email)) ? $email : "" ?>" >
                        </div>
                    </div>



                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <input type="password" class="form-control" name="password" placeholder="Parola">
                        </div>
                    </div>

                    <button type="submit" href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></button>
                </form>
            </div>

            <div class="nk-navigation rg-ic-stl">
                <a href="<?php echo base_url("login") ?>" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Giriş Yap</span></a>
                <a href="<?php echo base_url("forget") ?>" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Parolamı Unuttum</span></a>
            </div>
        </div>
    </div>
    <!-- Login Register area End-->
<?php $this->load->view("includes/footer") ?>