<html>
<head>
	<title>Input Data Mahasiswa</title>
</head>
<body>
	<h3>Input Data</h3>
	<form method="POST">
		<table>
			<tr>
				<td>Nama</td><td><input type="text" name="Nama"></td>
			</tr>
			
			<tr>
				<td>Jurusan</td><td><select name="Jurusan">
					<option value="TI">TI</option>
					<option value="TE">TE</option>
					<option value="Teknik Industri">Teknik Industri</option>
				</select></td>
			</tr>
			
			<tr>
			<td>Fakultas</td><td><select name="Fakultas">
					<option value="Teknik">Teknik</option>
					<option value="MIPA">MIPA</option>
				</select>
			</td>
			</tr>
			
			<tr>
				<td>Alamat</td><td><input type="text" name="Alamat"></td>
			</tr>
<tr>
	<td></td><td><input type="Submit" name="input" value="Input"></td>
</tr>
		</table>
</form>
</body>
</html>
<?php
	include "config.php";
	if(isset($_POST['input'])){
		$Nama = $_POST['Nama'];
		$Jurusan = $_POST['Jurusan'];
		$Fakultas = $_POST['Fakultas'];
		$Alamat = $_POST['Alamat'];

		$sql = "INSERT INTO kampus (Nama, Jurusan, Fakultas, Alamat) VALUES('$Nama','$Jurusan','$Fakultas','$Alamat')";
		$res = mysqli_query($conn,$sql);

		if ($res){
			echo"<h2><font color=blue> Data telah berhasil ditambahkan </font></h2>";
		}
		else{
			echo "<h2><font> color=red> Data gagal ditambahkan </font></h2>";
		}
	}
?>