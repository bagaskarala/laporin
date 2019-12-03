<div class="row">
        <div class="col-lg-12" id="judul">
            <h1 class="page-header">Ubah Password</h1>
        </div>
    </div>
    <div class="row">
                                    <form role="form" action="proses_ubah_password.php" method="post" class="col-sm-6">
                                         <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" value ="<?php echo $_SESSION['laporin']['username'];?>" placeholder="Username..." class="form-username form-control" id="username" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label  for="password">Password lama</label>
                                            <input type="password" name="password" placeholder="Password Lama..." class="form-password form-control" id="password" required="required" autofocus="">
                                        </div>    
                                        <div class="form-group">
                                            <label for="password">Password baru</label>
                                            <input type="password" name="password_baru" placeholder="Password Baru..." class="form-password form-control" id="password_baru" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Ulangi Password baru</label>
                                            <input type="password" name="password_ulang" placeholder="Ulangi Password Baru..." class="form-password form-control" id="password" required="required">
                                        </div>
                                        
                                        <button type="submit" name ="Ubah" class="btn btn-success btn-md" value="Ubah">Ganti Password</button>
                                    </form>
                                </div>
                            