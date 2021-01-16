<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TfLunas */

$this->title = 'Create Tf Lunas';
$this->params['breadcrumbs'][] = ['label' => 'Tf Lunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tf-lunas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
