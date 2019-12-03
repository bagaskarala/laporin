<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laporin</title>

        <!-- CSS -->
        <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500"> -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css"> 
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <?php include "koneksi.php";?>
        <script src="js/ajax_daerah.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>

		<!-- Top menu -->
		<?php include "navbar_luar.php";?>

        <!-- Top content -->
         <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 wrapper">
                              <div class="panel panel-primary">
                                <div class="panel-heading">
                                    10 Data Laporan Terbaru
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
    <table class="table table-bordered table-kiri">
        <tr>
            <th>ID</th>
            <th>NAMA</th>
            <th>SEKOLAH</th>
            <th>JENIS MASALAH</th>
            <th>STATUS</th>
        </tr>
        <?php
        

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
    echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}   

        
        // Buat query untuk menampilkan semua data siswa

        
        $sql = mysqli_query($koneksi, "SELECT * FROM laporan ORDER BY ids DESC LIMIT 10");
        
         // Untuk penomoran tabel, di awal set dengan 1
        while($data = mysqli_fetch_assoc($sql)){ // Ambil semua data dari hasil eksekusi $sql
        ?>
            <tr>
                            
                <td class="align-left"><strong><?php echo $data['ids']; ?></strong></td>
                <td class="align-left"><?php echo $data['nama']; ?></td>
                <td class="align-left": left;"><?php echo $data['sekolah']; ?></td>
                <td class="align-left"><?php echo $data['jenis_masalah']; ?></td>
                <td class="align-left"><?php echo $data['status_lap']; ?></td>
            </tr>
            <?php
             
        }
        ?>
    </table>
</div>
                                </div>
                              </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </body>
</html>