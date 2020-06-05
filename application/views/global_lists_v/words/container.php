<?php
    $count = 1;
?>
<div class="form-example-wrap">
    <div class="cmp-tb-hd">
        <h1><?php echo $list->title ?>
            <small class="text-muted">by <?php echo $user->username ?></small>
            <a href="<?php echo base_url("global") ?>" class="btn btn-info floatright m-5">Geri Dön</a>
            <a href="<?php echo base_url("global_lists/add_list/$list->id") ?>" class="btn btn-success floatright m-5">Bu Listeyi Profilime Ekle</a>
        </h1>
    </div>
    <div class="table-responsive">
        <table id="data-table-basic" class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Kelime</th>
                <th>Anlamı</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($words as $word){ ?>
                <tr>
                    <td><?php echo $count ?></td>
                    <td><?php echo  $word->artikel . " " . $word->word . " / " . $word->plural ?></td>
                    <td><?php echo $word->mean ?></td>
                </tr>
                <?php $count = $count + 1; } ?>
            </tbody>
        </table>
    </div>
</div>