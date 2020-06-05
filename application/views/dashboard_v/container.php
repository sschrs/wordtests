<?php
$user = $this->session->userdata("user");
$instance =& get_instance();
$instance->load->model("complated_model");
$instance->load->model("words_model");
$instance->load->model("lists_model");
$lists = $instance->lists_model->get_all(array("idUser" => $user->id));
?>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
            <div class="website-traffic-ctn">
                <h2><span class="counter"><?php echo count($words) ?></span></h2>
                <p>Toplam Kelime Sayısı</p>
            </div>
            <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
            <div class="website-traffic-ctn">
                <h2><span class="counter"><?php echo count($lists) ?></span></h2>
                <p>Toplam Liste Sayısı</p>
            </div>
            <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
            <div class="website-traffic-ctn">
                <h2><span class="counter"><?php echo count($evolution) ?></span></h2>
                <p>Toplam Test Sayısı</p>
            </div>
            <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
            <div class="website-traffic-ctn">
                <h2><span class="counter"><?php echo $this->session->userdata("user")->score ?></span></h2>
                <p>Score</p>
            </div>
            <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="bar-chart-wp mg-t-30 chart-display-nn">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="bar-chart-wp mg-t-30 chart-display-nn">
            <canvas id="correctChart"  height="500"></canvas>
        </div>
    </div>

</div>