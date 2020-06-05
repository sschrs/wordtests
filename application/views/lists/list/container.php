<?php
$count = 1;

?>
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>
                            Kelime Listelerim
                            <a href="<?php echo base_url("lists/add") ?>" class= "new-button floatright"> <i class="fa fa-plus"></i> Yeni Liste Ekle</a>
                        </h2>
                        <p>Eklediğin kelimelere ait listeleri burada bulabilirsin. Eğer oluşturduğun listeyi paylaşırsan başka kullanıcılar da listelerini görebilir ve kullanabilir. Sen de bu listelere erişmek istersen arama kutusunu kullanabilir veya Global Listeler alanına bakabilirsin...</p>
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
                                <th>Durum</th>
                                <th>Paylaş</th>
                                <th>Dil</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($lists as $list){ ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><a href="<?php echo base_url("words/add/$list->id") ?>"><?php echo $list->title ?></a></td>
                                <td>
                                    <?php
                                        $instance =& get_instance();
                                        $instance->load->model("complated_model");
                                        $instance->load->model("words_model");
                                        $score_normal = count($instance->complated_model->get_all(array("idList" => $list->id,"reverse" => 0)));
                                        $score_reverse = count($instance->complated_model->get_all(array("idList" => $list->id, "reverse" => 1)));
                                        $total = count($instance->words_model->get_all(array("idList" => $list->id)));
                                        echo $score_normal . "/" . $total . "<i class='score fa fa-trophy'></i>" . $score_reverse . "/" . $total
                                    ?>
                                </td>
                                <td><input type="checkbox" class="js-switch situation" data-url="<?php echo base_url("lists/situationSetter/$list->id") ?>" <?php echo ($list->situation == 1) ? "checked" : "" ?> ></td>
                                <td><?php echo $list->langFirst . "-" . $list->langSecond ?></td>
                                <td>
                                    <a href="<?php echo base_url("tests/index/$list->id/normal") ?>" class="text-info"><i class="fa fa-check-circle list-buttons button-quiz"></i></a>
                                    <a href="<?php echo base_url("words/add/$list->id") ?>" class="text-success button-add"><i class="fa fa-plus list-buttons "></i></a>
                                    <a href="<?php echo base_url("lists/update_form/$list->id") ?>" class="text-warning"><i class="list-buttons fa fa-pencil button-update"></i></a>
                                    <a href="<?php echo base_url("lists/delete_confirm/$list->id") ?>" class="text-danger"><i class="list-buttons fa fa-trash button-delete"></i></a>
                                </td>
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