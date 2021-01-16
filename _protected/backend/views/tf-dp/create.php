<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TfDp */

$this->title = 'Create Tf Dp';
$this->params['breadcrumbs'][] = ['label' => 'Tf Dps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tf-dp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
