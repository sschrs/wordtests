<div class="form-example-wrap">
    <div class="cmp-tb-hd">
        <h2 class="font-2">
            Test Yap
            <a href="<?php echo base_url("lists") ?>" class="floatright btn btn-success m-5">Geri Dön</a>
            <?php if (!($reverse == "reverse")){ ?>
                <a href="<?php echo base_url("tests/index/$list->id/reverse") ?>" class="floatright btn btn-danger m-5">Listeyi Tersine Çevir</a>
            <?php }else{ ?>
                <a href="<?php echo base_url("tests/index/$list->id/normal") ?>" class="floatright btn btn-danger m-5">Listeyi Normale Çevir</a>
            <?php } ?>

            <small><?php echo $list->title ?></small>
        </h2>
    </div>
    <?php if ($reverse == "reverse"){ ?>
        <div class="text-center mg-tb-40">
            <small class="font-2" >Gördüğünüz Kelimeye Ait Bilgileri Giriniz</small>
            <h1 class="font-2 test-word"><?php echo $word->artikel . " " . $word->word ?><?php echo ($word->plural !== "") ? " / " : "" ?><?php echo " " . $word->plural?></h1>
        </div>
        <form action="<?php echo base_url("tests/control/$word->id/$list->id/reverse") ?>" method="post">
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
    <?php if (($list->artikel == 1) && ($list->plural == 1) ){ ?>
    <form action="<?php echo base_url("tests/control/$word->id/$list->id/normal") ?>" method="post">
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
    <?php }elseif (($list->artikel == 1) && ($list->plural == 0)){ ?>
        <form action="<?php echo base_url("tests/control/$word->id/$list->id/normal") ?>" method="post">
            <div class="form-group mg-tb-40">
                <div class="row">
                    <div class="col-lg-6">
                        <label>Artikel</label>
                        <input type="text" class="form-control" name="artikel">
                    </div>
                    <div class="col-lg-6">
                        <label>Anlamı</label>
                        <input type="text" class="form-control" name="mean">
                    </div>
                </div>
                <button class="btn btn-success w-100 mg-t-30">Gönder</button>
            </div>
        </form>
    <?php }elseif (($list->artikel == 0) && ($list->plural == 1)){ ?>
        <form action="<?php echo base_url("tests/control/$word->id/$list->id/normal") ?>" method="post">
            <div class="form-group mg-tb-40">
                <div class="row">
                    <div class="col-lg-6">
                        <label>Anlamı</label>
                        <input type="text" class="form-control" name="mean">
                    </div>
                    <div class="col-lg-6">
                        <label>Plural</label>
                        <input type="text" class="form-control" name="plural">
                    </div>
                </div>
                <button class="btn btn-success w-100 mg-t-30">Gönder</button>
            </div>
        </form>
    <?php }else{ ?>
        <form action="<?php echo base_url("tests/control/$word->id/$list->id/normal") ?>" method="post">
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
    <?php } ?>
    <?php } ?>
    <div class="progress-panel text-center progress-trophy">
        <div class="progress-score"></div>
    </div>
    <div class="text-center w-100">
        <h4 class="font-2"><?php echo $score ?>/<?php echo $total ?><i class="fa fa-trophy progress-trophy"></i></h4>
    </div>
</div>
<style>
    .progress-score{
        height: 30px;
        width: <?php echo ($score*100)/$total ?>%;
        background-color: #00C292;
    }
</style>