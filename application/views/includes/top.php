<?php
$user = $this->session->userdata("user");
$instance =& get_instance();
$instance->load->model("complated_model");
$instance->load->model("words_model");
$instance->load->model("lists_model");
$lists = $instance->lists_model->get_all(array("idUser" => $user->id));
?>
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="navbar-brand">
                    <h2 class="font-1"><a style="color: white" href="<?php echo base_url("") ?>">WORDTESTS</a></h2>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">

                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-menus"></i></span></a>
                            <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">
                                <div class="hd-mg-tt">
                                    <h2>İlerlemelerim</h2>
                                </div>
                                <div class="hd-message-info hd-task-info">
                                    <div class="skill">
                                        <?php foreach ($lists as $list) {
                                            $score_normal = count($instance->complated_model->get_all(array("idList" => $list->id,"reverse" => 0)));
                                            $total = count($instance->words_model->get_all(array("idList" => $list->id)));
                                            ?>

                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-progress="<?php echo ($total == 0) ? "0" : ceil(($score_normal*100)/$total) ?>%" style="width: <?php echo ($total == 0) ? "0" : ceil(($score_normal*100)/$total)?>%" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span><?php echo ($total == 0) ? "0" : ceil(($score_normal*100)/$total) ?>%</span>
                                            </div>
                                            <div class="font-2 w-100" style="display: inline-block"><?php echo $list->title ?></div>
                                            <div class="lead-content">
                                            </div>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-support"></i></span></a>
                            <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                <div class="hd-mg-tt">
                                    <h2>Profil</h2>
                                </div>
                                <!--PROFILE-->
                                <div class="profile-photo">
                                    <img class="profile-avatar" src="<?php echo base_url("assets/img/user.png") ?>" alt="">
                                </div>
                                <div class="username-text">
                                    <h4 class="font-2"><?php echo $user->name . " " . $user->surname ?></h4>
                                </div>
                                <div class="score-text">
                                    <h5 class="font-2">Score: <?php echo $user->score ?> <i class="fa fa-trophy"></i></h5>
                                </div>
                                <hr>
                                <div class="profile-links">
                                    <a href="<?php echo base_url("logout") ?>">Çıkış Yap <i class="fa fa-sign-out"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>