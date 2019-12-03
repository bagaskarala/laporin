<?php
    include "koneksi.php";
    if($_SESSION['laporin']['username']!='admin'){
    ?>
    <script>
    window.location="admin.php";
    </script>
    <?php
}
?>
<div class="container-fluid">
<div class="row">
        <div class="col-md-12" id="judul">
            <h1 class="page-header">Data Admin</h1>
        </div>
    </div>

    <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
			    <div class="panel-heading">Input Data Mahasiswa</div>
			    <div class="panel-body">
			    	<form role="form"  action ="prosesregister.php" method="post">
                                        <div class="form-group" style="display: none">
                                            <label " for="ids">IDS</label>
                                            <input type="hidden" name="ids" placeholder="IDS..." class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" placeholder="Username..." class="form-username form-control" title="Masukkan username admin" id="username" autofocus required="required">
                                        </div>
                                        <div class="form-group">
                                            <label  for="password">Password</label>
                                            <input type="password" name="password" placeholder="Password..." class="form-password form-control" title="Masukkan password admin" id="password" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label  for="password">Ulangi Password baru</label>
                                            <input type="password" name="password_ulang" placeholder="Ulangi Password ..." class="form-password form-control" id="password_ulang" required="required">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label  for="no_telp">Nomor Telpon</label>
                                            <input type="text" name="no_telp" placeholder="Nomor Telpon..." class="form-control" pattern="[0-9]+" title="numeric characters only" id="no_telp" autofocus required="required">
                                        </div>
                                        <div class="form-group">
                                            <label  for="email">Email</label>
                                            <input type="text" name="email" placeholder="Email..." class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@email.com" id="email" autofocus required="required">
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label" for="prov">Provinsi</label>
                                            <select name="prov" id="prov" class="form-control form-select" onchange="ajaxkab(this.value)" required>
                                            <option value="">Pilih Provinsi</option>
                                            <?php 
                                               include 'koneksi_pdo.php';
                                              $query=$pdo->prepare("SELECT id_prov,nama FROM provinsi ORDER BY nama");
                                              $query->execute();
                                              while ($data=$query->fetchObject()){
                                              echo '<option value="'.$data->id_prov.'">'.$data->nama.'</option>';
                                              }
                                             ?>
                                            <select>
                                        </div>
                                        <div class="form-group">
                                            <label  for="kab">Kabupaten</label>
                                            <select name="kab" id="kab" class="form-control form-select" onchange="ajaxkec(this.value)" required>
                                                <option value="">Pilih Provinsi dahulu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label  for="kec">Kecamatan</label>
                                            <select name="kec" id="kec" class="form-control form-select" onchange="ajaxkel(this.value)" required>
                                                <option value="">Pilih Kabupaten/Kota dahulu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label  for="kel">Kelurahan</label>
                                            <select name="kel" id="kel" class="form-control form-select" required>
                                                <option value="">Pilih Kecamatan dahulu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sekolah">Sekolah</label>
                                            <input type="text" name="sekolah" placeholder="Nama Sekolah..." class="form-control" pattern="[A-Za-z]+" title="letters only" id="sekolah" autofocus required="required">
                                        </div>
                                         
                                
                                        
										
			    </div>
			    <div class="panel-footer">

												<a href="admin.php?module=admin" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Simpan</button>
                                               	<button type="reset" name="reset" id="reset" class="btn btn-sm btn-danger"><i class="fa fa-refresh"></i> Reset</button>
						</form>
			    </div>
			  </div>
			</div>
			
		</div>
</div>                  
         
        
       


<!-- <script type="text/javascript">
function validasi_input(form){
  if (form.nama.value == ""){
    alert("Nama masih kosong!");
    form.nama.focus();
    return (false);
  }
return (true);
}
</script> -->


<script type="text/javascript">
	function fileValidation(){
    var fileInput = document.getElementById('foto');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{

        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<div class="well"><img src="'+e.target.result+'" width=100% height=auto /></div>';
            };
            reader.readAsDataURL(fileInput.files[0]);

        }
    }
    $('#imagePreview').show();
}

</script>

