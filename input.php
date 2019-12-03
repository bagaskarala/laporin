<div class="container-fluid">
<div class="row">
        <div class="col-md-12" id="judul">
            <h1 class="page-header">Data Laporan</h1>
        </div>
    </div>

    <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
			    <div class="panel-heading">Input Data Mahasiswa</div>
			    <div class="panel-body">
			    	<form name="form1" id="form1" action="prosesinput.php" method="POST" enctype="multipart/form-data" onsubmit="return validation(this)">
										<div class="form-group" style="display: none">
											<label class="control-label" for="ids">IDS</label>
											<input type="hidden" name="ids" id="ids" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
										</div>
										<div class="form-group">
											<label class="control-label" for="nama">Nama</label>
											<input type="text" name="nama" id="nama" placeholder="Nama Mahasiswa" class="form-control" pattern="[A-Za-z]+" title="letters only" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="no_telp">No Telp</label>
											<input type="text" name="no_telp" id="no_telp" placeholder="No Telp" class="form-control" pattern="[0-9]+" title="numeric characters only" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="email">Email</label>
											<input type="text" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@email.com" placeholder="Email" class="form-control" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="no_id">No Identitas</label>
											<input type="text" name="no_id" id="no_id" placeholder="No Identitas" class="form-control" pattern="[0-9]+" title="numeric characters only" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="prov">Provinsi</label>
											<select name="prov" id="prov" class="form-control" onchange="ajaxkab(this.value)" required>
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
										</div>
										<div class="form-group">
				                            <label for="kab">Kabupaten</label>
				                            <select name="kab" id="kab" class="form-control" onchange="ajaxkec(this.value)" required>
				                                <option value="">Pilih Provinsi dahulu</option>
				                            </select>
				                        </div>
				                        <div class="form-group">
				                            <label for="kec">Kecamatan</label>
				                            <select name="kec" id="kec" class="form-control" onchange="ajaxkel(this.value)" required>
				                                <option value="">Pilih Kabupaten/Kota dahulu</option>
				                            </select>
				                        </div>
				                        <div class="form-group">
				                            <label for="kel">Kelurahan</label>
				                            <select name="kel" id="kel" class="form-control" required>
				                                <option value="">Pilih Kecamatan dahulu</option>
				                            </select>
				                        </div>
										<div class="form-group">
											<label class="control-label" for="sekolah">Sekolah</label>
											<input type="text" name="sekolah" id="sekolah" placeholder="Sekolah" class="form-control" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="jenis_masalah">Jenis Masalah</label>
											<select id="jenis_masalah" name="jenis_masalah" class="form-control" required>
				                                <option value="">Pilih</option>
				                                <option value="infrastruktur">Infrastruktur</option>
				                                <option value="bullying">Bullying</option>
				                                <option value="pungli">Pungutan Liar</option>
				                                <option value="pelecehan">Pelecehan</option>
				                            </select>
										</div>
										<div class="form-group">
				                            <label for="des_masalah">Deskripsi Masalah</label>
				                            <textarea class="form-control" id="des_masalah" name="des_masalah" placeholder="Deskripsi Masalah" required></textarea>
				                        </div>
				                        <div class="form-group">
				                            <label>Foto</label>
				                            <!-- <div id="checkbox_foto">
				                                <input type="checkbox" id="ubah_foto" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto
				                            </div> -->
				                            <input type="file" class="form-control" id="foto" name="foto" accept="image/gif,image/jpeg,image/jpg,image/png," onchange="return fileValidation()" required>
				                            <div id="valid_msg"></div>
				                            <div id="imagePreview" style="margin: 20px 0"></div>
				                        </div>
				                        <div class="form-group" id="autopilih" style="display: none">
				                            <label>Status</label>
				                            <select id="status_lap" name="status_lap" class="form-control">
				                                <option value="belum">Belum Diproses</option>
				                                <option value="sedang">Sedang Diproses</option>
				                                <option value="ditanggapi">Sudah Ditanggapi</option>
				                                <option value="selesai">Selesai</option>
				                                <option value="disposisi">Didisposisikan</option>
				                            </select>
				                        </div>
				                        <div class="form-group">                                    
                                              <input type="hidden" class="form-control" name="captcha" id="captcha" value="<?php echo $_SESSION['captcha']; ?>">
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

$(document).ready(function(){
    $('#reset').click(function(){
     $('#imagePreview').hide();
    });
});

</script>
<script>

$('#autopilih select').each(function(){
			$(this).find('option:eq(0)').prop("selected","selected");
		});
</script>

