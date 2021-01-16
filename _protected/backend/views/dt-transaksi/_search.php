<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DtTransaksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dt-transaksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_det_tr') ?>

    <?= $form->field($model, 'tgl') ?>

    <?= $form->field($model, 'jml_org') ?>

    <?= $form->field($model, 'wkt_cicil') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'id_ngr') ?>

    <?php // echo $form->field($model, 'id_bank_tjn') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
