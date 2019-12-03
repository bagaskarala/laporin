<?php include "koneksi.php"; ?>
<?php
             
				$id = $_GET['id'];
				$cek = mysqli_query($koneksi, "SELECT * FROM laporan WHERE ids='$id'");
				$row = mysqli_fetch_assoc($cek);
				if(mysqli_num_rows($cek) == 0){
					echo "<script>alert('Data Tidak ditemukan di Update!'); window.location = 'admin.php?module=admin'</script>";
				}else{
					// Cek apakah file fotonya ada di folder foto
					if(is_file("foto/".$row['foto'])) // Jika foto ada
						unlink("foto/".$row['foto']); // Hapus file fotonya yang ada di folder foto
					$delete = mysqli_query($koneksi, "DELETE FROM laporan WHERE ids='$id'");
					if($delete){
						echo "<script>alert('Data Berhasil di Hapus!'); window.location = 'admin.php?module=admin'</script>";
					}else{
						echo "<script>alert('Data Gagal di Hapus!'); window.location = 'admin.php?module=admin'</script>";
					}
				}
			
			?>