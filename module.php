<?php
if(isset($_GET['module'])){
	if($_GET['module']=='admin'){
		if(!isset($_GET['exe'])) include "view.php";
	else {
		if($_GET['exe']=='detail') include "detail.php";
		if($_GET['exe']=='edit') include "edit.php";
		if($_GET['exe']=='input') include "input.php";
		if($_GET['exe']=='delete') include "proseshapus.php";
		}
	}
	elseif($_GET['module']=='dashboard'){
		if(!isset($_GET['exe'])) include "dashboard.php";
	}
	elseif($_GET['module']=='ubahpass'){
	    if(!isset($_GET['exe'])) include "ubahpass.php";
	}
	elseif($_GET['module']=='profil'){
	    if(!isset($_GET['exe'])) include "profil.php";
	}
	elseif($_GET['module']=='data-admin'){
	    if(!isset($_GET['exe'])) include "view-admin.php";
	else {
		if($_GET['exe']=='edit') include "edit-admin.php";
		if($_GET['exe']=='create') include "register-admin.php";
		if($_GET['exe']=='delete') include "proseshapus-admin.php";
		}
	}
}
else
{?>
<script>
    window.location="admin.php?module=dashboard";
    </script>
<?php
}
?>