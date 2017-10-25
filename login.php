<?php 

include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM login  WHERE username= '$username' and password = '$password'";
$query = mysqli_query($connect,$sql);
$cek = mysqli_num_rows($query);
if($cek==1){
	$row = $query->fetch_assoc();

	// $_SESSION['laporin']['userid'] = $row['userid'];
	$_SESSION['laporin']['username'] = $row['username'];
	$_SESSION['laporin']['level'] = $row['level'];


	// if($_SESSION['level']=='admin'){
	// 	$menu = array('laporin','user');
	// }else{
	// 	$menu = array('viewlaporin');
	// }

	echo "Login Berhasil Min";
?>
<script>
	window.location="index.php";
</script>	
<?php 
}
else{
	include 'index_login.php';
	echo "Username atau Password Salah!" ;
}

?>