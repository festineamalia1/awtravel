<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BeritaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_berita') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'tgl') ?>

    <?= $form->field($model, 'berita') ?>

    <?= $form->field($model, 'id_admin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
