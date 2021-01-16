<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mou */

$this->title = 'Update Mou: ' . $model->id_mou;
$this->params['breadcrumbs'][] = ['label' => 'Mous', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_mou, 'url' => ['view', 'id' => $model->id_mou]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mou-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
