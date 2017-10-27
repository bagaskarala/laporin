<?php

$id = $_GET['id'];

// Ambil Data yang Dikirim dari Form
  $nama = $_POST['nama'];
  $no_telp = $_POST['no_telp'];
  $email = $_POST['email'];
  $no_id = $_POST['no_id'];
  $kab = $_POST['kab'];
  $kec = $_POST['kec'];
  $sekolah = $_POST['sekolah'];
  $jenis_masalah = $_POST['jenis_masalah'];
  $des_masalah = $_POST['des_masalah'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
	// Ambil data foto yang dipilih dari form
	$bukti = $_FILES['bukti']['name'];
	$tmp = $_FILES['bukti']['tmp_name'];
	
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$buktibaru = date('dmYHis').$bukti;
	
	// Set path folder tempat menyimpan fotonya
	$path = "images/".$buktibaru;

	// Proses upload
	if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
		$query = "SELECT * FROM pelapor WHERE id='".$id."'";
		$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

		// Cek apakah file foto sebelumnya ada di folder images
		if(is_file("images/".$data['bukti'])) // Jika foto ada
			unlink("images/".$data['bukti']); // Hapus file foto sebelumnya yang ada di folder images
		
		// Proses ubah data ke Database
		$query = "UPDATE pelapor SET nama='".$nama."', no_telp='".$no_telp."', email='".$email."', no_id='".$no_id."', kab='".$kab."', kec='".$kec."', sekolah='".$sekolah."', jenis_masalah='".$jenis_masalah."', des_masalah='".$des_masalah."', bukti='".$buktibaru."' WHERE id='".$id."'";
		$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ 
		?>
         <script>
        alert('Data berhasil disimpan !');
        window.location = "?module=pelapor";
      </script> 
      <?php
		}else{
			// Jika Gagal, Lakukan :
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='modules/mod_pelapor/form_ubah.php'>Kembali Ke Form</a>";
		}
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='modules/mod_pelapor/form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
	$query = "UPDATE pelapor SET nama='".$nama."', no_telp='".$no_telp."', email='".$email."', no_id='".$no_id."', kab='".$kab."', kec='".$kec."', sekolah='".$sekolah."', jenis_masalah='".$jenis_masalah."', des_masalah='".$des_masalah."', bukti='".$buktibaru."' WHERE id='".$id."'";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){
		?>
         <script>
        alert('Data berhasil diubah !');
        window.location = "?module=pelapor";
      </script> 
      <?php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='modules/mod_pelapor/form_ubah.php'>Kembali Ke Form</a>";
	}
}
?>
