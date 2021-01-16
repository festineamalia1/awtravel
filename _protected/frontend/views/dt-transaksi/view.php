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

   

    
<div class="container">
     
<?php foreach($cicil as $cicil){?>
<?php if($cicil['wkt_cicil']==0){?>
	<h1>Total Pembayaran</h1>
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
    <?php foreach($data as $r){?>
        <h3> Rp <?=number_format($r['biaya'] * $r['jml_org'],0,",",".");?>,-</h3>
        <p>waktu Pembayaran maksimal 24 jam setelah melakukan persetujuan pembayaran</p>
    <?php } ?>
   
   
</div>
<h1>Tujuan Pembayaran</h1>
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
    <?php foreach($banktjn as $b){?>
    <h3><?=$b['nm_bank']?></h3>
    <h4>Nomor Rekening : <?=$b['nomor_rek']?></h4>
    <h4>Atas Nama : <?=$b['nama_rek']?></h4>
<?php } ?>
 <p>

 <a href="http://localhost/yii2_host/index.php?r=tf-lunas%2Fcreate" class="btn btn-primary btn-block">Tranfer Sekarang</a>
 </p>
<?php }else{?>
	<h1>Total Pembayaran</h1>
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
    <?php foreach($data as $r){?>
    	<p>Total : </p>
        <h3> Rp <?=number_format($r['biaya'] * $r['jml_org'],0,",",".");?>,-</h3>

        <p>dengan Pembayaran Down Payment sebesar</p> <h3>Rp <?=number_format($r['dp'] * $r['jml_org'],0,",",".");?>,-</h3>
        <p>yang setelahnya anda dapat melakukan pembayaran sesuai denan waktu cicilan yan anda pilih</p>
    <?php } ?>
   
   
</div>
<h1>Tujuan Pembayaran</h1>
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
    <?php foreach($banktjn as $b){?>
    <h3><?=$b['nm_bank']?></h3>
    <h4>Nomor Rekening : <?=$b['nomor_rek']?></h4>
    <h4>Atas Nama : <?=$b['nama_rek']?></h4>
<?php } ?>
 <p>
 <a href="http://localhost/yii2_host/index.php?r=tf-dp%2Fcreate" class="btn btn-primary btn-block">go to your Down Payment</a>
 </p>
<?php } ?>
<?php }?>
</div>

</div>

</div>
