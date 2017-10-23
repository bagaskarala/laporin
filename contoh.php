<?php
   
  include("koneksi.php");
   
   
  $koneksi = koneksi_db();
  $sql  = "select * from laporin";
  $aksi = mysqli_query($sql,$koneksi);
   
  echo "<table align='center' border='1'>
        <tr>
         <td>No</td>
         <td>Gambar</td>
        </tr>";
         
  $no = 1;
  while($data = mysql_fetch_array($aksi)):?>
     <tr>
      <td>
       <?php echo $no; ?>
      </td>
      <td>
       <center>
         <img src="image/<?php echo $data['nama_image']; ?>" border="0"/> 
       </center>
      </td>
     </tr>
  <?php 
  $no++;
  endwhile;
  ?>
  </table>
