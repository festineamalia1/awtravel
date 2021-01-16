<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TfLunas */

$this->title = 'Your Payment';
$this->params['breadcrumbs'][] = ['label' => 'Tf Lunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tf-lunas-create">
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
    <?= $this->render('_form', [
        'model' => $model,
        'bank'=> $bank,
    ]) ?>

</div>
