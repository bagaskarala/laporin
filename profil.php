<div class="row">
        <div class="col-lg-12" id="judul">
            <h1 class="page-header">Profil</h1>
        </div>
    </div>
    <?php
    include "koneksi.php";
    $ses_uname = $_SESSION['laporin']['username'];
    $view = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$ses_uname' LIMIT 0,1");
    $row = mysqli_fetch_assoc($view);
     ?>
    <div class="row">
                                    <form role="form" action="proses_ubah_password.php" method="post" class="col-sm-12
                                    ">
                                    <div class="clearfix"></div>
                                        <h3 col-sm-12">Data Kontak</h3>
                                        <hr>
                                         <div class="form-group col-sm-6">
                                            <label class="control-label" for="nama">Username</label>
                                            <div class="well">
                                                <?php echo $row['username']; ?>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="control-label" for="no_telp">No Telp</label>
                                            <div class="well">
                                                <?php echo $row['no_telp']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="control-label" for="email">Email</label>  
                                            <div class="well">
                                                <?php echo $row['email']; ?>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <h3 col-sm-12">Lokasi</h3>
                                        <hr>
                                        <div class="form-group col-sm-6">
                                            <label class="control-label" for="prov">Provinsi</label>
                                            <?php 
                                                $prov=$row['prov'];
                                              $sql = mysqli_query($koneksi, "SELECT nama FROM provinsi WHERE id_prov='$prov'");
                                              $dataprov = mysqli_fetch_assoc($sql);
                                             ?>
                                            <div class="well">
                                                <?php echo $dataprov['nama']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="kab">Kabupaten</label>
                                            <?php 
                                                $kab=$row['kab'];
                                              $sql = mysqli_query($koneksi, "SELECT nama FROM kabupaten WHERE id_kab='$kab'");
                                              $datakab = mysqli_fetch_assoc($sql);
                                             ?>
                                            <div class="well">
                                                <?php echo $datakab['nama']; ?>
                                            </div>

                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="kec">Kecamatan</label>
                                            <?php 
                                               $kec=$row['kec'];
                                              $sql = mysqli_query($koneksi, "SELECT nama FROM kecamatan WHERE id_kec='$kec'");
                                              $datakec = mysqli_fetch_assoc($sql);
                                             ?>
                                            <div class="well">
                                                <?php echo $datakec['nama']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="kel">Kelurahan</label>
                                            <?php 
                                               $kel=$row['kel'];
                                              $sql = mysqli_query($koneksi, "SELECT nama FROM kelurahan WHERE id_kel='$kel'");
                                              $datakel = mysqli_fetch_assoc($sql);
                                             ?>
                                            <div class="well">
                                                <?php echo $datakel['nama']; ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="control-label" for="sekolah">Sekolah</label>
                                            <div class="well">
                                                <?php echo $row['sekolah']; ?>
                                            </div>
                                        </div>
                                    
                                            
                                    </form>
                                </div>
                            