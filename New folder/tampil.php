<html>
<head>
		<title> Menampilkan Data </title>

</head>
<body>
	<table border="1">
		<tr>
			<td>Nama</td><td>Jurusan</td><td>Fakultas</td><td>Alamat</td>
		</tr>
<?php
include'config.php';
$sql="select*from kampus";
$result=mysql_querry(sql);
while($row=mysql_fetch_array(result)){
	$Nama=$row['Nama'];
	$Jurusan=$row['Jurusan'];
	$Fakultas=$row['Fakultas'];
	$Alamat=$row['Alamat'];
echo "<tr><td>$Nama</td><td>Jurusan</td><td>Fakultas</td><td>Alamat</td>
		<td><br>&nbsp<a href=edit.php?Nama=$row[0]>Edit</a>
		<&nbsp|&nbsp<a href=delete.php?Nama=$row[0]>Delete </a>&nbsp</td></tr>";
}
?>
</table>
</body>
</html>