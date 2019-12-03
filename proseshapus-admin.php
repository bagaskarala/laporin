<?php include "koneksi.php"; ?>
<?php
             
				$id = $_GET['id'];
				$cek = mysqli_query($koneksi, "SELECT * FROM login WHERE ids='$id'");
				$row = mysqli_fetch_assoc($cek);
				if(mysqli_num_rows($cek) == 0){
					echo "<script>alert('Data Tidak ditemukan di Update!'); window.location = 'admin.php?module=data-admin'</script>";
				}else{
					// Cek apakah file fotonya ada di folder foto
					
					$delete = mysqli_query($koneksi, "DELETE FROM login WHERE ids='$id'");
					if($delete){
						echo "<script>alert('Data Berhasil di Hapus!'); window.location = 'admin.php?module=data-admin'</script>";
					}else{
						echo "<script>alert('Data Gagal di Hapus!'); window.location = 'admin.php?module=data-admin'</script>";
					}
				}
			
			?>