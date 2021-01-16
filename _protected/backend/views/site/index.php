<?php

/* @var $this yii\web\View */
use kartik\sidenav\SideNav;

$this->title = 'Selamat Datang';
?>




<div class="site-index">



   

    <div class="body-content">





 <div class="row">
            <div class="box">
            <div class="box-header with-border">
              <h1 class="box-title">Laporan Transaksi</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
    <?php foreach($ngr3 as $ngr3){?>
      <h3><?=$ngr3['name']?>, <?=$ngr3['wtk_berangkat']?> - <?=$ngr3['wkt_plg']?></h3>
      <table class="table table-bordered">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Jumlah DP</th>
                  <th>Jumlah Cicilan</th>
                  <th>Jumlah Lunas</th>
                  <th>Kewajiban</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  
                    <?php
  $no_urut = 0;
  
  $no_urut++;
  ?>
                 <tr>
                     
                    <td><?=$no_urut?>.</td>
                    <td><?=$ngr3['nama']?></td>
                    <td>Rp. <?=number_format($ngr3['dp'],0,",",".");?>,-</td>
                    <td>Rp. <?=number_format($ngr3['totf'],0,",",".");?>,-</td>
                    <td>Rp. <?=number_format($ngr3['biaya'],0,",",".");?>,-</td>
                   <td>Rp. <?=number_format($ngr3['biaya'],0,",",".");?>,-</td>
             
                    <td><?=$ngr3['status']?></td>

                   

                 </tr>
                     
                      <tr>
                        <?php
                         $totalf=0;
                         $totdp=0;
                         $totln=0;
                      
                          $totalf += $ngr3['totf'];
                          $totdp += $ngr3['dp'];
                          $totln += $ngr3['biaya'];
                          ?>
                         <td colspan="2">Total Pemasukan</td>
                         <td>Rp. <?=number_format($totdp,0,",",".");?>,-</td>
                         <td>Rp. <?=number_format($totalf,0,",",".")?>,-</td>
                         <td>Rp. <?=number_format($totln,0,",",".")?>,-</td>
                       
                      </tr>
                    

                 </tbody>
                 
                     
                
                  
                
              
              </table>
    
  <?php }?>
  <br>
  <a href="http://localhost/yii2_host/admin/index.php?r=site%2Flaporanpdf" class="btn btn-primary btn-block">Cetak Laporan</a>
            </div>
            <!-- /.box-body -->
           
        </div>

    </div>






</div>

