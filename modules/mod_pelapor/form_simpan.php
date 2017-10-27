<html>
<head>
  <title>Laporin</title>
</head>
<body>
  <h1>Input Laporan</h1>
  <form method="post" enctype="multipart/form-data">
  <table cellpadding="8">
  <tr>
    <td>Nama Lengkap</td>
    <td><input type="text" name="nama"></td>
  </tr>
  <tr>
    <td>No Telepon</td>
    <td><input type="text" name="no_telp"></td>
  </tr>
  <tr>
    <td>Email</td>
        <td><input type="text" name="email"></td>
  <!-- <td>
    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
    </td> -->
  </tr>
  <tr>
    <td>No Identitas</td>
    <td><input type="text" name="no_id"></td>
  </tr> 
  <tr>
    <td>Kabupaten</td>
    <td><input type="text" name="kab"></td>
  </tr>
 <tr>
    <td>Kecamatan</td>
    <td><input type="text" name="kec"></td>
  </tr>
 <tr>
    <td>Sekolah</td>
    <td><input type="text" name="sekolah"></td>
  </tr>
  
  <tr>
    <td>Jenis Permasalahan</td>
    <td><input type="text" name="jenis_masalah"></td>
  </tr>

  <tr>
    <td>Deskripsi Permasalahan</td>
    <td><textarea name="des_masalah"></textarea></td>
  </tr>

  <tr>
    <td>Bukti Foto</td>
    <td><input type="file" name="bukti"></td>
  </tr>
  </table>
  
  <hr>
  <input type="submit" name="simpan" value="Simpan">
  <a href="index.php"><input type="button" value="Batal"></a>
  <a href='view_image.php'>Link ini</a>
  </form>
</body>
</html>
<?php
if(isset($_POST['simpan'])){
  $id= $_POST['id'];
  $nama = $_POST['nama'];
  $no_telp = $_POST['no_telp'];
  $email = $_POST['email'];
  $no_id = $_POST['no_id'];
  $kab = $_POST['kab'];
  $kec = $_POST['kec'];
  $sekolah = $_POST['sekolah'];
  $jenis_masalah = $_POST['jenis_masalah'];
  $des_masalah = $_POST['des_masalah'];
  $bukti = $_FILES['bukti']['name'];
  $tmp = $_FILES['bukti']['tmp_name'];

  
  $buktibaru = date('dmYHis').$bukti;
  // Set path folder tempat menyimpan fotonya
  $path = "images/bukti/".$buktibaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database 

   $query = "INSERT INTO pelapor (nama,no_telp,email,no_id,kab,kec,sekolah,jenis_masalah,des_masalah,bukti) VALUES('".$nama."', '".$no_telp."', '".$email."', '".$no_id."', '".$kab."', '".$kec."', '".$sekolah."', '".$jenis_masalah."', '".$des_masalah."', '" .$buktibaru."')";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      ?>
         <script>
        alert('Data berhasil disimpan !');
        window.location = "?module=pelapor";
      </script> 
      <?php
    
    }
  }
}

  ?>