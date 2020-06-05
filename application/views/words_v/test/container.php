<div class="form-example-wrap">
    <div class="cmp-tb-hd">
        <h2 class="font-2">
            Test Yap
            <a href="<?php echo base_url("words") ?>" class="floatright btn btn-success m-5">Geri Dön</a>
            <?php if (!($reverse == "reverse")){ ?>
                <a href="<?php echo base_url("words/test/reverse") ?>" class="floatright btn btn-danger m-5">Tersine Çevir</a>
            <?php }else{ ?>
                <a href="<?php echo base_url("words/test/normal") ?>" class="floatright btn btn-danger m-5">Normale Çevir</a>
            <?php } ?>
        </h2>
    </div>
    <?php if ($reverse == "reverse"){ ?>
        <div class="text-center mg-tb-40">
            <small class="font-2" >Gördüğünüz Kelimeye Ait Bilgileri Giriniz</small>
            <h1 class="font-2 test-word"><?php echo $word->artikel . " " . $word->word ?><?php echo ($word->plural !== "") ? " / " : "" ?><?php echo " " . $word->plural?></h1>
        </div>
        <form action="<?php echo base_url("words/control/$word->id/reverse") ?>" method="post">
            <div class="form-group mg-tb-40">
                <div class="row">
                    <div class="col-lg-12">
                        <label>Anlamı</label>
                        <input type="text" class="form-control" name="mean">
                    </div>
                </div>
                <button class="btn btn-success w-100 mg-t-30">Gönder</button>
            </div>
        </form>
    <?php }else{ ?>
        <div class="text-center mg-tb-40">
            <small class="font-2" >Gördüğünüz Kelimeye Ait Bilgileri Giriniz</small>
            <h1 class="font-2 test-word"><?php echo $word->mean ?></h1>
        </div>
    <form action="<?php echo base_url("words/control/$word->id/normal") ?>" method="post">
        <div class="form-group mg-tb-40">
            <div class="row">
                <div class="col-lg-4">
                    <label>Artikel</label>
                    <input type="text" class="form-control" name="artikel">
                </div>
                <div class="col-lg-4">
                    <label>Anlamı</label>
                    <input type="text" class="form-control" name="mean">
                </div>
                <div class="col-lg-4">
                    <label>Plural</label>
                    <input type="text" class="form-control" name="plural">
                </div>
            </div>
            <button class="btn btn-success w-100 mg-t-30">Gönder</button>
        </div>
    </form>
    <?php } ?>
</div>
