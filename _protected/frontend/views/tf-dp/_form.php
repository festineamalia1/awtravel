<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TfDp */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
<div class="tf-dp-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'foto_dp')->fileInput() ?>
      <?= $form->field($model, 'id_bank_tjn')->dropDownList($bank) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_rek')->textInput(['maxlength' => true]) ?>

   

   
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
