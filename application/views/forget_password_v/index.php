<?php $this->load->view("includes/head") ?>
    <!-- Login Register area Start-->
    <div class="login-content">
        <div class="nk-block toggled" id="l-forget-password">
            <div class="nk-form">
                <h1 class="font-2">Şifremi Unuttum</h1>
                <p class="text-center">Sistemde Kayıtlı E-mail adresinizi giriniz.</p>
                <form action="<?php echo base_url("forget/send_mail") ?>" method="post">
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                        <div class="nk-int-st">
                            <input type="email" required class="form-control" name="email" placeholder="example@example.com">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></button>
                </form>
            </div>

            <div class="nk-navigation nk-lg-ic rg-ic-stl">
                <a href="<?php echo base_url("login") ?>" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Giriş Yap</span></a>
                <a href="<?php echo base_url("register") ?>" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Kaydol</span></a>
            </div>
        </div>
    </div>
    <!-- Login Register area End-->
<?php $this->load->view("includes/footer") ?>