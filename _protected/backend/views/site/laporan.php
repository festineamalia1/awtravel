<html>
   <head>
    
   </head>
   <body>
    <?php foreach($ngr as $ngr){?>
      <h3><?=$ngr['name']?>, <?=$ngr['wtk_berangkat']?> - <?=$ngr['wkt_plg']?></h3>
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
                    <td><?=$ngr['nama']?></td>
                    <td><?=number_format($ngr['dp'],0,",",".");?></td>
                    <td><?=$ngr['totf']?></td>
                    <td><?=$ngr['biaya']?></td>
                    <td><?=$ngr['biaya']?></td>
                    <td><?=$ngr['status']?></td>

                   

                 </tr>
                     
                      <tr>
                        <?php
                         $totalf=0;
                         $totdp=0;
                         $totln=0;
                      
                          $totalf += number_format($ngr['totf'],0,",",".");
                          $totdp += $ngr['dp'];
                          $totln += $ngr['biaya'];
                          ?>
                         <td colspan="2">Total Pemasukan</td>
                         <td><?=number_format($totdp,0,",",".");?></td>
                         <td><?=$totalf?></td>
                         <td><?=$totln?></td>
                      
                      </tr>
                    

                 </tbody>
                 
                     
                
                  
                
              
              </table>
    
  <?php }?>
<div class="row">
            <div class="box">
            <div class="box-header with-border">
              <h1 class="box-title">Itinerary</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
                
           
                    
<?php foreach($iti as $i){?> 
              <table class="table table-bordered">
                <thead>
                  
                  <tr>
                  
                  <th colspan="3"><?=$i['name']?></th>
                 
                  
                  
                </tr>
                <tr>
                  
                  <th>Day</th>
                  <th>Kunjungan</th>
                  <th>Biaya</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                   
                 <tr>
                      
                    <td><?=$i['hari']?></td>
                    <td><?=$i['kunjungan']?></td>
                    <td><?=$i['biaya']?></td>

                 </tr>
                       

                 </tbody>
                 
                     
                
                  
               
              
              </table>
    <?php }?>
            </div>
            <!-- /.box-body -->
           
        </div>

    </div>
   </body>
</html>