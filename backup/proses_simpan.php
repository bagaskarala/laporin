<?php
// Load file konek.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
$no_id = $_POST['no_id'];
$kab = $_POST['kab'];
$kec = $_POST['kec'];
$sekolah = $_POST['sekolah'];
$Jenis_masalah = $_POST['jenis_masalah'];
$des_masalah = $_POST['des_masalah'];
$bukti = $_FILES['bukti']['name'];
$tmp = $_FILES['bukti']['tmp_name'];
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$buktibaru = date('dmYHis').$bukti;
// Set path folder tempat menyimpan fotonya
$path = "images/".$buktibaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO pelapor VALUES('".$nama."', '".$no_telp."', '".$email."', '".$no_id."', '".$kab."', '".$kec
  ."', '".$sekolah."', '".$Jenis_masalah."', '".$des_masalah."', '".$buktibaru."')";
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