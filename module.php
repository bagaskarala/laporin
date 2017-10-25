<?php
if (isset($_SESSION['laporin']['username']))
	{
    if(isset($_GET['module'])){
        if($_GET['module']=='pelapor') {
            if(!isset($_GET['exe'])) include "modules/mod_pelapor/index.php";
            else{
                if($_GET['exe']=='tambah') include "modules/mod_pelapor/form_simpan.php";
                if($_GET['exe']=='ubah') include "modules/mod_pelapor/form_ubah.php";
                if($_GET['exe']=='proses_ubah') include "modules/mod_pelapor/proses_ubah.php";
                if($_GET['exe']=='proses_hapus') include "modules/mod_pelapor/proses_hapus.php";
            }
        }
    }
}
else {
	echo "maaf anda tidak berhak membuka ini";
}

?>