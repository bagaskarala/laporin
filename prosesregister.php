<?php include "koneksi.php";

			if(isset($_POST['input'])){
				$ids = $_POST['ids'];
				$sekolah = $_POST['sekolah'];
				$no_telp = $_POST['no_telp'];
				$email = $_POST['email'];
				$prov = $_POST['prov'];
				$kab = $_POST['kab'];
				$kec = $_POST['kec'];
				$kel = $_POST['kel'];
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				$password_ulang = md5($_POST['password_ulang']);
				
				if (($_POST['password']) != ($_POST['password_ulang'])) {
							?>
							<script type="text/javascript">
								alert ('Isikan pengulangan password dengan benar !');
								window.location ='admin.php?module=data-admin&exe=create' ;
							</script>
							<?php
						}else{
							$cek = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username'");
							if(mysqli_num_rows($cek) == 0){
									$insert = mysqli_query($koneksi, "INSERT INTO login(ids, sekolah, no_telp, email, prov, kab, kec, kel, username, password)
																		VALUES('$ids', '$sekolah', '$no_telp', '$email','$prov', '$kab', '$kec', '$kel',  '$username' , '$password')") or die(mysqli_error());
									if($insert){
			                        	?><script>alert('Data Berhasil di Simpan!'); window.location = 'admin.php?module=data-admin'</script>
			                        	<?php
			                        }

									}else{
										?> 
										<script>alert('Username sudah terdaftar!'); window.location = 'admin.php?module=data-admin&exe=create'</script>
										<?php
									}

						}

					}


?>