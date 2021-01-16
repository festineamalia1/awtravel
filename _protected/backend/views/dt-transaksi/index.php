<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DtTransaksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dt Transaksis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dt-transaksi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dt Transaksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_det_tr',
            'tgl',
            'jml_org',
            'wkt_cicil',
            'status',
            //'id_ngr',
            //'id_bank_tjn',
            //'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
