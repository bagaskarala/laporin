<html>
<head>
	<title>Aplikasi CRUD dengan PHP</title>
</head>
<body>
	<h1>Ubah Data Siswa</h1>
	
	<?php

	// Ambil data NIS yang dikirim oleh index.php melalui URL
	$nama = $_GET['nama'];
	
	// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
	$query = "SELECT * FROM pelapor WHERE nama='".$nama."'";
	$sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
	$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
	?>
	
	<form method="post" action="?module=<?php echo $_GET['module']; ?>&exe=proses_ubah&nama=<?php echo $nama; ?>" enctype="multipart/form-data">
	<table cellpadding="8">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
	</tr>
	<tr>
		<td>No Telepon</td>
		<td><input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><textarea name="email"><?php echo $data['email']; ?></textarea></td>
	</tr>
	<tr>
		<td>No Identitas</td>
		<td><input type="text" name="no_id" value="<?php echo $data['no_id']; ?>"></td>
	</tr>
	<tr>
		<td>Kabupaten</td>
		<td><input type="text" name="kab" value="<?php echo $data['kab']; ?>"></td>
	</tr>
	<tr>
		<td>Kecamatan</td>
		<td><input type="text" name="kec" value="<?php echo $data['kec']; ?>"></td>
	</tr>
	<tr>
		<td>Sekolah</td>
		<td><input type="text" name="sekolah" value="<?php echo $data['sekolah']; ?>"></td>
	</tr>
	<tr>
		<td>Jenis Permasalahan</td>
		<td><input type="text" name="jenis_masalah" value="<?php echo $data['jenis_masalah']; ?>"></td>
	</tr>
	<tr>
	<tr>
		<td>Deskripsi Permasalahan</td>
		<td><input type="text" name="des_masalah" value="<?php echo $data['des_masalah']; ?>"></td>
	</tr>
		<td>Bukti Foto</td>
		<td>
			<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
			<input type="file" name="bukti">
		</td>
	</tr>
	</table>
	
	<hr>
	<input type="submit" value="Ubah">
	<a href="index.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>
