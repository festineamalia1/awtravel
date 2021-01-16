<style>
       .sidebar-wrap .sidebar-heading {
    font-size: 50px;
    
    margin-bottom: 10px; 
   text-align:center;
    
  }
  .border{
    border: 1px solid #f0f0f0;
  }
.tulisan{
  text-align:center;
  color: #f0f0f0;
}

 .tulisan2 {
    font-size: 50px;
    color: #f0f0f0;
    margin-bottom: 10px; 
   text-align:center;
    
  }

  #accordion .panel{
    border: none;
    border-radius: 5px;
    box-shadow: none;
    margin-bottom: 10px;
    background: transparent;
}
#accordion .panel-heading{
    padding: 0;
    border: none;
    border-radius: 5px;
    background: transparent;
    position: relative;
}
#accordion .panel-title a{
    display: block;
    padding: 20px 30px;
    margin: 0;
    background: rgba(0,0,0,0.4);
    font-size: 17px;
    font-weight: bold;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
    border-radius: 5px;
    position: relative;
}
#accordion .panel-title a.collapsed{ border: none; }
#accordion .panel-title a:before,
#accordion .panel-title a.collapsed:before{
    content: "\f107";
    font-family: "Font Awesome 5 Free";
    width: 30px;
    height: 30px;
    line-height: 27px;
    text-align: center;
    font-size: 25px;
    font-weight: 900;
    color: #fff;
    position: absolute;
    top: 15px;
    right: 30px;
    transform: rotate(180deg);
    transition: all .4s cubic-bezier(0.080, 1.090, 0.320, 1.275);
}
#accordion .panel-title a.collapsed:before{
    color: rgba(255,255,255,0.5);
    transform: rotate(0deg);
}
#accordion .panel-body{
    padding: 20px 30px;
    background: rgba(0,0,0,0.1);
    font-size: 15px;
    color: #fff;
    line-height: 28px;
    letter-spacing: 1px;
    border-top: none;
    border-radius: 5px;
}
   div.box {
  padding: 20px 30px;
    background: rgba(0,0,0,0.1);
    font-size: 15px;
    color: #fff;
    line-height: 28px;
    letter-spacing: 1px;
    border-top: none;
    border-radius: 5px;
    border: 1px solid #FFD700;
}
.tulisan3 {
    font-size: 40px;
    color: #00FFFF;
    margin-bottom: 10px; 
   text-align:center;
    
  }
  .tulisan4 {
    font-size: 15px;
    color: #DAA520;
    margin-bottom: 10px; 
   text-align:left;
    
  }


</style>
    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Negara */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Negaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="negara-view">
    
            <div class="container">
                
    <div class="col-md-12 col-md-offset-0 heading2 animate-box">

    <h2><?= Html::encode($this->title) ?> TOUR</h2>
    
    
</div>

 <div class="col-md-12 animate-box">
         <div class="owl-carousel">

    <?php foreach($data as $r){?>
        
                       
                            <div class="item">
                                <div class="hotel-entry">
                                    <a href="#" class="hotel-img" >
                                  
                                   <img src="<?=Yii::$app->params['backendUrl'].$r['ft'];?>" class="hotel-img" >
                                       <p class="price"><span><?=$r['name'];?></span></p> 
                                   </a>
                                    
                                   
                                </div>
                            </div>
                       
                    

    <?php  }?>
     </div>
    </div>

<div class="col-md-12">
    <h1><?=$model->musim?>, <?=$model->wtk_berangkat?> - <?=$model->wkt_plg?></h1>
</div> 
<div class="container">   
    <div class="container">
        <div class="row">
          
            <div class="col-md-7">
                <div class="room-wrap">
                    <div class="row">
                        <div class="col-md-10 col-sm-10">
                            <div class="desc">
                               <?php foreach($day as $d){?>
                                <h2 class="day-tour"><?=$d['hari'];?></h2>
                            
                              
                                    <p><?=$d['kunjungan'];?></p>
                                    <?php  }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            


<div class="col-md-5">
                        <div class="sidebar-wrap">
                                            <div class="side search-wrap animate-box">
                                        <div class="border">  
                                        <p> </p> 
                                <h1 class="tulisan2"><?=$model->slot_max?> slots</h1>
                                <p class="tulisan">remaining</p>
                                </div> 

                                
<p> </p>
                                  
  <div class="box">
    <p class="tulisan4">SPECIAL PRIZE</p>
    <p class="tulisan3">Rp <?=number_format($model->biaya,0,",",".");?> ,-</p>
    <p> </p>
    
     <p>
        
        
        <a href="http://localhost/yii2_host/index.php?r=dt-transaksi%2Fcreate" class="btn btn-primary btn-block">BOOK NOW</a>
    </p>
  </div>

    
        <div class="row">
          <p> </p>
            <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Include
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <p><?=$model->include;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Exclude
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p><?=$model->exclude;?></p>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
  

                             
                                <form method="post" class="colorlib-form">
                                <div class="row">
                                
                                
                               
                              </div>

                              


                            </form>
                            </div>
                        </div>
                    </div>



                </div>
          </div>
      </div>
      
   

</div>

</div>
