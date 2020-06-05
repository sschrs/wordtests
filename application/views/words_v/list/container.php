<?php
    $count = 1;
?>
<div class="form-example-wrap">
    <div class="cmp-tb-hd">
        <h1>Kelimelerim
            <a href="#" class="floatright btn btn-success">Test Yap</a>
        </h1>
        <small>Sistemde kayıtlı tüm kelimeleriniz bu alanda bulunur...</small>
    </div>
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
                        <a href="<?php echo base_url("words/delete_confirm_words/$word->id") ?>" class="text-danger"><i class="list-buttons fa fa-trash button-delete"></i></a>
                    </td>
                </tr>
                <?php $count = $count + 1; } ?>
            </tbody>
        </table>
    </div>
</div>