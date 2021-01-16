<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Negara */

$this->title = 'Tambah Negara';
$this->params['breadcrumbs'][] = ['label' => 'Negara', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negara-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
