<html>
   <head>
   	<style>
table{
    /*border: thin solid black;*/
    border-collapse: collapse;
    width: 100%;
  }
  table tr th{
    border: 0.01pt solid black;
    border-top: 0.01pt solid black ;
    font-weight: bold;
    text-align: center;
    padding: 10px;
  }
  table tr td{
    border: 0.01pt solid black;
    padding: 10px;
  }


</style>
   </head>
   <body>
     <h2 align="center">LAPORAN TRANSAKSI</h2>
    <hr>
     <?php foreach($ngr3 as $ngr3){?>
      <h3><?=$ngr3['name']?>, <?=$ngr3['wtk_berangkat']?> - <?=$ngr3['wkt_plg']?></h3>
    <table>
      <th>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Jumlah DP</th>
                  <th>Jumlah Cicilan</th>
                  <th>Jumlah Lunas</th>
                  <th>Kewajiban</th>
                  <th>Status</th>
                </tr>
      </th>
      <tb>
                  
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
                    

                 </tb>
    </table>
      <?php }?>
   </body>
</html>