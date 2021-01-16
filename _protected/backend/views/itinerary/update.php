<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Itinerary */

$this->title = 'Update Itinerary: ' . $model->id_iti;
$this->params['breadcrumbs'][] = ['label' => 'Itineraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_iti, 'url' => ['view', 'id' => $model->id_iti]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="itinerary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
