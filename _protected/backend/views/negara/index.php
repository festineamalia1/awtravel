<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NegaraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Data Negara';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negara-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Negara', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ngr',
            'name',
            'slot_awal',
            'slot_max',
            'wtk_berangkat',
            //'wkt_plg',
            //'deskripsi:ntext',
            //'musim',
            //'biaya',
            //'ft_utama',
            //'id_inex',
            //'id_dp',
            //'id_iti',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
