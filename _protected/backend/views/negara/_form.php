<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Negara */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="negara-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slot_awal')->textInput() ?>

    <?= $form->field($model, 'slot_max')->textInput() ?>

    <?= $form->field($model, 'wtk_berangkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wkt_plg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'musim')->dropDownList([ 'Summer' => 'Summer', 'Rainy' => 'Rainy', 'Winter' => 'Winter', 'Spring' => 'Spring', 'Autumn' => 'Autumn', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'biaya')->textInput() ?>

     <?= $form->field($model, 'foto_ut')->fileInput() ?>

    <?= $form->field($model, 'include')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'exclude')->textarea(['rows' => 6]) ?>

   <?= $form->field($model, 'dp')->textInput() ?>

    <?= $form->field($model, 'id_iti')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
