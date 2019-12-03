<?php 

include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$captcha = $_POST['captcha'];


if($_SESSION['captcha']===$_POST['captcha']){

	$sql = "SELECT * FROM login  WHERE username= '$username' and password = '$password'";
	$query = mysqli_query($koneksi,$sql);
	$cek = mysqli_num_rows($query);
	if($cek==1){
		$row = $query->fetch_assoc();
	    $_SESSION['laporin']['username'] = $row['username'];
		?>
		<script>
			window.location="admin.php?module=dashboard";
		</script>	
		<?php 
	}
	else{ //jika pass salah
		?><script>
		    alert ('Username atau password salah');
		    window.location="login.php";
		    </script>
		<?php
	}
}else {
	?>	<script>
    alert ('Captcha Salah!');
    window.location="login.php";
    </script>
<?php
}

?>