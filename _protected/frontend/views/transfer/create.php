<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Transfer */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Progres', 'url' => ['view', 'id' => Yii::$app->user->id]];

	$this->render('tab');
?>
<div class="transfer-create">
	<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
    <?= $this->render('_form', [
        'model' => $model,
        'bank'=> $bank,
    ]) ?>

</div>
