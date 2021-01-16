<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankTujuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bank Tujuans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-tujuan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bank Tujuan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_bank_tjn',
            'nm_bank',
            'nomor_rek',
            'nama_rek',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
