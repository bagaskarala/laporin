<?php
if(isset($_GET['module'])) $mod = $_GET['module'];
else $mod = '';

?>
<html>
<head>
  <title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>
</head>
<body>
  <h1>Data Siswa</h1>
  <a href="?module=<?php echo $mod ?>&exe=tambah">Tambah Data</a><br><br>
  <table border="1" width="100%">
  <tr>
    <th>Id</th>
    <th>Nama</th>
    <th>No Telepon</th>
    <th>Email</th>
    <th>No Identitas</th>
    <th>Kabupaten</th>
    <th>Kecamatan</th>
    <th>Sekolah</th>
    <th>Jenis Permasalahan</th>
    <th>Deskripsi  Permasalahan</th>
    <th>Bukti</th>
    <th colspan="2">Aksi</th>
  </tr>

  <?php
  
  $query = "SELECT * FROM pelapor"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
  
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$data['id']."</td>";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['no_telp']."</td>";
    echo "<td>".$data['email']."</td>";
    echo "<td>".$data['no_id']."</td>";
    echo "<td>".$data['kab']."</td>";
    echo "<td>".$data['kec']."</td>";
    echo "<td>".$data['sekolah']."</td>";
    echo "<td>".$data['jenis_masalah']."</td>";
    echo "<td>".$data['des_masalah']."</td>";
    echo "<td><img src='images/bukti/".$data ['bukti']."' width='100' height='100'></td>";
    echo "<td><a href='?module=".$mod."&exe=ubah&id=".$data['id']."'>Ubah</a></td>";
    echo "<td><a href='?module=".$mod."&exe=proses_hapus&id=".$data['id']."'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
</body>
</html>