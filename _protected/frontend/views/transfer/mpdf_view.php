<html>
   <head>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

 th {
  border: 1px solid #dddddd;
  background-color: #dddddd
  text-align: left;
  padding: 8px;
}


</style>
   </head>
   <body>
     <h2 align="center">INVOICE PEMBAYARAN</h2>
     <hr>

<table>
 <tr>
    <td>Telah terima dari</td>
    <?php foreach($nama as $nama){?>
    <td> : <?=$nama['nama'];?></td>
<?php } ?>
  </tr>
  <tr>
    
   
  </tr>
  <tr>
    <td>Jenis Pembayaran</td>
 <?php foreach($banktjn as $bank){?>
    <td> : Transfer Bank [<?=$bank['nm_bank']?>]</td>
  <?php }?>
  </tr>
  </table>
  <br>
<table>
  <tr>
  
    <th>Keterangan</th>
    <th>Jumlah</th>
  </tr>
 
  
  <?php foreach($cicil as $cicil){?>
    <tr>
     
    <td align="center"> Cicilan Ke <?=$cicil['cicilan_ke']?></td>
    <td align="center"><?=$cicil['besar']?></td>
  </tr>
  <?php }?>
    
  
    <?php foreach($tcicil as $tcicil){?>
     <tr>
    <th>Total</th>
    <th>Rp <?=number_format($tcicil['totf']);?>,-</th> 
    <?php }?>
  </tr>
</table>
<br>
<table>
 <tr>
    <td>Status</td>
    <td> : LUNAS</td>
 
 </tr>
 
  </table>
  <br><br>
  <table>
    <tr>   
 <td align="right">Yogyakarta,............................................</td>
    </tr>

   </table>
   <br><br><br><br><br>
  <table>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>

      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
  <td style="border">AWSubs Travel</td>
 </tr>
  </table>
   </body>
</html>