<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DtTransaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dt-transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tgl')->textInput() ?>

    <?= $form->field($model, 'jml_org')->textInput() ?>

    <?= $form->field($model, 'wkt_cicil')->dropDownList([ 'lunas' => 'Lunas', 'per minggu' => 'Per minggu', 'per 2 minggu' => 'Per 2 minggu', 'per bulan' => 'Per bulan', 'per 2 bulan' => 'Per 2 bulan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_ngr')->textInput() ?>

    <?= $form->field($model, 'id_bank_tjn')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
