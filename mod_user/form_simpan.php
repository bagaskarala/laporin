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
    <td><input type="text" name="Nama"></td>
  </tr>
  <tr>
    <td>No Telepon</td>
    <td><input type="text" name="No_Telepon"></td>
  </tr>
  <tr>
    <td>Email</td>
        <td><input type="text" name="Email"></td>
  <!-- <td>
    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
    </td> -->
  </tr>
  <tr>
    <td>No Identitas</td>
    <td><input type="text" name="No_Identitas"></td>
  </tr> 
  <tr>
    <td>Kabupaten</td>
    <td><input type="text" name="Kabupaten"></td>
  </tr>
 <tr>
    <td>Kecamatan</td>
    <td><input type="text" name="Kecamatan"></td>
  </tr>
 <tr>
    <td>Sekolah</td>
    <td><input type="text" name="Sekolah"></td>
  </tr>
  
  <tr>
    <td>Jenis Permasalahan</td>
    <td><input type="text" name="Jenis_Permasalahan"></td>
  </tr>

  <tr>
    <td>Deskripsi Permasalahan</td>
    <td><textarea name="Deskripsi_Permasalahan"></textarea></td>
  </tr>

  <tr>
    <td>Bukti</td>
    <td><input type="file" name="Bukti"></td>
  </tr>
  </table>
  
  <hr>
  <input type="submit" value="Simpan">
  <a href="index.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>