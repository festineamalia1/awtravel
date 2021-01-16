<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItinerarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itinerary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_iti') ?>

    <?= $form->field($model, 'hari') ?>

    <?= $form->field($model, 'kunjungan') ?>

    <?= $form->field($model, 'biaya') ?>

    <?= $form->field($model, 'id_ngr') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
