<?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
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
          $menuItems[] =['label' => 'Contact', 'url' => ['/site/contact']];
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
    	 $menuItems[] =['label' => 'Tour', 'url' => ['/negara']];
          $menuItems[] =['label' => 'Contact', 'url' => ['/site/contact']];
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



     <li><form action="//localhost/yii2_host/index.php?r=site%2Flogout" method="post"><button type="submit" class="btn btn-link logout">Logout(<?=Yii::$app->user->identity->username;?>)</button></form></li>


      <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-2">
                            <div id="colorlib-logo"><a href="index.html">Tour</a></div>
                        </div>
                        <div class="col-xs-10 text-right menu-1">
                            <ul>
                                <li class="active"><a href="http://localhost/yii2_host/index.php?r=site%2Findex">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <?php  if (Yii::$app->user->isGuest) {?>
                                <li class="has-dropdown">
                                    <a href="http://localhost/yii2_host/index.php?r=negara">Tours</a>
                                    <ul class="dropdown">
                                        <li><a href="http://localhost/yii2_host/index.php?r=negara">Destination</a></li>
                                        <li><a href="#">Your Payment</a></li>
                                        
                                    </ul>
                                </li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="http://localhost/yii2_host/index.php?r=site%2Fsignup">Sign Up</a></li>
                                <li><a href="http://localhost/yii2_host/index.php?r=site%2Flogin">Login</a></li>
                                <?php } else {?>
                                     <li class="has-dropdown">
                                    <a href="http://localhost/yii2_host/index.php?r=negara">Tours</a>
                                    <ul class="dropdown">
                                        <li><a href="http://localhost/yii2_host/index.php?r=negara">Destination</a></li>
                                        <li><a href="#">Your Payment</a></li>
                                        
                                    </ul>
                                </li>
                              <!--<li class="has-dropdown">-->
                                 <!--<a href="http://localhost/yii2_host/index.php?r=site%2Findex">profil</a>-->
                                  <!--<ul class="dropdown">-->
                                    
                                <li><form action="site/logout" method="post"><button type="submitButton" class="btn btn-link logout">Logout(<?=Yii::$app->user->identity->username;?>)</button></form></li>
                                <!--</ul>-->
                                <!--</li>-->
                               <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>