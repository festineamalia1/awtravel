<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TfDp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tf Dps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tf-dp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tfdp], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tfdp], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php foreach($dis as $dis){?>
        <?php if($dis['status']=='approve'){?>
 <a href="http://localhost/yii2_host/admin/index.php?r=tf-dp%2Fpush" class="btn btn-primary btn-block">kirim</a>
 <?php }else if($dis['status']=='disapprove'){?>
    <a href="http://localhost/yii2_host/admin/index.php?r=tf-dp%2Fpush2" class="btn btn-primary btn-block">kirim</a>
    <?php } ?>
<?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tfdp',
            'ft_dp',
            'name',
            'nm_rek',
            'id_bank_tjn',
            'id_user',
            'status',
            'tgl',
        ],
    ]) ?>

</div>
