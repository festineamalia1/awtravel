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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_ngr], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_ngr], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_ngr',
            'name',
            'slot_awal',
            'slot_max',
            'wtk_berangkat',
            'wkt_plg',
            'deskripsi:ntext',
            'musim',
            'biaya',
            'ft_utama',
            'include',
            'exclude',
           
        ],
    ]) ?>

</div>
