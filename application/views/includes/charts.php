<?php
$user = $this->session->userdata("user");
if (isset($user)){


    $instance =& get_instance();
    $instance->load->model("evolution_model");
    $evolutionCorrectList = $instance->evolution_model->get_all(array("type" => "correct", "idUser" => $this->session->userdata("user")->id));
    $evolutionFalseList = $instance->evolution_model->get_all(array("type" => "false", "idUser" => $this->session->userdata("user")->id));
    $correctCreated = array();
    $falseCreated = array();
    $m = date("m");
    $c1 = array();
    $c2 = array();
    $c3 = array();
    $c4 = array();
    $c5 = array();
    $c6 = array();
    $c7 = array();
    $c8 = array();
    $c9 = array();
    $c10 = array();
    $c11 = array();
    $c12 = array();
    $c13 = array();
    $c14 = array();
    $c15 = array();
    $c16 = array();
    $c17 = array();
    $c18 = array();
    $c19 = array();
    $c20 = array();
    $c21 = array();
    $c22 = array();
    $c23 = array();
    $c24 = array();
    $c25 = array();
    $c26 = array();
    $c27 = array();
    $c28 = array();
    $c29 = array();
    $c30 = array();
    $c31 = array();

    $f1 = array();
    $f2 = array();
    $f3 = array();
    $f4 = array();
    $f5 = array();
    $f6 = array();
    $f7 = array();
    $f8 = array();
    $f9 = array();
    $f10 = array();
    $f11 = array();
    $f12 = array();
    $f13 = array();
    $f14 = array();
    $f15 = array();
    $f16 = array();
    $f17 = array();
    $f18 = array();
    $f19 = array();
    $f20 = array();
    $f21 = array();
    $f22 = array();
    $f23 = array();
    $f24 = array();
    $f25 = array();
    $f26 = array();
    $f27 = array();
    $f28 = array();
    $f29 = array();
    $f30 = array();
    $f31 = array();

    foreach ($evolutionCorrectList as $correct) {
        $m_correct = date("m", strtotime($correct->createdAt));
        if ($m == $m_correct) {
            array_push($correctCreated, $correct->createdAt);
        }
    }
    foreach ($evolutionFalseList as $false) {
        $m_false = date("m", strtotime($false->createdAt));
        if ($m == $m_false) {
            array_push($falseCreated, $false->createdAt);
        }
    }
    function getDay($string)
    {
        return date("d", strtotime($string));
    }

    foreach ($correctCreated as $correct) {
        if (getDay($correct) == "01") {
            array_push($c1, $correct);
        } elseif (getDay($correct) == "02") {
            array_push($c2, $correct);
        } elseif (getDay($correct) == "03") {
            array_push($c3, $correct);
        } elseif (getDay($correct) == "04") {
            array_push($c4, $correct);
        } elseif (getDay($correct) == "05") {
            array_push($c5, $correct);
        } elseif (getDay($correct) == "06") {
            array_push($c6, $correct);
        } elseif (getDay($correct) == "07") {
            array_push($c7, $correct);
        } elseif (getDay($correct) == "08") {
            array_push($c8, $correct);
        } elseif (getDay($correct) == "09") {
            array_push($c9, $correct);
        } elseif (getDay($correct) == "10") {
            array_push($c10, $correct);
        } elseif (getDay($correct) == "11") {
            array_push($c11, $correct);
        } elseif (getDay($correct) == "12") {
            array_push($c12, $correct);
        } elseif (getDay($correct) == "13") {
            array_push($c13, $correct);
        } elseif (getDay($correct) == "14") {
            array_push($c14, $correct);
        } elseif (getDay($correct) == "15") {
            array_push($c15, $correct);
        } elseif (getDay($correct) == "16") {
            array_push($c16, $correct);
        } elseif (getDay($correct) == "17") {
            array_push($c17, $correct);
        } elseif (getDay($correct) == "18") {
            array_push($c18, $correct);
        } elseif (getDay($correct) == "19") {
            array_push($c19, $correct);
        } elseif (getDay($correct) == "20") {
            array_push($c20, $correct);
        } elseif (getDay($correct) == "21") {
            array_push($c21, $correct);
        } elseif (getDay($correct) == "22") {
            array_push($c22, $correct);
        } elseif (getDay($correct) == "23") {
            array_push($c23, $correct);
        } elseif (getDay($correct) == "24") {
            array_push($c24, $correct);
        } elseif (getDay($correct) == "25") {
            array_push($c25, $correct);
        } elseif (getDay($correct) == "26") {
            array_push($c26, $correct);
        } elseif (getDay($correct) == "27") {
            array_push($c27, $correct);
        } elseif (getDay($correct) == "28") {
            array_push($c28, $correct);
        } elseif (getDay($correct) == "29") {
            array_push($c29, $correct);
        } elseif (getDay($correct) == "30") {
            array_push($c30, $correct);
        } elseif (getDay($correct) == "31") {
            array_push($c31, $correct);
        }
    }

    foreach ($falseCreated as $correct) {
        if (getDay($correct) == "01") {
            array_push($f1, $correct);
        } elseif (getDay($correct) == "02") {
            array_push($f2, $correct);
        } elseif (getDay($correct) == "03") {
            array_push($f3, $correct);
        } elseif (getDay($correct) == "04") {
            array_push($f4, $correct);
        } elseif (getDay($correct) == "05") {
            array_push($f5, $correct);
        } elseif (getDay($correct) == "06") {
            array_push($f6, $correct);
        } elseif (getDay($correct) == "07") {
            array_push($f7, $correct);
        } elseif (getDay($correct) == "08") {
            array_push($f8, $correct);
        } elseif (getDay($correct) == "09") {
            array_push($f9, $correct);
        } elseif (getDay($correct) == "10") {
            array_push($f10, $correct);
        } elseif (getDay($correct) == "11") {
            array_push($f11, $correct);
        } elseif (getDay($correct) == "12") {
            array_push($f12, $correct);
        } elseif (getDay($correct) == "13") {
            array_push($f13, $correct);
        } elseif (getDay($correct) == "14") {
            array_push($f14, $correct);
        } elseif (getDay($correct) == "15") {
            array_push($f15, $correct);
        } elseif (getDay($correct) == "16") {
            array_push($f16, $correct);
        } elseif (getDay($correct) == "17") {
            array_push($f17, $correct);
        } elseif (getDay($correct) == "18") {
            array_push($f18, $correct);
        } elseif (getDay($correct) == "19") {
            array_push($f19, $correct);
        } elseif (getDay($correct) == "20") {
            array_push($f20, $correct);
        } elseif (getDay($correct) == "21") {
            array_push($f21, $correct);
        } elseif (getDay($correct) == "22") {
            array_push($f22, $correct);
        } elseif (getDay($correct) == "23") {
            array_push($f23, $correct);
        } elseif (getDay($correct) == "24") {
            array_push($f24, $correct);
        } elseif (getDay($correct) == "25") {
            array_push($f25, $correct);
        } elseif (getDay($correct) == "26") {
            array_push($f26, $correct);
        } elseif (getDay($correct) == "27") {
            array_push($f27, $correct);
        } elseif (getDay($correct) == "28") {
            array_push($f28, $correct);
        } elseif (getDay($correct) == "29") {
            array_push($f29, $correct);
        } elseif (getDay($correct) == "30") {
            array_push($f30, $correct);
        } elseif (getDay($correct) == "31") {
            array_push($f31, $correct);
        }

    }


?>


<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php for ($i = 1;$i<32;$i++){
                echo "'$i',";
            } ?>],
            datasets: [{
                label: 'Doğru Cevapların',
                data: [
                    <?php echo count($c1) ?>,
                    <?php echo count($c2) ?>,
                    <?php echo count($c3) ?>,
                    <?php echo count($c4) ?>,
                    <?php echo count($c5) ?>,
                    <?php echo count($c6) ?>,
                    <?php echo count($c7) ?>,
                    <?php echo count($c8) ?>,
                    <?php echo count($c9) ?>,
                    <?php echo count($c10) ?>,
                    <?php echo count($c11) ?>,
                    <?php echo count($c12) ?>,
                    <?php echo count($c13) ?>,
                    <?php echo count($c14) ?>,
                    <?php echo count($c15) ?>,
                    <?php echo count($c16) ?>,
                    <?php echo count($c17) ?>,
                    <?php echo count($c18) ?>,
                    <?php echo count($c19) ?>,
                    <?php echo count($c20) ?>,
                    <?php echo count($c21) ?>,
                    <?php echo count($c22) ?>,
                    <?php echo count($c23) ?>,
                    <?php echo count($c24) ?>,
                    <?php echo count($c25) ?>,
                    <?php echo count($c26) ?>,
                    <?php echo count($c27) ?>,
                    <?php echo count($c28) ?>,
                    <?php echo count($c29) ?>,
                    <?php echo count($c30) ?>,
                    <?php echo count($c31) ?>,
                ],
                borderWidth: 1,
                borderColor : "#00C292",
                fill : false,
                borderWidth : 2,
            },
            {
                label: 'Yanlış Cevapların',
                data: [

                    <?php echo count($f1) ?>,
                    <?php echo count($f2) ?>,
                    <?php echo count($f3) ?>,
                    <?php echo count($f4) ?>,
                    <?php echo count($f5) ?>,
                    <?php echo count($f6) ?>,
                    <?php echo count($f7) ?>,
                    <?php echo count($f8) ?>,
                    <?php echo count($f9) ?>,
                    <?php echo count($f10) ?>,
                    <?php echo count($f11) ?>,
                    <?php echo count($f12) ?>,
                    <?php echo count($f13) ?>,
                    <?php echo count($f14) ?>,
                    <?php echo count($f15) ?>,
                    <?php echo count($f16) ?>,
                    <?php echo count($f17) ?>,
                    <?php echo count($f18) ?>,
                    <?php echo count($f19) ?>,
                    <?php echo count($f20) ?>,
                    <?php echo count($f21) ?>,
                    <?php echo count($f22) ?>,
                    <?php echo count($f23) ?>,
                    <?php echo count($f24) ?>,
                    <?php echo count($f25) ?>,
                    <?php echo count($f26) ?>,
                    <?php echo count($f27) ?>,
                    <?php echo count($f28) ?>,
                    <?php echo count($f29) ?>,
                    <?php echo count($f30) ?>,
                    <?php echo count($f31) ?>,
                ],
                borderWidth: 1,
                borderColor : "#E91E63",
                fill : false,
                borderWidth : 2,
            },
            {
                label: 'Yaptığın Testler',
                data: [
                    <?php echo count($f1) + count($c1) ?>,
                    <?php echo count($f2) + count($c2) ?>,
                    <?php echo count($f3) + count($c3) ?>,
                    <?php echo count($f4) + count($c4) ?>,
                    <?php echo count($f5) + count($c5) ?>,
                    <?php echo count($f6) + count($c6) ?>,
                    <?php echo count($f7) + count($c7) ?>,
                    <?php echo count($f8) + count($c8) ?>,
                    <?php echo count($f9) + count($c9) ?>,
                    <?php echo count($f10) + count($c10) ?>,
                    <?php echo count($f11) + count($c11) ?>,
                    <?php echo count($f12) + count($c12) ?>,
                    <?php echo count($f13) + count($c13) ?>,
                    <?php echo count($f14) + count($c14) ?>,
                    <?php echo count($f15) + count($c15) ?>,
                    <?php echo count($f16) + count($c16) ?>,
                    <?php echo count($f17) + count($c17) ?>,
                    <?php echo count($f18) + count($c18) ?>,
                    <?php echo count($f19) + count($c19) ?>,
                    <?php echo count($f20) + count($c20) ?>,
                    <?php echo count($f21) + count($c21) ?>,
                    <?php echo count($f22) + count($c22) ?>,
                    <?php echo count($f23) + count($c23) ?>,
                    <?php echo count($f24) + count($c24) ?>,
                    <?php echo count($f25) + count($c25) ?>,
                    <?php echo count($f26) + count($c26) ?>,
                    <?php echo count($f27) + count($c27) ?>,
                    <?php echo count($f28) + count($c28) ?>,
                    <?php echo count($f29) + count($c29) ?>,
                    <?php echo count($f30) + count($c30) ?>,
                    <?php echo count($f31) + count($c31) ?>,
                ],
                borderWidth: 1,
                borderColor : "#673AB7",
                fill : false,
                borderWidth : 2,
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var correct = document.getElementById('correctChart').getContext('2d');
    var correctChart = new Chart(correct, {
        type: 'bar',
        data: {
            labels: ['Doğruların', 'Yanlışların'],
            datasets: [
                {
                label: 'Doğru Ve Yanlışlar',
                data: [<?php echo count($evolutionCorrectList) ?>, -<?php echo count($evolutionFalseList) ?>],
                backgroundColor : ['#673AB7', '#FF9800']
                },

            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


</script>
<?php } ?>