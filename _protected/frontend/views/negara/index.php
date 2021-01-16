<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NegaraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Negara';
$this->params['breadcrumbs'][] = $this->title;
foreach($lunas as $l){
$this->params['breadcrumbs'][] = ['label' => 'Progres lunas', 'url' => ['tf-lunas/view', 'id' => $l['id_tf_lunas']]];
}
$this->params['breadcrumbs'][] = ['label' => 'Upload Bukti Transfer', 'url' => ['transfer/create']];
$this->params['breadcrumbs'][] = ['label' => 'Progres', 'url' => ['transfer/view', 'id' => Yii::$app->user->id]];
?>
<div class="container">
<div class="negara-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-12 animate-box">
         <div class="owl-carousel">
    <?php foreach($model as $r){?>
        
                       
                            <div class="item">
                                <div class="hotel-entry">
                                    <a href="#" class="hotel-img" >
                                  
                                   <img src="<?=Yii::$app->params['backendUrl'].$r->ft_utama?>" class="hotel-img" >
                                       <p class="price"><span><?=$r->slot_awal?> / <?=$r->slot_max?></span></p>
                                   </a>
                                    
                                    <div class="desc">
                                       
                                        <h3><?=$r->name;?></h3>
                                        <p><?=$r->wtk_berangkat?> - <?=$r->wkt_plg?></p>
                                        <p><?=$r->deskripsi?></p>
                                        
                                     <?=Html::a('Detail',['view','id' =>$r->id_ngr],['class'=>'btn btn-info'])?>
                                    </div>

                                </div>
                            </div>
                       
                    

    <?php }?>
     </div>
    </div>



</div>
</div>
