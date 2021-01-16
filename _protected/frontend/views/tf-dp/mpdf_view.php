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
  	
  	<td>Uang Sejumlah</td>
  	 <?php foreach($tot as $tot){?>
    <td> : Rp <?=number_format($tot['dp'] * $tot['jml_org'],0,",",".");?>,-</td>
<?php }?>
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
    <th>No</th>
    <th>Keterangan</th>
    <th>Jumlah</th>
  </tr>
  <?php
  $no_urut = 0;
  
  $no_urut++;
  ?>
  <tr >
    <td align="center"><?=$no_urut?></td>
    <?php foreach($negara as $ngr){?>
    <td align="center"> Pembayaran DP Tour <?=$ngr['name']?> </td>
    <?php }?>
    <?php foreach($total as $total){?>
    <td align="center">Rp <?=number_format($total['dp'] * $total['jml_org'],0,",",".");?>,-</td>
<?php }?>
  </tr>

 <tr>
    <th colspan="2">Total</th>
    <th>Rp <?=number_format($total['dp'] * $total['jml_org'],0,",",".");?>,-</th> 
    
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