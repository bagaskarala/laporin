$(document).ready(function(){
	// Sembunyikan loading simpan, loading ubah, loading hapus, pesan error, pesan sukes, dan tombol reset
	$("#loading-simpan, #loading-ubah, #loading-hapus, #pesan-error, #pesan-sukses, #btn-reset").hide();
	
	$("#btn-tambah").click(function(){ // Ketika tombol tambah diklik
		$("#btn-ubah, #checkbox_foto").hide(); // Sembunyikan tombol ubah dan checkbox foto
		$("#btn-simpan").show(); // Munculkan tombol simpan
		
		// Set judul modal dialog menjadi Form Simpan Data
		$("#modal-title").html("Form Simpan data");

		$('#statuz select').each(function(){
			$(this).find('option:eq(1)').prop("selected","selected");
		});
	});
	$("#statuz").hide();
	
	$("#btn-simpan").click(function(){ // Ketika tombol simpan di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		
		data.append('ids', $("#ids").val());
		data.append('nama', $("#nama").val());
		data.append('no_telp', $("#no_telp").val());
		data.append('email', $("#email").val());
		data.append('no_id', $("#no_id").val());
		data.append('prov', $("#prov").val()); 
		data.append('kab', $("#kab").val());
		data.append('kec', $("#kec").val());
		data.append('kel', $("#kel").val());
		data.append('sekolah', $("#sekolah").val());
		data.append('jenis_masalah', $("#jenis_masalah").val());
		data.append('des_masalah', $("#des_masalah").val()); 
		data.append('status_lap', $("#status_lap").val());
		
		// Ambil data foto yang dipilih pada form, dan masukkan ke variabel data
		data.append('foto', $("#foto")[0].files[0]);
		
		$("#loading-simpan").show(); // Munculkan loading simpan
		
		


		$.ajax({
			url: 'proses_simpan.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-simpan").hide(); // Sembunyikan loading simpan
				
				if(response.status == "sukses"){ // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
					$("#view").html(response.html);
					
					/*
					 * Ambil pesan suksesnya dan set ke div pesan-sukses
					 * Lalu munculkan div pesan-sukes nya
					 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
					 */
					$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
					
					$("#form input, #form select").val(""); // Untuk meng-clear isian pada form
					$("#form-modal").modal('hide'); // Close / Tutup Modal Dialog
				}else{ // Jika statusnya = gagal
					/*
					 * Ambil pesan errornya dan set ke div pesan-error
					 * Lalu munculkan div pesan-error nya
					 */
					$("#pesan-error").html(response.pesan).show();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText); // munculkan alert
			}
		});
	});

	
	$("#btn-ubah").click(function(){ // Ketika tombol ubah di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		
		data.append('ids', $("#ids").val());
		data.append('nama', $("#nama").val());
		data.append('no_telp', $("#no_telp").val());
		data.append('email', $("#email").val());
		data.append('no_id', $("#no_id").val());
		data.append('prov', $("#prov").val()); 
		data.append('kab', $("#kab").val());
		data.append('kec', $("#kec").val());
		data.append('kel', $("#kel").val());
		data.append('sekolah', $("#sekolah").val());
		data.append('jenis_masalah', $("#jenis_masalah").val());
		data.append('des_masalah', $("#des_masalah").val()); 
		data.append('status_lap', $("#status_lap").val());
		
		// Cek apakah checkbox ubah foto di ceklis
		if($("#ubah_foto").is(":checked")) // Jika di ceklis
			data.append('ubah_foto', $("#ubah_foto").val()); // Ambil data ubah foto (dari checkbox foto)
		
		// Ambil data foto yang dipilih pada form, dan masukkan ke variabel data
		data.append('foto', $("#foto")[0].files[0]);
		
		$("#loading-ubah").show(); // Munculkan loading ubah
		
		$.ajax({
			url: 'proses_ubah.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-ubah").hide(); // Sembunyikan loading ubah
				
				if(response.status == "sukses"){ // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
					$("#view").html(response.html);
					
					/*
					 * Ambil pesan suksesnya dan set ke div pesan-sukses
					 * Lalu munculkan div pesan-sukes nya
					 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
					 */
					$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
					
					$("#form input, #form select").val(""); // Untuk meng-clear isian pada form
					$("#form-modal").modal('hide'); // Close / Tutup Modal Dialog
				}else{ // Jika statusnya = gagal
					/*
					 * Ambil pesan errornya dan set ke div pesan-error
					 * Lalu munculkan div pesan-error nya
					 */
					$("#pesan-error").html(response.pesan).show();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText); // Munculkan alert
			}
		});
	});
	
	$("#btn-hapus").click(function(){ // Ketika tombol hapus di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		data.append('ids', $("#data-ids").val()); // Ambil data nis
		
		$("#loading-hapus").show(); // Munculkan loading hapus
		
		$.ajax({
			url: 'proses_hapus.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-hapus").hide(); // Sembunyikan loading hapus
				
				// Ganti isi dari div view dengan view yang diambil dari proses_hapus.php
				$("#view").html(response.html);
				
				/*
				 * Ambil pesan suksesnya dan set ke div pesan-sukses
				 * Lalu munculkan div pesan-sukes nya
				 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
				 */
				$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
				
				$("#delete-modal").modal('hide'); // Close / Tutup Modal Dialog
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert("ERROR : "+xhr.responseText); // Munculkan alert
			}
		});
	});
	
	$('#form-modal').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
		$("#btn-reset").click(); // Klik tombol reset agar form kembali bersih
		$("#ids").removeAttr('readonly'); // Enable textbox nis
	});
});
