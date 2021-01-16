<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbLevel */

$this->title = 'Create Tb Level';
$this->params['breadcrumbs'][] = ['label' => 'Tb Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-level-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
