<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TfDp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tf-dp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ft_dp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_rek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_bank_tjn')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'wait' => 'Wait', 'approve' => 'Approve', 'disapprove' => 'Disapprove', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tgl')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
