<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItinerarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Itineraries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itinerary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Itinerary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_iti',
            'hari',
            'kunjungan:ntext',
            'biaya',
            'id_ngr',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
