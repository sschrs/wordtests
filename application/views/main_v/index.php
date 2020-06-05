<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>WORDTESTS | Yabancı Dilde Kelime Test Platformu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="yabancı dil,kelime ezberleme,kelime testi" name="keywords">
    <meta content="Yabancı Dil Öğrenirken Kendi Kelime Listelerinizi Oluşturun ve Kendinizi Sınayın! Ücretsiz ve Basit!" name="description">
    <link rel="stylesheet" href="<?php echo base_url("assets") ?>/css/Chart.min.css">
    <!-- Favicons -->
    <link href="<?php echo base_url("assets/main") ?>/img/favicon.png" rel="icon">
    <link href="<?php echo base_url("assets/main") ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?php echo base_url("assets/main") ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?php echo base_url("assets/main") ?>/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url("assets/main") ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url("assets/main") ?>/lib/venobox/venobox.css" rel="stylesheet">
    <link href="<?php echo base_url("assets/main") ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Main Stylesheet File -->
    <link href="<?php echo base_url("assets/main") ?>/css/style.css" rel="stylesheet">

</head>

<body>

<!--==========================
  Header
============================-->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <!-- Uncomment below if you prefer to use a text logo -->
            <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
            <a href="#intro" class="scrollto" style="font-size: 1.5rem">WORDTESTS</a>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="#intro">Anasayfa</a></li>
                <li><a href="#about">Sistem Nasıl Çalışıyor?</a></li>
                <li><a href="#venue">Gelişiminizi Görün</a></li>
                <li class="buy-tickets"><a href="<?php echo base_url("register") ?>">Üye Ol</a></li>
                <li class="buy-tickets"><a href="<?php echo base_url("login") ?>">Giriş Yap</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro">
    <div class="intro-container wow fadeIn">
        <h1 class="mb-4 pb-0">Ücretsiz ve Kolay<br><span>Dil Öğrenim</span> Platformu</h1>
        <p class="mb-4 pb-0">Yabancı Dil Öğrenirken Kendi Kelime Listelerinizi Oluşturun ve Kendinizi Sınayın! Ücretsiz ve Basit!</p>
        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video"
           data-autoplay="true"></a>
        <a href="#about" class="about-btn scrollto">Sistem Nasıl Çalışıyor?</a>
    </div>
</section>

<main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Sistem Nasıl Çalışıyor?</h2>
                    <p>
                        Sisteme üye olarak kullanmaya başlyabilirsiniz. Kendinize ait kelime listeleri oluşturun ve bu listeler üzerinden kendinizi sınayarak öğrenin. Çizelgelerinize ve grafiklerinize bakarak gelişiminizi görün. Başka kullanıcılar tarafından paylaşılan listeleri kendi profilinize aktararak kullanmaya devam edin. Öğrendiğiniz dilin özelliklerine göre 'Artikel' ve 'Plural' alanları ekleyin ve test edin. Bu sayede sadece İngilizce değil neredeyse tüm dilleri öğrenirken bu sistemi kullanabilirsiniz. Siz test yaparken doğru bildiğiniz kelimeler tüm kelimeleri bir tur dönene kadar tekrar karşınıza çıkmaz. Böylece sadece öğrenmeye ihtiyaç duyduğunuz kelimelere odaklanabilirsiniz. Listeleri tersine çevirerek birincil dili ve ikincil dili yer değiştirebilirsiniz. Bu sayede öğrenim sürecinizi iki taraftan da pekiştirirsiniz.
                    </p>
                </div>
                <div class="col-lg-3">
                    <h3>Ücret</h3>
                    <p>Bu sistemi kullanırken hiçbir ücret veya ek satın alımla karşılaşmazsınız. Tamamen ücretsiz ve kısıtlama yok!</p>
                </div>
                <div class="col-lg-3">
                    <h3>Nerede</h3>
                    <p>Bu sistemi Bilgisayarınızda, Telefonunuzda, Tabletinizde kısacası internet erişimine sahip olduğunuz her yerde kullanabilirsiniz.
                        <br>Otobüste, tramvayda, durakta, boş vaktinizin olduğu her yerde dil öğrenmeye devam edin.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
      Venue Section
    ============================-->
    <section id="venue" class="wow fadeInUp">

        <div class="container-fluid">

            <div class="section-header">
                <h2>Gelişimizi Görün!</h2>
                <p>İnteraktif araçlarla öğrenim sürecinizin kalitesini artırın!</p>
            </div>

            <div class="row no-gutters">
                <div class="col-lg-6 venue-map">
                    <canvas id="mainchart" width="400" height="200"></canvas>
                </div>

                <div class="col-lg-6 venue-info">
                    <div class="row justify-content-center">
                        <div class="col-11 col-lg-8">
                            <h3>Gelişim Çizelgeleri ve Score Tablosu</h3>
                            <p>Çizelgeler ve grafiklerle ilerlemenizi anlık olarak takip edin. Test sayılarınız, doğru ve yanlış yanıtlarınızı bir bakışta değerlendirin. Score sistemi ile kendinize meydan okuyun. Motivasyonunuzu yüksek tutun! Öğrenim sürecinizi <b>kaliteli</b> hale getirin! </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </section>
