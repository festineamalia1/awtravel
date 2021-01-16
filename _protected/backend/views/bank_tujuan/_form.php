<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankTujuan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-tujuan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_bank')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
