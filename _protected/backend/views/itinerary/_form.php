<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Itinerary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itinerary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hari')->dropDownList([ 'day 1' => 'Day 1', 'day 2' => 'Day 2', 'day 3' => 'Day 3', 'day 4' => 'Day 4', 'day 5' => 'Day 5', 'day 6' => 'Day 6', 'day 7' => 'Day 7', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kunjungan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'biaya')->textInput() ?>

    <?= $form->field($model, 'id_ngr')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
