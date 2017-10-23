<?php

    if(isset($_GET['module'])){
        if($_GET['module']=='pelapor') {
            if(!isset($_GET['exe'])) include "modules/mod_pelapor/index.php";
            else{
                if($_GET['exe']=='tambah') include "modules/mod_pelapor/form_simpan.php";
            }
        }
    }
?>