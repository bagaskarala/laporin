<?php
    include "koneksi.php";
    if($_SESSION['laporin']['username']!='admin'){
    ?>
    <script>
    window.location="admin.php?module=admin";
    </script>
    <?php
}

           $id = $_GET['id'];
            $sql = mysqli_query($koneksi, "SELECT * FROM laporan WHERE ids='$id'");
            if(mysqli_num_rows($sql) == 0){
                header("Location: ?module=admin");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }
            ?>

<div class="row">
        <div class="col-md-12" id="judul">
            <h1 class="page-header">Data Laporan</h1>
        </div>
</div>
           
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
    <div class="panel-heading">Update Data Siswa</div>
    <div class="panel-body">
        <div class="form-laporan">
                         <form name="form1" id="form1" class="col-sm-6" action="prosesedit.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label" for="basicinput">IDS</label>
                                            <div class="controls">
                                                <input type="text" name="ids" id="ids" value="<?php echo $row['ids']; ?>" class="form-control span8 tip" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>" placeholder="Nama Mahasiswa" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="no_telp">No Telp</label>
                                            <input type="text" name="no_telp" id="no_telp" value="<?php echo $row['no_telp']; ?>" placeholder="No Telp" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="email">Email</label>
                                            <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" placeholder="Email" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="no_id">No Identitas</label>
                                            <input type="text" name="no_id" id="no_id" value="<?php echo $row['no_id']; ?>" placeholder="No Identitas" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label for="ubah_lokasi">Lokasi</label>     
                                            <div class="checkbox">
                                                <label><input type="checkbox" id="ubah_lokasi" name="ubah_lokasi" value="true"> Cek jika ingin mengubah lokasi</label>
                                            </div>
                                            <!-- <input type="file" class="form-control" id="foto" name="foto" style="display: none;"> -->
                                            <div id="lokasi" style="display: none;">
                                            <label  for="prov">Provinsi</label>
                                            <select name="prov" id="prov" class="form-control" onchange="ajaxkab(this.value)" >
                                            <option value="">Pilih Provinsi</option>
                                            <?php 
                                               include 'koneksi_pdo.php';
                                              $query=$pdo->prepare("SELECT id_prov,nama FROM provinsi ORDER BY nama");
                                              $query->execute();
                                              while ($data=$query->fetchObject()){
                                              echo '<option value="'.$data->id_prov.'">'.$data->nama.'</option>';
                                              }
                                             ?>
                                            </select>

                                            <div class="form-group" style="margin-top: 10px">
                                                <label for="kab">Kabupaten</label>
                                                <select name="kab" id="kab" class="form-control" onchange="ajaxkec(this.value)" >
                                                    <option value="">Pilih Provinsi dahulu</option>
                                                </select>
                                            </div>
                                            <div class="form-group" style="margin-top: 10px">
                                                <label for="kec">Kecamatan</label>
                                                <select name="kec" id="kec" class="form-control" onchange="ajaxkel(this.value)" >
                                                    <option value="">Pilih Kabupaten/Kota dahulu</option>
                                                </select>
                                            </div>
                                            <div class="form-group" style="margin-top: 10px">
                                                <label for="kel">Kelurahan</label>
                                                <select name="kel" id="kel" class="form-control" >
                                                    <option value="">Pilih Kecamatan dahulu</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>

                                    

                                        <div class="form-group">
                                            <label class="control-label" for="sekolah">Sekolah</label>
                                            <input type="text" name="sekolah" id="sekolah" value="<?php echo $row['sekolah']; ?>" placeholder="sekolah" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="jenis_masalah">Jenis Masalah</label>
                                            <select id="jenis_masalah" name="jenis_masalah" class="form-control" >
                                                <option value="">Pilih</option>
                                                <option value="infrastruktur">Infrastruktur</option>
                                                <option value="bullying">Bullying</option>
                                                <option value="pungli">Pungutan Liar</option>
                                                <option value="pelecehan">Pelecehan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="des_masalah">Deskripsi Masalah</label>
                                            <textarea class="form-control" id="des_masalah" name="des_masalah" placeholder="Deskripsi Masalah"><?php echo $row['des_masalah']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="ubah_foto">Foto</label>     
                                            <div class="checkbox">
                                                <label><input type="checkbox" id="ubah_foto" name="ubah_foto" value="true"> Cek jika ingin mengubah foto</label>
                                            </div>
                                            <input type="file" class="form-control" id="foto" name="foto" style="display: none;">
                                        </div>

                        <div class="form-group" id="autopilih">
                                            <label>Status</label>
                                            <select id="status_lap" name="status_lap" class="form-control">
                                                <option value="belum">Belum Diproses</option>
                                                <option value="sedang">Sedang Diproses</option>
                                                <option value="ditanggapi">Sudah Ditanggapi</option>
                                                <option value="selesai">Selesai</option>
                                                <option value="disposisi">Didisposisikan</option>
                                            </select>
                                        </div>   
                       </div>
       
    </div>
    <div class="panel-footer">
        <div>
         <input type="submit" name="update" id="update" value="Update" class="btn btn-sm btn-primary"/>
         <a href="?module=admin" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
    </form>
  </div>
    </div>
</div>          
            
            
    
      <script type="text/javascript">
         $(document).ready(function(){
            $('#ubah_foto').change(function(){
            if(this.checked)
                $('#foto').fadeIn('fast');
            else
                $('#foto').fadeOut('fast');

            });

            $('#ubah_lokasi').change(function(){
            if(this.checked)
                $('#lokasi').fadeIn('fast');
            else
                $('#lokasi').fadeOut('fast');

            });
        });
      </script>

