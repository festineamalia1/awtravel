<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankTujuanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-tujuan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_bank_tjn') ?>

    <?= $form->field($model, 'nm_bank') ?>

    <?= $form->field($model, 'nomor_rek') ?>

    <?= $form->field($model, 'nama_rek') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
