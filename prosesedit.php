<?php
include "koneksi.php";
if(isset($_POST['update'])){
				$ids = $_POST['ids'];
				$nama = $_POST['nama'];
				$no_telp = $_POST['no_telp'];
				$email = $_POST['email'];
				$no_id = $_POST['no_id'];
				$prov = $_POST['prov'];
				$kab = $_POST['kab'];
				$kec = $_POST['kec'];
				$kel = $_POST['kel'];
				$sekolah = $_POST['sekolah'];
				$jenis_masalah = $_POST['jenis_masalah'];
				$des_masalah = $_POST['des_masalah'];
				$status_lap = $_POST['status_lap'];

				
				// Cek apakah user ingin mengubah fotonya atau tidak
				if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
					// Ambil data foto yang dipilih dari form

					if (isset($_POST['ubah_lokasi'])) {
						$update = mysqli_query($koneksi, "UPDATE laporan SET nama='$nama', no_telp='$no_telp', email ='$email', no_id='$no_id', prov='$prov', kab='$kab', kec='$kec', kel='$kel', sekolah='$sekolah', jenis_masalah='$jenis_masalah', des_masalah='$des_masalah', status_lap='$status_lap' WHERE ids='$ids'") or die(mysqli_error());
							if($update){
								echo "<script>alert('Data Berhasil di Update!'); window.location = 'admin.php?module=admin'</script>";
							}else{
								echo "<script>alert('Data Gagal di Update!'); window.location = 'admin.php?module=admin'</script>";
							}
					}


					$foto = $_FILES['foto']['name'];
					$tmp = $_FILES['foto']['tmp_name'];
					
					// Rename nama fotonya dengan menambahkan tanggal dan jam upload
					$fotobaru = date('dmYHis').$foto;
					
					// Set path folder tempat menyimpan fotonya
					$path = "foto/".$fotobaru;

					if(move_uploaded_file($tmp, $path)){
						$sql = mysqli_query($koneksi, "SELECT * FROM laporan WHERE ids='$ids'");
						$row = mysqli_fetch_assoc($sql);

						// Cek apakah file foto sebelumnya ada di folder foto
						if(is_file("foto/".$row['foto'])) // Jika foto ada
							unlink("foto/".$row['foto']); // Hapus file foto sebelumnya yang ada di folder foto


				$update = mysqli_query($koneksi, "UPDATE laporan SET nama='$nama', no_telp='$no_telp', email ='$email', no_id='$no_id', sekolah='$sekolah', jenis_masalah='$jenis_masalah', des_masalah='$des_masalah', foto='$fotobaru', status_lap='$status_lap' WHERE ids='$ids'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Data Berhasil di Update!'); window.location = 'admin.php?module=admin'</script>";
				}else{
					echo "<script>alert('Data Gagal di Update!'); window.location = 'admin.php?module=admin'</script>";
				}
			}
		}elseif (isset($_POST['ubah_lokasi'])) {
			$update = mysqli_query($koneksi, "UPDATE laporan SET nama='$nama', no_telp='$no_telp', email ='$email', no_id='$no_id', prov='$prov', kab='$kab', kec='$kec', kel='$kel', sekolah='$sekolah', jenis_masalah='$jenis_masalah', des_masalah='$des_masalah', status_lap='$status_lap' WHERE ids='$ids'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Data Berhasil di Update!'); window.location = 'admin.php?module=admin'</script>";
				}else{
					echo "<script>alert('Data Gagal di Update!'); window.location = 'admin.php?module=admin'</script>";
				}
		}
		else
		{
			$update = mysqli_query($koneksi, "UPDATE laporan SET nama='$nama', no_telp='$no_telp', email ='$email', no_id='$no_id', sekolah='$sekolah', jenis_masalah='$jenis_masalah', des_masalah='$des_masalah', status_lap='$status_lap' WHERE ids='$ids'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Data Berhasil di Update!'); window.location = 'admin.php?module=admin'</script>";
				}else{
					echo "<script>alert('Data Gagal di Update!'); window.location = 'admin.php?module=admin'</script>";
				}
		}
	}
            ?>