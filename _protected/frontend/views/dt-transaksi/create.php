<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DtTransaksi */

$this->title = 'Book Your Trip';
$this->params['breadcrumbs'][] = ['label' => 'Dt Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dt-transaksi-create">

    <div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
          'ngr' => $ngr,
            'bank' => $bank,
    ]) ?>

</div>
