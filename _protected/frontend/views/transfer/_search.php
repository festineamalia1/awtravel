<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransferSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transfer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_transfer') ?>

    <?= $form->field($model, 'ft_trans') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'nm_rek') ?>

  

    <?php // echo $form->field($model, 'cicilan_ke') ?>

    <?php // echo $form->field($model, 'id_bank_tjn') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
