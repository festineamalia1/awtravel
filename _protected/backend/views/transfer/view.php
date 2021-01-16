<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transfer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transfer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_transfer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_transfer], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php foreach($dis as $dis){?>
        <?php if($dis['status']=='approve'){?>
 <a href="http://localhost/yii2_host/admin/index.php?r=transfer%2Fpush" class="btn btn-primary btn-block">kirim</a>
 <?php }else if($dis['status']=='disapprove'){?>
    <a href="http://localhost/yii2_host/admin/index.php?r=transfer%2Fpush2" class="btn btn-primary btn-block">kirim</a>
    <?php } ?>
<?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_transfer',
            'besar',
            'ft_trans',
            'name',
            'nm_rek',
            'cicilan_ke',
            'id_bank_tjn',
            'id_user',
            'status',
            'tgl',
        ],
    ]) ?>

</div>