</main>


<!--==========================
  Footer
============================-->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>WordTests</strong>. All Rights Reserved
        </div>
        <div class="credits">Founded by <a href="https://tr.linkedin.com/in/suleymanozarslan">Süleyman Özarslan</a>
        </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

<script src="<?php echo base_url("assets") ?>/js/Chart.min.js"></script>
<!-- JavaScript Libraries -->
<script src="<?php echo base_url("assets/main") ?>/lib/jquery/jquery.min.js"></script>
<script src="<?php echo base_url("assets/main") ?>/lib/jquery/jquery-migrate.min.js"></script>
<script src="<?php echo base_url("assets/main") ?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url("assets/main") ?>/lib/easing/easing.min.js"></script>
<script src="<?php echo base_url("assets/main") ?>/lib/superfish/hoverIntent.js"></script>
<script src="<?php echo base_url("assets/main") ?>/lib/superfish/superfish.min.js"></script>
<script src="<?php echo base_url("assets/main") ?>/lib/wow/wow.min.js"></script>
<script src="<?php echo base_url("assets/main") ?>/lib/venobox/venobox.min.js"></script>
<script src="<?php echo base_url("assets/main") ?>/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="<?php echo base_url("assets/main") ?>/contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="<?php echo base_url("assets/main") ?>/js/main.js"></script>

<script>
    var mainchart = document.getElementById('mainchart');
    var chart = new Chart(mainchart, {
        type: 'line',
        data: {
            labels: ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31',],
            datasets: [{
                label: 'Doğru Cevapların',
                data: [12,5,54,12,3,1,0,12,31,10,11,21,43,12,11,23,11,23,6,21,2,1,0,12,23,12,32,30,42],
                borderWidth: 1,
                borderColor : "#00C292",
                fill : false,
                borderWidth : 2,
            },
                {
                    label: 'Yanlış Cevapların',
                    data: [11,12,34,3,12,54,0,12,5,15,11,32,34,22,11,24,7,13,6,11,12,34,3,12,54,32,20,12],
                    borderWidth: 1,
                    borderColor : "#E91E63",
                    fill : false,
                    borderWidth : 2,
                    hidden : true
                },
                {
                    label: 'Yaptığın Testler',
                    data: [50,18,45,12,32,54,64,32,56,12,32,43,12,43,54,65,12,12,54,65,12,45,34,12,65,40,34],
                    borderWidth: 1,
                    borderColor : "#673AB7",
                    fill : false,
                    borderWidth : 2,
                    hidden: true
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

</script>
</body>

</html>
