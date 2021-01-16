$this->title = 'Progres Pebayaran';
//$this->params['breadcrumbs'][] = ['label' => 'Negara', 'url' => ['negara/index']];
$this->params['breadcrumbs'][] = ['label' => 'Upload Bukti Transfer', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;


<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transfer */

$this->title = 'Progres Pebayaran';
//$this->params['breadcrumbs'][] = ['label' => 'Negara', 'url' => ['negara/index']];
$this->params['breadcrumbs'][] = ['label' => 'Upload Bukti Transfer', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transfer-view">
 <div class="container">

    <?php foreach($status as $status){ ?>
        <?php if($status['status']=='lunas'){?>
           <?php foreach($tot as $tot){ ?>
            <h2>LUNAS</h2>
        <h4>Total : Rp <?=number_format($tot['biaya'] * $tot['jml_org'],0,",",".");?>,-</h4>
          <h4>Down Payment : Rp <?=number_format($tot['dp'] * $tot['jml_org'],0,",",".");?>,-</h4>
            <h4>Total Cicilan : Rp <?=number_format(($tot['biaya'] * $tot['jml_org'])-($tot['dp'] * $tot['jml_org']),0,",",".");?>,-</h4>
             <?php foreach($totci as $totci){ ?>
                <h4>Sudah Dibayar : Rp <?=number_format($totci['total'],0,",",".");?>,-</h4>
            <h4>Sisa Cicilan : Rp <?=number_format((($tot['biaya'] * $tot['jml_org'])-($tot['dp'] * $tot['jml_org']))-$totci['total'],0,",",".");?>,-</h4>
            <?php } ?>
  <?php } ?>
           <p>
 <a href="http://localhost/yii2_host/index.php?r=tf-lunas/pdf2" class="btn btn-primary btn-block">Download MoU</a>
 </p>
     <?php }else{?>
      <?php foreach($tot2 as $tot2){ ?>
        <h2>ON PRORESS</h2>
        <h4>Total : Rp <?=number_format($tot2['biaya'] * $tot2['jml_org'],0,",",".");?>,-</h4>
        <h4>Down Payment : Rp <?=number_format($tot2['dp'] * $tot2['jml_org'],0,",",".");?>,-</h4>
            <h4>Total Cicilan : Rp <?=number_format(($tot2['biaya'] * $tot2['jml_org'])-($tot2['dp'] * $tot2['jml_org']),0,",",".");?>,-</h4>
              <?php foreach($totci2 as $totci2){ ?>
                <h4>Sudah Dibayar : Rp <?=number_format($totci2['total2'],0,",",".");?>,-</h4>
            <h4>Sisa Cicilan : Rp <?=number_format((($tot2['biaya'] * $tot2['jml_org'])-($tot2['dp'] * $tot2['jml_org']))-$totci2['total2'],0,",",".");?>,-</h4>
            <?php } ?>
  <?php } ?>
  <?php } ?>
      <?php } ?>

<hr>
<h2 align="center">Your Down Payment</h2>
<hr>
<?php foreach($totdp as $totdp){?>
  <div class="container">
    
<div class="col-md-12 col-md-offset-0 heading2 animate-box">
      <h2>LUNAS<h2>
<br><h5>Total : <h5>

    <h1>Rp <?=number_format($totdp['dp'] * $totdp['jml_org'],0,",",".");?>,-<h1>

        <h3>Selamat Pembayaran Anda Telah di Setujui, </h3>
  

   <a href="http://localhost/yii2_host/index.php?r=tf-dp%2Fpdf" class="btn btn-success">Download Invoice</a>
   
</div>

</div>
  <?php } ?>
<hr>
<h2 align="center">Your Installment</h2>
<hr>
   <?php foreach($data as $data){ ?>
   
    <h4>Cicilan Ke : <?=$data['cicilan_ke'];?></h4>
    <div class="col-md-12 col-md-offset-0 heading2 animate-box">
    <?php if($data['status']=='wait'){?>
    <h2>ON PRORESS</h2>
   <?php }else if($data['status']=='disapprove'){ ?>
    <h2>MOHON DI CEK</h2>
    <?php }else{?>
      <h2>LUNAS</h2>
    <?php } ?>
    <p>Total :</p>
    <h1>Rp <?=number_format($data['besar'],0,",",".");?>,-</h1>
     <?php if($data['status']=='wait'){?>
     <h3>Selamat Bukti Transfer Anda Berhasil Dikirim</h3>
        <p>Silahkan Menunggu Konfirmasi Pembayaran</p>
   <?php }else if($data['status']=='disapprove'){ ?>
    <h3>Maaf Bukti Transfer yang anda kirimkan tidak dapat di terima</h3>
        <p>silahkan anda cek kembali jika terdapat kelasahan silahkan hubungi pihak bank terkait</p>
    <?php }else{?>
        <h3>Selamat Pembayaran Anda Telah di Setujui, </h3>
  

   <a href="http://localhost/yii2_host/index.php?r=transfer/pdf" class="btn btn-success">Download Invoice</a>
 
    <?php } ?>
    </div>

 
 <?php } ?>
 </div>
</div>
