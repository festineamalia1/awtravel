<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TfLunas */

$this->title = 'Progres Lunas';
$this->params['breadcrumbs'][] = ['label' => 'Negara', 'url' => ['negara/index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="tf-lunas-view">
<?php foreach($dis as $dis){?>
    <?php if($dis['status']=='wait'){?>
    <div class="container">
    
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
<h2>ON PRORESS<h2>
  <br><h5>Total : <h5>
  <?php foreach($tot as $tot){?>
    <h1>Rp <?=number_format($tot['biaya'] * $tot['jml_org'],0,",",".");?>,-<h1>
  <?php } ?>
    
        <h3>Selamat Bukti Transfer Anda Berhasil Dikirim</h3>
        <p>Silahkan Menunggu Konfirmasi Pembayaran</p>
   
   
   
</div>


</div>
<?php }else if($dis['status']=='disapprove'){?>

<div class="container">
    
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
    <h2>MOHON DI CEK<h2>
  <br><h5>Total : <h5>
  <?php foreach($tot as $tot){?>
    <h1>Rp <?=number_format($tot['biaya'] * $tot['jml_org'],0,",",".");?>,-<h1>
  <?php } ?>
    
        <h3>Maaf Bukti Transfer yang anda kirimkan tidak dapat di terima</h3>
        <p>silahkan anda cek kembali jika terdapat kelasahan silahkan hubungi pihak bank terkait</p>
   
   
   
</div>
<?php }else{?>

<div class="container">
    
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
    	<h2>LUNAS<h2>
<br><h5>Total : <h5>
	<?php foreach($tot as $tot){?>
		<h1>Rp <?=number_format($tot['biaya'] * $tot['jml_org'],0,",",".");?>,-<h1>
	<?php } ?>
        <h3>Selamat Pembayaran Anda Telah di Setujui, </h3>
	<?php foreach($cash as $cash){?>
        <p>Anda juga mendapatkan cashback sebesar Rp.<?=$cash['cashback']?> dan akan di transferkembari ke rekeninganda paling lambat 3 hari. Jika dalan waktu 3 hari cashback belum kembali, anda dapat menghubungi kami</p>
   
   <?php } ?>

   <a href="http://localhost/yii2_host/index.php?r=tf-lunas/pdf" class="btn btn-success">Download Invoice</a>
   <a href="http://localhost/yii2_host/index.php?r=tf-lunas/pdf2" class="btn btn-success">Download MoU</a>
</div>

</div>

<?php } ?>
<?php } ?>

</div>
