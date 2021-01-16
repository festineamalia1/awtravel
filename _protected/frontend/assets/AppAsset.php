<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
   // public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@bower/tour/';
    public $css = [
        'css/animate.css',
        'css/icomoon.css',
        'css/bootstrap.css',
        'css/magnific-popup.css',
        'css/flexslider.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/bootstrap-datepicker.css',
        'fonts/flaticon/font/flaticon.css',
        'css/style.css',
        'css/site.css',
        "//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css",
    ];
    public $js = [
        'js/modernizr-2.6.2.min.js',
        'js/jquery.min.js',
        'js/jquery.easing.1.3.js',
        'js/bootstrap.min.js',
        'js/jquery.waypoints.min.js',
        'js/jquery.flexslider-min.js',
        'js/owl.carousel.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/magnific-popup-options.js',
        'js/bootstrap-datepicker.js',
        'js/jquery.stellar.min.js',
        'js/main.js',
        '//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js',
        '//js.pusher.com/4.4/pusher.min.js',
        'node_modules/sweetalert/dist/sweetalert.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
