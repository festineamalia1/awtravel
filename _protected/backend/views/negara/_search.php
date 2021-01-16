<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NegaraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="negara-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ngr') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'slot_awal') ?>

    <?= $form->field($model, 'slot_max') ?>

    <?= $form->field($model, 'wtk_berangkat') ?>

    <?php // echo $form->field($model, 'wkt_plg') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'musim') ?>

    <?php // echo $form->field($model, 'biaya') ?>

    <?php // echo $form->field($model, 'ft_utama') ?>

    <?php // echo $form->field($model, 'id_inex') ?>

    <?php // echo $form->field($model, 'id_dp') ?>

    <?php // echo $form->field($model, 'id_iti') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
