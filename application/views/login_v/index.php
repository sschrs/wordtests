<?php $this->load->view("includes/head") ?>
    <!-- Login Register area Start-->
<div class="login-content">
    <div class="nk-block toggled" id="l-login">
        <div class="login-title container mg-tb-40 ">
            <h1 class="font-1">WORDTEST</h1>
            <small class="font-2">İstediğiniz dili öğrenmek artık çok daha kolay! Hem de her yerde, istediğiniz şekilde!</small>
        </div>
        <div class="nk-form">
            <div>
                <h1 class="text-teal font-2">GİRİŞ YAP</h1>
            </div>
            <form action="<?php echo base_url("login/login") ?>" method="post">
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" name="username" required placeholder="Kullanıcı Adı">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" name="password" required placeholder="Şifre">
                    </div>
                </div>
                <button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
            </form>
        </div>

        <div class="nk-navigation nk-lg-ic">
            <a href="<?php echo base_url("register") ?>" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Kayıt Ol</span></a>
            <a href="<?php echo base_url("forget") ?>" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Parolamı Unuttum</span></a>
        </div>
    </div>
</div>
<!-- Login Register area End-->
<?php $this->load->view("includes/footer") ?>