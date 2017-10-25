<?php
    include "koneksi.php";
    if(!isset($_SESSION['laporin']['username'])){
    ?>
    <script>
    alert ('anda harus login dahulu');
    window.location="index_login.php";
    </script>
    <?php
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Headmaster Admin of LAPORIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="container">
    	<div id="header">
        	<div id="logo">
            	<img src="images/logo.png">
            </div>
            <div id="info">
            	<img src="images/user.png">
                Selamat Datang Admin!<br>
                Anda Mendapat <a href="#">8</a> Pesan Baru<br>
                <a href="#">Keluar</a>
            </div>
            <div class="clear"></div>
        </div>
        
        <div id="menu">
            <a class="left selected" href="?module=pelapor"><img src="images/home.png">Home</a>
            <a class="right" href="?module=pelapor&exe=tambah"><img src="images/menu5.png">Pelapor</a>
        </div>

        <br>
        <br>
        <div>
            <?php include "module.php"; ?>
        </div>
        
        <div id="footer">
            Copyright &copy; 2017 | Kerja Praktik PT Air Media<br>
            
        </div>
    </div>

</body>
</html>