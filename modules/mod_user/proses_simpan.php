<?php
// Load file konek.php
include "konek.php";
// Ambil Data yang Dikirim dari Form
$Nama = $_POST['Nama'];
$No_Telepon = $_POST['No_Telepon'];
$Email = $_POST['Email'];
$No_Identitas = $_POST['No_Identitas'];
$Kabupaten = $_POST['Kabupaten'];
$Kecamatan = $_POST['Kecamatan'];
$Sekolah = $_POST['Sekolah'];
$Jenis_Permasalahan = $_POST['Jenis_Permasalahan'];
$Deskripsi_Permasalahan = $_POST['Deskripsi_Permasalahan'];
$Bukti = $_FILES['Bukti']['name'];
$tmp = $_FILES['Bukti']['tmp_name'];
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$BuktiBaru = date('dmYHis').$Bukti;
// Set path folder tempat menyimpan fotonya
$path = "images/".$BuktiBaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO pelapor VALUES('".$Nama."', '".$No_Telepon."', '".$Email."', '".$No_Identitas."', '".$Kabupaten."', '".$Kecamatan."', '".$Sekolah."', '".$Jenis_Permasalahan."', '".$Deskripsi_Permasalahan."', '".$BuktiBaru."')";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: index.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>