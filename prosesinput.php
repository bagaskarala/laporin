<?php include "koneksi.php"; ?>
<?php
			if(isset($_POST['input'])){

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
				$foto = $_FILES['foto']['name'];
				$tmp = $_FILES['foto']['tmp_name'];
				$status_lap = $_POST['status_lap'];
				date_default_timezone_set('Asia/Jakarta');
				$tanggal = Date('Y-m-d h:i:s');
				// Rename nama fotonya dengan menambahkan tanggal dan jam upload
				$fotobaru = date('dmYHis').$foto;

				// Set path folder tempat menyimpan fotonya
				$path = "foto/".$fotobaru;

				if($_SESSION['captcha']===$_POST['captcha']){
				$cek = mysqli_query($koneksi, "SELECT * FROM laporan WHERE ids='$ids'");
					if(mysqli_num_rows($cek) == 0){
						if(move_uploaded_file($tmp, $path)){
							$insert = mysqli_query($koneksi, "INSERT INTO laporan(ids, nama, no_telp, email, no_id, prov, kab, kec, kel, sekolah, jenis_masalah, des_masalah, foto, status_lap, tanggal )
																VALUES('$ids','$nama', '$no_telp', '$email', '$no_id', '$prov', '$kab', '$kec', '$kel', '$sekolah', '$jenis_masalah', '$des_masalah', '$fotobaru', '$status_lap', '$tanggal')") or die(mysqli_error());
							if($insert){
								if(isset($_SESSION['laporin']['username'])){	
	                            echo "<script>alert('Data Berhasil di Simpan!'); window.location = 'admin.php?module=admin'</script>";
		                        }
		                        else{
		                        	echo "<script>alert('Data Berhasil di Simpan!'); window.location = 'status.php'</script>";
		                        }
							}else{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
								echo "<script>alert('Data Gagal di Simpan!'); window.location = 'admin.php?module=admin'</script>";
							}
						}
					}else{
					echo "<script>alert('Data sudah ada!'); window.location = 'index.php'</script>";
					}
				}else{
					if(isset($_SESSION['laporin']['username'])){	
	                    echo "<script>alert('Captcha salah!'); window.location = 'admin.php?module=admin&exe=input'</script>";
		                }
		                else{
		                echo "<script>alert('Captcha salah!'); window.location = 'status.php'</script>";;
		                }
					
				}
			}
				?>