<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FotoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_foto') ?>

    <?= $form->field($model, 'id_ngr') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'ft') ?>

    <?= $form->field($model, 'ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
