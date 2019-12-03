<?php
    include "koneksi.php";
    if(!isset($_SESSION['laporin']['username'])){
    ?>
    <script>
    window.location="login.php";
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <?php
     include "head.php";
    ?>
    <title>Admin Laporin</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
     <?php
     include "navbar.php";
     ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <?php include "content.php"; ?>
    </div>

</div>
</body>
</html>