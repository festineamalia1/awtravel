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
 <?php foreach($tot as $tot){?>
   
    <?php if($tot['status']=='wait'){?>
    <div class="container">
    
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
<h2>ON PRORESS<h2>
  <br><h5>Total : <h5>
 
    <h1>Rp <?=number_format($tot['dp'] * $tot['jml_org'],0,",",".");?>,-<h1>

    
        <h3>Selamat Bukti Transfer Anda Berhasil Dikirim</h3>
        <p>Silahkan Menunggu Konfirmasi Pembayaran</p>
   
   
   
</div>


</div>
<?php }else if($tot['status']=='disapprove'){?>

<div class="container">
    
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
    <h2>MOHON DI CEK<h2>
  <br><h5>Total : <h5>
 
    <h1>Rp <?=number_format($tot['dp'] * $tot['jml_org'],0,",",".");?>,-<h1>
  
    
        <h3>Maaf Bukti Transfer yang anda kirimkan tidak dapat di terima</h3>
        <p>silahkan anda cek kembali jika terdapat kelasahan silahkan hubungi pihak bank terkait</p>
   
   
   
</div>
<?php }else{?>

<div class="container">
    
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
    	<h2>LUNAS<h2>
<br><h5>Total : <h5>

		<h1>Rp <?=number_format($tot['dp'] * $tot['jml_org'],0,",",".");?>,-<h1>

        <h3>Selamat Pembayaran Anda Telah di Setujui, </h3>
	

   <a href="http://localhost/yii2_host/index.php?r=tf-dp%2Fpdf" class="btn btn-success">Download Invoice</a>
   <a href="http://localhost/yii2_host/index.php?r=transfer%2Fcreate" class="btn btn-success">go to your payment</a>
</div>

</div>

<?php } ?>
<?php } ?>

</div>