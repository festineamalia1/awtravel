<?php

/* @var $this \yii\web\View */
/* @var $content string */

//use yii\helpers\Html;

//use frontend\assets\AppAsset;

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap\Dropdown;
//use sweetalert;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('f5878d67d87c61bdfc03', {
      cluster: 'ap1',
      forceTLS: true,
      
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      //alert(JSON.stringify(data));
     swal({
        title:'Pemberitahuan untuk Anda',
        //title:data.title,
        text:data.message,
        //text:"Pembayaran Perjalanan Anda ke Korea telah lunas.., terima kasih..",
        //type:'warning',
        //ConfirmButtonTexr:'Oke',
     });
    });
  </script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    
 <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
       //'brandLabel' => '<img src="travel.png" width="6px" height="25px";>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],

      
    ];

    if (Yii::$app->user->isGuest) {
            $menuItems[] =['label' => 'Tour', 'url' => ['negara']];
      
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
         $menuItems[] =['label' => 'Tour', 'url' => ['/negara']
     ];
         
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

        <div class="colorlib-loader"></div>

<div id="page">
	
    <!--Menu-->

    

  

    <!--Menu End-->
        
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                <li style="background-image: url(_protected/vendor/bower-asset/tour/images/bg1.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">

                                <div class="slider-text-inner text-center">

                                    <h2>5 Days Tour</h2>
                                    <h1>Amazing Korea Tour</h1>

                                </div>

                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(_protected/vendor/bower-asset/tour/images/bg2.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>5 Days Tour</h2>
                                    <h1>Amazing Korea Tour</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(_protected/vendor/bower-asset/tour/images/bg3.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluids">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Explore our most tavel agency</h2>
                                    <h1>Our Travel Agency</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(_protected/vendor/bower-asset/tour/images/bg41.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Experience the</h2>
                                    <h1>Best Trip Ever</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>       
                </ul>
            </div>
        </aside>
       
                    </div>
                </div>
            </div>
       </div>

      

         <div>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    <!--</div>-->
</div>

    
    

        <footer id="colorlib-footer" role="contentinfo">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-3 colorlib-widget">
                       <!-- <h4>Tour Agency</h4>
                        <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>-->
                         <div class="row">
                     <img align="left" src="travel.png" width="280px" height="150px">
                        <p>
                            <ul class="colorlib-social-icons">
                                <li><a href="https://twitter.com/awsubs?lang=en"><i class="icon-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/awsubs/"><i class="icon-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/awsubs.tv/"><i class="icon-instagram"></i></a></li>
                                
                            </ul>
                        </p>
                        </div>
                    </div>
                    <div class="col-md-2 colorlib-widget">
                        <h4>Book Now</h4>
                        <p>
                            <ul class="colorlib-footer-links">
                                <li><a href="http://localhost/yii2_host/index.php?r=negara%2Fview&id=2">Korea</a></li>
                                <li><a href="http://localhost/yii2_host/index.php?r=negara%2Fview&id=3">Japan</a></li>
                                
                            </ul>
                        </p>
                    </div>
                   
                    <div class="col-md-2">
                        <h4>Blog Post</h4>
                        <ul class="colorlib-footer-links">
                            <li><a href="#">The Ultimate Packing List For Female Travelers</a></li>
                            <li><a href="#">How These 5 People Found The Path to Their Dream Trip</a></li>
                            <li><a href="#">A Definitive Guide to the Best Dining and Drinking Venues in the City</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-md-push-1">
                        <h4>Contact Information</h4>
                        <ul class="colorlib-footer-links">
                            <li>Affandi Street No.168, Santren, Caturtunggal, <br> Depok Sub-District, Sleman Regency,<br>Special Region of Yogyakarta 55281
</li>
                            <li><a href="tel://1234567920">085729845394</a></li>
                            <li><a href="mailto:info@yoursite.com">awsubs.team@gmail.com</a></li>
                            <li><a href="https://awsubs.tv/">awsubs.tv</a></li>
                        </ul>
                    </div>
                </div>
               <!-- <div class="row">
                    <div class="col-md-12 text-center">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!--Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
                          <!--  <span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
                        </p>
                    </div>
                </div>-->
            </div>
        </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
    </div>
    
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Date Picker -->
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- Stellar Parallax -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>

 

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
