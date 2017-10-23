<?php
include "koneksi.php";
?> 
<!DOCTYPE html>
<html>
<head>
	<title>LAPORIN : Laporkan Permasalahan Sekolah Anda</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
            <form method="post" action="" enctype="multipart/form-data">

	<div id="container">
    	<div id="header">
        	<div id="logo">
            	<img src="images/logo.png">
            </div>
            <div class="clear"></div>
        </div>
        
        <div id="menu">
            <a class="left selected" href="home.html"><img src="images/home.png">Home</a>
            <a class="right selected" href="form_pelapor.html"><img src="images/menu5.png">Form Pelaporan</a>
        </div>
        
        <div id="content">
        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr valign="top">
                	<td width="75%" style="padding-right:20px;">
                		<div id="body">
                        	<div class="title">Form Pelaporan Permasalahan Sekolah</div>
                            <div class="body">
                            	<form action="" method="post">
                                <table>
                                	<tr>
                                    	<td><b>Nama Lengkap</b><div class="desc">Masukkan nama lengkap</div></td>
                                        <td>:</td>
                                        <td><input type="text" name="nama" /></td>
                                    </tr>
                                    <tr>
                                    	<td><b>No. Telepon</b><div class="desc">Masukkan Nomor Telepon yang Aktif</div></td>
                                        <td>:</td>
                                        <td><input type="text" name="no_telp" /></td>
                                    </tr>
                                    <tr>
                                    	<td><b>Email</b><div class="desc">Masukkan Email yang Valid</div></td>
                                        <td>:</td>
                                        <td><input type="text" name="email" /></td>
                                    </tr>
                                    <tr>
                                    	<td><b>No. Kartu Identitas</b><div class="desc">KTP/Kartu Pelajar/Lain-Lain</div></td>
                                        <td>:</td>
                                        <td><input type="text" name="no_id"  /></td>
                                    </tr>
                                    <tr>
                                    	<td><b>Kabupaten/Kota</b><div class="desc"></div></td>
                                        <td>:</td>
                                        <td><input type="text" name="kab" /></td>
                                    </tr>
                                    <tr>
                                    	<td><b>Kecamatan</b><div class="desc"></div></td>
                                        <td>:</td>
                                        <td><input type="text" name="kec" /></td>
                                    </tr>
                                    <!-- <tr>
                                    	<td><b>Status</b><div class="desc"></div></td>
                                        <td>:</td>
                                        <td>
                                            <input type="radio" name="agama" required>Swasta
                                            <input type="radio" name="agama" required>Negeri
                                        </td>
                                    </tr> -->
                                    <tr>
                                    	<td><b>Sekolah</b><div class="desc">Masukkan Nama Sekolah Anda</div></td>
                                        <td>:</td>
                                        <td><input type="text" name="sekolah" /></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jenis Permasalahan</b><div class="desc">Masukan Jenis Permasalahan</div></td>
                                        <td>:</td>
                                        <td><input type="text" name="jenis_masalah" /></td>
                                    </tr>
                                    <tr>
                                        <td><b>Deskripsi Permasalahan</b><div class="desc">Rincian Permasalahan yang Anda alami</div></td>
                                        <td></td>
                                        <td><textarea rows="5" cols="50" name="des_masalah"></textarea></td>
                                    </tr>
                                     <!-- <tr>
                                        <td><b>File Bukti</b><div class="desc">Alamat lengkap anda</div></td>
                                        <td>:</td>
                                        <td><form action="upload.php" method="post" enctype="multipart/form-data">
                                            Select image to upload:
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                        <input type="submit" value="Upload Image" name="submit">
                                        </form>
                                    </tr> -->
                                    <tr>
                                    	<td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" name="SIMPAN" value="Simpan" /><a class="orange" href="#"><img src="images/button-cancel.png">Batal</a></td>

                                    </tr>
                                </table>
                                </form>

                            </div>
                        </div>
                    </td>
                    <td width="25%" style="padding-left:10px;">
                    	<div id="body">
                        	<div class="title">Sub Menu</div>
                            <div class="body">
                            	<a class="submenu" href="#"><img src="images/home.png">Menu Pertama</a>
                                <a class="submenu" href="#"><img src="images/menu1.png">Menu 2</a>
                                <a class="submenu" href="#"><img src="images/menu2.png">Menu 3</a>
                                <a class="submenu" href="#"><img src="images/menu3.png">Menu 4</a>
                                <a class="submenu" href="#"><img src="images/menu4.png">Menu 5</a>
                                <a class="submenu" href="#"><img src="images/menu2.png">Menu 6</a>
                                <a class="submenu" href="#"><img src="images/menu1.png">Menu 7</a>
                                <a class="submenu" href="#"><img src="images/home.png">Menu 8</a>
                                <a class="submenu" href="#"><img src="images/menu4.png">Menu 9</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
        <div id="footer">
        	Copyright &copy; 2017 | Kerja Praktik PT Air Media<br>
            
        </div>
    </div>
<?php
    if($_POST['SIMPAN']){
     
		$nama = $_POST['nama'];
		$no_telp = $_POST['no_telp'];
		$email = $_POST['email'];
		$no_id = $_POST['no_id'];
		$kab = $_POST['kab'];
		$kec = $_POST['kec'];
		$sekolah = $_POST['sekolah'];
		$jenis_masalah = $_POST['jenis_masalah'];
		$des_masalah = $_POST['des_masalah'];
		// $bukti = $_FILES['bukti']['name'];
		// $tmp = $_FILES['bukti']['tmp_name'];
		  
		// Rename nama fotonya dengan menambahkan tanggal dan jam upload
		// $buktibaru = date('dmYHis').$bukti;
		// Set path folder tempat menyimpan fotonya
		// $path = "images/".$buktibaru;
		// Proses upload
		// if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		  // Proses simpan ke Database
		  $query = "INSERT INTO pelapor VALUES('".$nama."', '".$no_telp."', '".$email."', '".$no_id."', '".$kab."', '".$kec
		  ."', '".$sekolah."', '".$jenis_masalah."', '".$des_masalah."')";
		  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
		  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		    // Jika Sukses, Lakukan :
		    header("location: modules/mod_pelapor/index.php");   
           }
       }

    //     // $sql = "insert into () values ()";
    //     // mysqli_query($connect,$sql);
    // }
?>
</body>
</html>