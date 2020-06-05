<?php
    $count = 1;
?>
<div class="form-example-wrap">
    <div class="cmp-tb-hd">
        <h2>
            Kelime Ekle <small><?php echo $list->title ?></small>
            <a href="<?php echo base_url("lists") ?>" class="floatright"><small>Listelerim</small> Geri Dön </a>
        </h2>
        <?php if (($list->artikel == 1) || ($list->plural == 1)){ ?>
        <small>Artikele veya Plural haline sahip olmayan kelimeler için (fiiller,sıfatlar vb.) "Kelime" alanını kullanınız.</small>
        <?php } ?>
    </div>
    <?php if (($list->artikel == 1) && ($list->plural == 1) ) {?>
    <div class="row">
        <form action="<?php echo base_url("words/save/$idList") ?>" method="post">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Artikel</label>
                    <input type="text" class="form-control input-sm" name="artikel">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Kelime</label>
                    <input type="text" class="form-control" name="word">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Plural</label>
                    <input type="text" class="form-control" name="plural">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Anlamı</label>
                    <input type="text" class="form-control" name="mean">
                </div>
            </div>
            <button type="submit" class="btn-success btn save-button-50-center">Kaydet</button>
        </form>
    </div>
    <?php }elseif (($list->artikel == 1) && ($list->plural == 0)){ ?>
        <div class="row">
            <form action="<?php echo base_url("words/save/$idList") ?>" method="post">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Artikel</label>
                        <input type="text" class="form-control input-sm" name="artikel">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Kelime</label>
                        <input type="text" class="form-control" name="word">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Anlamı</label>
                        <input type="text" class="form-control" name="mean">
                    </div>
                </div>
                <button type="submit" class="btn-success btn save-button-50-center">Kaydet</button>
            </form>
        </div>
    <?php }elseif (($list->artikel == 0) && ($list->plural == 1)){ ?>
        <div class="row">
            <form action="<?php echo base_url("words/save/$idList") ?>" method="post">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Kelime</label>
                        <input type="text" class="form-control" name="word">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Plural</label>
                        <input type="text" class="form-control" name="plural">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Anlamı</label>
                        <input type="text" class="form-control" name="mean">
                    </div>
                </div>
                <button type="submit" class="btn-success btn save-button-50-center">Kaydet</button>
            </form>
        </div>
    <?php }else{ ?>
        <div class="row">
            <form action="<?php echo base_url("words/save/$idList") ?>" method="post">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Kelime</label>
                        <input type="text" class="form-control" name="word">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Anlamı</label>
                        <input type="text" class="form-control" name="mean">
                    </div>
                </div>
                <button type="submit" class="btn-success btn save-button-50-center">Kaydet</button>
            </form>
        </div>
    <?php } ?>
    <?php if (empty($words)){ ?>
    <div class="alert alert-danger text-center">
        <h2>Henüz Hiç Kelime Eklemediniz</h2>
        <small>Eklemek İçin Yukarıdaki Alanı Kullanın</small>
    </div>
    <?php }else{ ?>
    <div class="table-responsive">
        <table id="data-table-basic" class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Kelime</th>
                <th>Anlamı</th>
                <th class="text-right"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($words as $word){ ?>
                <tr>
                    <td><?php echo $count ?></td>
                    <td><?php echo  $word->artikel . " " . $word->word . " / " . $word->plural ?></td>
                    <td><?php echo $word->mean ?></td>
                    <td class="text-right">
                        <a href="<?php echo base_url("words/delete_confirm/$word->id/$list->id") ?>" class="text-danger"><i class="list-buttons fa fa-trash button-delete"></i></a>
                    </td>
                </tr>
                <?php $count = $count + 1; } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>
</div>
