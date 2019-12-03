
			<?php
           $id = $_GET['id'];
            $sql = mysqli_query($koneksi, "SELECT * FROM laporan WHERE ids='$id'");
            if(mysqli_num_rows($sql) == 0){
                header("Location: ?module=admin");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }

            $ids= $row['ids'];
            $prov = $row['prov'];
            $kab = $row['kab'];
            $kec = $row['kec'];
            $kel = $row['kel'];
            $email = $row['email'];
            $nama = $row['nama'];
            $jenis_masalah = $row['jenis_masalah'];
            $des_masalah = $row['des_masalah'];
            $status_lap = $row['status_lap'];
            

        
            ?>

<div class="row">
        <div class="col-md-12" id="judul">
            <h1 class="page-header">Detail Data ID #<?php echo $row['ids']; ?></h1>
            <h3 style="margin-bottom: 20px;"><label id="label-status" class="label label-default"><?php echo $row['status_lap']; ?></label></h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading">Detail Informasi</div>
    <div class="panel-body">
        <form name="form1" id="form1"   method="POST" enctype="multipart/form-data">
                        

                                        <div class="form-group col-sm-12">
                                            <label class="control-label" for="nama">Nama</label>
                                            <div class="well">
                                                <?php echo $row['nama']; ?>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label" for="no_telp">No Telp</label>
                                            <div class="well">
                                                <?php echo $row['no_telp']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label" for="email">Email</label>  
                                            <div class="well">
                                                <?php echo $row['email']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label" for="no_id">No Identitas</label>
                                            <div class="well">
                                                <?php echo $row['no_id']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label" for="prov">Provinsi</label>
                                            <?php 
                                               
                                              $sql = mysqli_query($koneksi, "SELECT nama FROM provinsi WHERE id_prov='$prov'");
                                              $dataprov = mysqli_fetch_assoc($sql);
                                             ?>
                                            <div class="well">
                                                <?php echo $dataprov['nama']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="kab">Kabupaten</label>
                                            <?php 
                                               
                                              $sql = mysqli_query($koneksi, "SELECT nama FROM kabupaten WHERE id_kab='$kab'");
                                              $datakab = mysqli_fetch_assoc($sql);
                                             ?>
                                            <div class="well">
                                                <?php echo $datakab['nama']; ?>
                                            </div>

                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="kec">Kecamatan</label>
                                            <?php 
                                               
                                              $sql = mysqli_query($koneksi, "SELECT nama FROM kecamatan WHERE id_kec='$kec'");
                                              $datakec = mysqli_fetch_assoc($sql);
                                             ?>
                                            <div class="well">
                                                <?php echo $datakec['nama']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="kel">Kelurahan</label>
                                            <?php 
                                               
                                              $sql = mysqli_query($koneksi, "SELECT nama FROM kelurahan WHERE id_kel='$kel'");
                                              $datakel = mysqli_fetch_assoc($sql);
                                             ?>
                                            <div class="well">
                                                <?php echo $datakel['nama']; ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class="control-label" for="sekolah">Sekolah</label>
                                            <div class="well">
                                                <?php echo $row['sekolah']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label" for="jenis_masalah">Jenis Masalah</label>
                                            <div class="well">
                                                <?php echo $row['jenis_masalah']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="des_masalah">Deskripsi Masalah</label>
                                            <div class="well" >
                                                <textarea class="form-control" rows="5" readonly="readonly" style="cursor: default;"><?php echo $row['des_masalah']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Foto</label>
                                            <div class="well" style="overflow: auto;">
                                                 <img src="foto/<?php echo $row['foto']; ?>" width=auto height="150px">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12" style="display: none;">
                                            <label class="control-label" for="status_lap" >Status Laporan</label>
                                            <div class="well">
                                                <?php echo $row['status_lap']; ?>
                                            </div>
                                        </div>
                                        

                                        
                        </form>
    </div>
    <div class="panel-footer">
        <div>
        <a href="?module=admin" class="btn btn-sm btn-danger" style="margin-right: 5px;">Kembali</a>
        <a href="javascript:void();" data-toggle="modal" data-target="#tanggapan-modal" class="btn btn-sm btn-info" style="margin-right: 5px;">Kirim Balasan</a>
        <a href="javascript:void();" data-toggle="modal" data-target="#selesai-modal" class="btn btn-sm btn-success">Selesai</a>
        </div>
    </div>
  </div>
