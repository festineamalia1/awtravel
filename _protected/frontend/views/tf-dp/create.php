<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TfDp */

$this->title = 'Your Down Payment';
$this->params['breadcrumbs'][] = ['label' => 'Tf Dps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tf-dp-create">
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
    <?= $this->render('_form', [
        'model' => $model,
        'bank' => $bank,
    ]) ?>

</div>
