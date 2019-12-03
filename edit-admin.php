<?php
    include "koneksi.php";
    if($_SESSION['laporin']['username']!='admin'){
    ?>
    <script>
    window.location="admin.php";
    </script>
    <?php
}

           $id = $_GET['id'];
            $sql = mysqli_query($koneksi, "SELECT * FROM login WHERE ids='$id'");
            if(mysqli_num_rows($sql) == 0){
                header("Location: ?module=data-admin");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }

            if(!empty($row['kab'])){
                $sqlkab = "SELECT * FROM kabupaten WHERE id_kab=".$row['kab']."";
                $querykab = mysqli_query($koneksi, $sqlkab) or die(mysqli_error());
                $rowkab = mysqli_fetch_assoc($querykab);
            }else{$rowkab['nama']="";}
            ?>

<div class="row">
        <div class="col-md-12" id="judul">
            <h1 class="page-header">Data Admin</h1>
        </div>
</div>
           
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
    <div class="panel-heading">Update Data Admin</div>
    <div class="panel-body">
        <div class="form-laporan">
                         <form name="form1" id="form1"  method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="sr-only control-label" for="basicinput">IDS</label>
                                            <div class="controls">
                                                <input type="hidden" name="ids" id="ids" value="<?php echo $row['ids']; ?>" class="form-control span8 tip" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="nama">Username</label>
                                            <input type="text" name="nama" id="nama" value="<?php echo $row['username']; ?>" placeholder="Nama Mahasiswa" class="form-control" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="sekolah">Kabupaten</label>
                                            <input type="text" name="sekolah" id="sekolah" value="<?php echo $rowkab['nama']; ?>" placeholder="sekolah" class="form-control" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="no_telp">No Telp</label>
                                            <input type="text" name="no_telp" id="no_telp" value="<?php echo $row['no_telp']; ?>" placeholder="No Telp" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="email">Email</label>
                                            <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" placeholder="Email" class="form-control" >
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


<?php
include "koneksi.php";
if(isset($_POST['update'])){
                $ids = $_POST['ids'];
                $no_telp = $_POST['no_telp'];
                $email = $_POST['email'];
                

                $update = mysqli_query($koneksi, "UPDATE login SET no_telp='$no_telp', email ='$email' WHERE ids='$ids'") or die(mysqli_error());
                if($update){
                    echo "<script>alert('Data Berhasil di Update!'); window.location = 'admin.php?module=data-admin'</script>";
                }else{
                    echo "<script>alert('Data Gagal di Update!'); window.location = 'admin.php?module=data-admin'</script>";
                }
         }
            ?>