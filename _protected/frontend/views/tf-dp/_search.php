<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TfDpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tf-dp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tfdp') ?>

    <?= $form->field($model, 'ft_dp') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'nm_rek') ?>

    <?= $form->field($model, 'id_bank_tjn') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
