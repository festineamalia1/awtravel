<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TfLunas */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tf Lunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tf-lunas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tf_lunas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tf_lunas], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php foreach($dis as $dis){?>
        <?php if($dis['status']=='approve'){?>
 <a href="http://localhost/yii2_host/admin/index.php?r=tf-lunas%2Fpush" class="btn btn-primary btn-block">kirim</a>
 <?php }else if($dis['status']=='disapprove'){?>
    <a href="http://localhost/yii2_host/admin/index.php?r=tf-lunas%2Fpush2" class="btn btn-primary btn-block">kirim</a>
    <?php } ?>
<?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tf_lunas',
            'ft_lunas',
            'name',
            'nm_rek',
            'id_bank_tjn',
            'id_user',
            'cashback',
            'status',
            'tgl',
        ],
    ]) ?>

</div>
