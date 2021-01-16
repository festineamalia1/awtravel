<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transfer */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
     
<div class="col-md-12 col-md-offset-0 heading2 animate-box">

<div class="transfer-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'besar')->textInput() ?>

    <?= $form->field($model, 'foto_trans')->fileInput() ?>
    
    <?= $form->field($model, 'id_bank_tjn')->dropDownList($bank) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_rek')->textInput(['maxlength' => true]) ?>

 

    <?= $form->field($model, 'cicilan_ke')->textInput() ?>

    

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>