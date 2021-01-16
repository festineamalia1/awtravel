<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mou */

$this->title = 'Create Mou';
$this->params['breadcrumbs'][] = ['label' => 'Mous', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mou-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
