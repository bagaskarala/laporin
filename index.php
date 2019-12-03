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
        <?php include "koneksi.php";?>
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
                        <div class="col-sm-12 text">
                            <h1><strong>Laporin</strong></h1>
                            <div class="description">
                            	<p>
	                            	Aplikasi Pelaporan Online untuk Permasalahan dalam Lingkup Pendidikan
                            	</p>
                            </div>
                            <div class="top-big-link">
                            	<a class="btn btn-link-1" href="panduan.html">Panduan Melapor</a>
                            	<a class="btn btn-link-2" href="status.html">Lihat Berita</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Form Laporin</h3>
                            		<p>Isi form berikut dengan data yang valid</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                     <form name="form1" id="form" action="prosesinput.php" method="POST" enctype="multipart/form-data" onsubmit="return validation(this)">
                                        <div>
                                            <label class="control-label sr-only" for="ids">IDS</label>
                                            <div class="controls">
                                                <input type="hidden" name="ids" id="ids" placeholder="Tidak perlu di isi" class="form-control" readonly="readonly">
                                            </div>
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
                                            <label for="kab">Kabupaten</label>
                                            <select name="kab" id="kab" class="form-control form-select" onchange="ajaxkec(this.value)" required>
                                                <option value="">Pilih Provinsi dahulu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kec">Kecamatan</label>
                                            <select name="kec" id="kec" class="form-control form-select" onchange="ajaxkel(this.value)" required>
                                                <option value="">Pilih Kabupaten/Kota dahulu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kel">Kelurahan</label>
                                            <select name="kel" id="kel" class="form-control form-select" required>
                                                <option value="">Pilih Kecamatan dahulu</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="sekolah">Sekolah</label>
                                            <input type="text" name="sekolah" id="sekolah" placeholder="Sekolah" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="jenis_masalah">Jenis Masalah</label>
                                            <select id="jenis_masalah" name="jenis_masalah" class="form-control form-select" required>
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
				                            <label>Bukti Foto</label>
				                            <!-- <div id="checkbox_foto">
				                                <input type="checkbox" id="ubah_foto" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto
				                            </div> -->
				                            <label class="btn-bs-file btn btn-md btn-default">
							                Cari Foto
							                <input type="file" id="foto" name="foto" accept="image/gif,image/jpeg,image/jpg,image/png," onchange="return fileValidation()" required>
							            	</label>	
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
                                            <label for="captcha">Captcha</label>
                                            <div class="input-group" style="width:100%">
                                              <span class="input-group-addon" style="padding: 0;margin: 0; width:95px;">
                                               <img src="captcha.php" alt="captcha" style="height: 40px;width: auto;" /> 
                                              </span>
                                              <input type="text" class="form-control" name="captcha" id="captcha" maxlength="5" size="5" required="required" placeholder="Kode keamanan">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="controls">
                                                <button type="submit" name="input" id="input" class="btn btns">Simpan</button>
                                                <button type="reset" name="reset" id="reset" class="btn btnreset">Reset</button>          
                                            </div>
                                        </div>
                                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

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
                document.getElementById('imagePreview').innerHTML = '<div class="well"><img src="'+e.target.result+'" width=inherit; height=auto /></div>';
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



$('#autopilih select').each(function(){
            $(this).find('option:eq(0)').prop("selected","selected");});

</script>

    </body>
</html>