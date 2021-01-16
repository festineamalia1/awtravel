<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbLevel */

$this->title = 'Update Tb Level: ' . $model->id_level;
$this->params['breadcrumbs'][] = ['label' => 'Tb Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_level, 'url' => ['view', 'id' => $model->id_level]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-level-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