</div>
    </div>    
                        



<div id="tanggapan-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">
                                Kirim Email Tanggapan
                            </h4>
                </div>
                <div class="modal-body">
                    <!--
                            -- Beri id "data-nis" untuk textbox nis yang digunakan untuk menampung
                            -- data nis yang akan dihapus
                            -->
                            <div class="well" style="margin-bottom:20px;">
                                Tanggapan ID #<?php echo $row['ids']; ?>
                            </div>
                    <form action="kirim_tanggapan.php" name="form1" id="form1" method="post">
                        <input type="hidden" name="ids" value="<?php echo $ids; ?>" readonly="readonly">
                            <input type="hidden" name="name" value="<?php echo $nama; ?>" readonly="readonly">
                            <input type="hidden" name="email" value="<?php echo $email; ?>" readonly="readonly">
                            <input type="hidden" name="jenis_masalah" value="<?php echo $jenis_masalah; ?>" readonly="readonly">
                            <input type="hidden" name="des_masalah" value="<?php echo $des_masalah; ?>" readonly="readonly">
                            <input type="hidden" name="status_lap" value="<?php echo $status_lap; ?>" readonly="readonly">
                            <input type="hidden" name="subject" value="Tanggapan Laporan ID #<?php echo $ids; ?>" readonly="readonly">
                        <div class="form-group">
                            <!-- <textarea name="message" id="message" col=auto rows="5"></textarea> -->

                            <div>
                            <div style="float:left;width:100%;">
                             <textarea name="message" style="width:100%;" rows="10"></textarea>
                            </div>
                            <div style="clear:both;"></div>
                            </div>
                        </div>
                        <div><input type="submit" value="Send email" class="btn btn-primary"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>

<div id="selesai-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">
                                Kirim Email Laporan Penyelesaian
                            </h4>
                </div>
                <div class="modal-body">
                    <!--
                            -- Beri id "data-nis" untuk textbox nis yang digunakan untuk menampung
                            -- data nis yang akan dihapus
                            -->
                            <div class="well" style="margin-bottom:20px;">
                                Penyelesaian Laporan ID #<?php echo $row['ids']; ?>
                            </div>
                    <form action="kirim_selesai.php" name="form1" id="form1" method="post">
                        <input type="hidden" name="ids" value="<?php echo $ids; ?>" readonly="readonly">
                            <input type="hidden" name="name" value="<?php echo $nama; ?>" readonly="readonly">
                            <input type="hidden" name="email" value="<?php echo $email; ?>" readonly="readonly">
                            <input type="hidden" name="jenis_masalah" value="<?php echo $jenis_masalah; ?>" readonly="readonly">
                            <input type="hidden" name="des_masalah" value="<?php echo $des_masalah; ?>" readonly="readonly">
                            <input type="hidden" name="status_lap" value="<?php echo $status_lap; ?>" readonly="readonly">
                            <input type="hidden" name="subject" value="Tanggapan Laporan ID #<?php echo $ids; ?>" readonly="readonly">
                        <div class="form-group">
                            <!-- <textarea name="message" id="message" col=auto rows="5"></textarea> -->

                            <div>
                            <div style="float:left;width:100%;">
                             <textarea name="message" style="width:100%;" rows="10"></textarea>
                            </div>
                            <div style="clear:both;"></div>
                            </div>
                        </div>
                        <div><input type="submit" value="Kirim " class="btn btn-primary"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void();" onclick="selesai(<?php echo $ids; ?>);" class="btn btn-success"><span class="fa fa-check"></span> Selesai</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>

<!-- ganti label sesuaikan status-->
<?php
    if($status_lap=='selesai'){
                ?>
                <script type="text/javascript">
                    $("#label-status").removeClass("label-default label-info").addClass("label-success");
                </script>
            <?php
            }elseif ($status_lap=='ditanggapi') {
                ?>
                <script type="text/javascript">
                    $("#label-status").removeClass("label-default label-success").addClass("label-info");
                </script>
            <?php
            }elseif ($status_lap=='disposisi') {
                ?>
                <script type="text/javascript">
                    $("#label-status").removeClass("label-default label-success").addClass("label-warning");
                </script>
            <?php
            }           
            ?>

<script type="text/javascript">
    function selesai(ids){

    }
</script>
                                    