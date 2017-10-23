<html>
<head>
  <title>Laporin</title>
</head>
<body>
  <h1>Input Laporan</h1>
  <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
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
  <input type="submit" value="Simpan">
  <a href="index.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>