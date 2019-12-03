<?php
session_start();
if (isset($_SESSION['laporin'])) {
    unset($_SESSION['laporin']);
}
?>


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
                        <div class="col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2 wrapper">
                              <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Login to LAPORIN</h3>
                                        <p>Masukkan username dan password:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <form role="form"  action ="proses_login.php" method="post" class="login-form">
                                        <div class="form-group">
                                            <label  for="username">Username</label>
                                            <input type="text" name="username" placeholder="Username..." class="form-username form-control" title="masukkan username admin" id="username" autofocus required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" placeholder="Password..." class="form-password form-control" title="masukkan password admin"id="password" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="captcha">Captcha</label>
                                            <div class="input-group" style="width:100%">
                                              <span class="input-group-addon" style="padding: 0;margin: 0; width:95px;">
                                               <img src="captcha.php" alt="captcha" style="height: 40px;width: auto;" /> 
                                              </span>
                                              <input type="text" class="form-control" name="captcha" id="captcha" maxlength="5" size="5" required="required" placeholder="Kode keamanan">
                                            </div>
                                        </div>
                                          
                                        <!-- <div class="form-group">
                                        <label  for="prov">Level</label>
                                        <select name="level" id="level" class="form-control">
                                          <option value="leveladmin">Pilih Level Admin</option>
                                          <option value="adminhead'">Kepala Sekolah</option>;
                                          <option value="admindisbud'">Dinas Pendidikan dan Kebudayaan</option>;
                                            
                                        <select>
                                    </div> -->
                                        <button type="submit" class="btn btn-success btn-lg btn-block">Masuk</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>>

        

    </body>
</html>