<html>
   <head>



   </head>
   <body>
     <h2 align="center">Perjanjian Kerjasama</h2>
     <h2 align="center">AW TOUR & TRAVEL</h2>
     <hr>


 <p>Bismillahirrohmanirrahim</p>
 <br>
 <p>
   Pada hari ini......., tanggal...., bulan......., tahun....... telah dilakukan Perjanjian Kerjasama bidang jasa biro perjalanan, antara PARA PIHAK di bawah ini :
 </p>
 <table>
    <tr>
    <td>Nama</td><td>:</td><td>  Ardy Putra Pratama</td>
    </tr>
     <tr>
    <td>Jabatan</td><td>:</td><td> Founder AW Tour and Travel</td>
    </tr>
     <tr>
    <td>Alamat</td><td>:</td><td> Jl. Affandi No.168, Santren, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta</td>
    </tr>
 </table>
 <p>Bertindak atas nama Perusahaan & Jabatan yang selanjutnya disebut sebagai Pihak Pertama</p>
  <table>
    <tr>
      <?php foreach($pst as $pst){?>
    <td>Nama</td><td>:</td><td><?=$pst['nama'];?></td>
   
    </tr>
    <tr>
      
    <td>Alamat</td><td>:</td><td><?=$pst['alamat'];?></td>
    <?php } ?>
    </tr>
 </table>
 <p>
   Dan secara Bersama-sama disebut PARA PIHAK terlebih dahulu menyatakan prinsip-prinsip atau pokok-pokok yang melatar belakangi perjanjian ini sebagai berikut :
 </p>

  <?php foreach($mou as $mou){?>
   <h4 align="center">PASAL <?=$mou['pasal'];?></h4>
   <br>
   <p>
     <?=$mou['ket'];?>
   </p>
   <?php } ?>
<table>
    <tr>   
 <td align="right">Yogyakarta,............................................</td>
    </tr>
</table>
<br><br><br><br>
<table>
<tr>
       <td><u>Ardy Putra Pratama</u></td>
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
        <?php foreach($pst2 as $pst2){?>
          <td><u><?=$pst2['nama'];?></u></td>
           <?php } ?>
     </tr>
   </table>
   <br>

  
   </body>
</html>