<?php
include "koneksi.php";

$ids=$_POST['ids'];
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$jenis_masalah=$_POST['jenis_masalah'];
$des_masalah=$_POST['des_masalah'];

$status_lap='selesai';

$to=$email;

$message="Halo $name <br><br> Menanggapi laporan di LAPORIN.GA dengan ID $ids =: <br>
<div>
Jenis Masalah = $jenis_masalah <br>
Deskripsi Masalah = <br>
$des_masalah
</div>
<hr><br>  ".$message;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: <admin@laporin.ga>' . "\r\n";
// $headers .= 'Cc: admin@laporin.ga' . "\r\n";
@mail($to,$subject,$message,$headers);
if(@mail)
{
echo "<script>alert('Tanggapan berhasil dikirim'); window.location = 'admin.php?module=admin&exe=detail&id=$ids'</script>";	
}

$update = mysqli_query($koneksi, "UPDATE laporan SET status_lap='$status_lap' WHERE ids='$ids'") or die(mysqli_error());
?>