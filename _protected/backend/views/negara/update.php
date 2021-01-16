<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Negara */

$this->title = 'Ubah Data Negara: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Negaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_ngr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="negara-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
