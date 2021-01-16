<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BankTujuan */

$this->title = 'Create Bank Tujuan';
$this->params['breadcrumbs'][] = ['label' => 'Bank Tujuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-tujuan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
