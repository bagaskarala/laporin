<?php
// Include / load file koneksi.php
include "koneksi.php";



if (isset($_GET['password'])){
	$password = $_GET['password'];
}

if (isset($_POST['Ubah'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_baru = $_POST['password_baru'];
	$password_ulang = $_POST['password_ulang'];

//cek pass
	$query = "SELECT * FROM login WHERE username ='$username' AND password = '$password'";
	$sql = mysqli_query($koneksi, $query);
	$hasil = mysqli_num_rows($sql) ;

	if (! $hasil >= 1 ) {
		?>
		<script type="text/javascript">
			alert ('Password lama tidak sesuai!');
			window.location ='admin.php?module=ubahpass' ;
		</script>
		<?php
		
	}
	//validasi
	elseif (empty($_POST['password_baru']) || empty($_POST['password_ulang'])) {
		echo "Isikan passsword baru !";
	}
	elseif (($_POST['password_baru']) != ($_POST['password_ulang'])) {
		?>
		<script type="text/javascript">
			alert ('Isikan pengulangan password dengan benar !');
			window.location ='admin.php?module=ubahpass' ;
		</script>
		<?php
	}
	else {
		$query ="UPDATE login SET password='$password_baru' WHERE username='$username'";
		$sql = mysqli_query($koneksi, $query) ;

		if($sql) {
			?>
		<script type="text/javascript">
			alert ('Password Berhasil Diubah!');
			window.location ='admin.php?module=ubahpass' ;
		</script>
		<?php
		}
		else{
			?>
		<script type="text/javascript">
			alert ('Password Gagal Diubah!');
			window.location ='admin.php?module=ubahpass' ;
		</script>
		<?php

	}
		}

}
?>
