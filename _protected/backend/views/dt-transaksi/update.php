<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DtTransaksi */

$this->title = 'Update Dt Transaksi: ' . $model->id_det_tr;
$this->params['breadcrumbs'][] = ['label' => 'Dt Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_det_tr, 'url' => ['view', 'id' => $model->id_det_tr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dt-transaksi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
