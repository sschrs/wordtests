<?php
$count = 1;
$instance =&get_instance();
$instance->load->model("users_model");
?>
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>
                            Global Listeler
                        </h2>
                        <p>Bu sayfada başka kullancılar tarafından oluşturulup paylaşılan listeleri görüyorsun. İstersen bu listeleri kendi profiline aktarıp doğrudan kullanabilir veya üzerinde geliştirmeler yapabilirsin. Topluluğa destek olmak için sen de oluşturduğun listeleri paylaşarak başka kullanıcıların kullanmasını sağlayabilirsin.</p>
                    </div>
                    <?php if (empty($lists)){ ?>
                    <div class="alert alert-danger text-center">
                        <h3 class="font-2">Henüz Hiç Liste Oluşturmadınız...</h3>
                        <small>Yeni bir tane oluşturmak için [+ Yeni Liste Ekle] butonunu kullanın...</small>
                    </div>
                    <?php }else{ ?>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Başlık</th>
                                <th>Dil</th>
                                <th>Sahip</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($lists as $list){ ?>
                                <?php $user =  $instance->users_model->get(array("id" => $list->idUser)) ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><a href="<?php echo base_url("global_lists/words/$list->id") ?>"><?php echo $list->title ?></a></td>
                                <td><?php echo $list->langFirst . "-" . $list->langSecond ?></td>
                                <td><?php echo  $user->username ?></td>
                            </tr>
                            <?php $count = $count + 1; } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>