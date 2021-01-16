<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Foto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ngr')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->fileInput() ?>

    <?= $form->field($model, 'ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
