<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TfLunasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tf Lunas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tf-lunas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tf Lunas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tf_lunas',
            'ft_lunas',
            'name',
            'nm_rek',
            'id_bank_tjn',
            //'id_user',
            //'cashback',
            //'status',
            //'tgl',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
