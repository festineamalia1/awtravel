<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DtTransaksi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
<div class="dt-transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ngr')->dropDownList($ngr) ?>

    <?= $form->field($model, 'jml_org')->textInput() ?>

    <?= $form->field($model, 'wkt_cicil')->dropDownList([ '0' => 'Lunas', '1' => 'Per minggu', '2' => 'Per 2 minggu', '3' => 'Per bulan', '4' => 'Per 2 bulan', ], ['prompt' => '']) ?>
   
    

    <?= $form->field($model, 'id_bank_tjn')->dropDownList($bank) ?>
    <div class="form-group">
        <?= Html::submitButton('BOOK NOW', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
