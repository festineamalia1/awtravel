<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DtTransaksi */

$this->title = $model->id_det_tr;
$this->params['breadcrumbs'][] = ['label' => 'Dt Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dt-transaksi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_det_tr], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_det_tr], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php foreach($dis as $dis){?>
        <?php if($dis['status']=='lunas'){?>
 <a href="http://localhost/yii2_host/admin/index.php?r=dt-transaksi%2Fpush" class="btn btn-primary btn-block">kirim</a>
 <?php }else if($dis['status']=='belum lunas'){?>
    <a href="http://localhost/yii2_host/admin/index.php?r=dt-transaksi%2Fpush2" class="btn btn-primary btn-block">kirim</a>
    <?php } ?>
<?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_det_tr',
            'tgl',
            'jml_org',
            'wkt_cicil',
            'status',
            'id_ngr',
            'id_bank_tjn',
            'id_user',
        ],
    ]) ?>

</div>
