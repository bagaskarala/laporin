<?php
include 'koneksi_pdo.php';
if (!empty($_GET['prov'])){
  if (ctype_digit($_GET['prov'])) {
    $query = $pdo->prepare("SELECT * FROM kabupaten WHERE id_prov=:prov ORDER BY nama");
    $query->execute(array(':prov'=>$_GET['prov']));
    echo"<option value=''>Pilih Kota/Kab</option>";
    while($d = $query->fetchObject()){
      echo "<option value='{$d->id_kab}'>{$d->nama}</option>";
    }

    // $prov = $_GET['prov'];
    // $query = mysqli_query($koneksi, "SELECT * FROM kabupaten WHERE id_prov='$prov' ORDER BY nama");
    // while($row = mysqli_fetch_assoc($query)) 
    // {echo '<option value="'.$row['id_kab'].'">'.$row['nama'].'</option>';}
  }
}
if (!empty($_GET['kab'])){
  if (ctype_digit($_GET['kab'])) {
    $query = $pdo->prepare("SELECT * FROM kecamatan WHERE id_kab=:kab ORDER BY nama");
    $query->execute(array(':kab'=>$_GET['kab']));
    echo"<option value=''>Pilih Kecamatan</option>";
    while($d = $query->fetchObject()){
      echo "<option value='{$d->id_kec}'>{$d->nama}</option>";
    }
    // $kab = $_GET['kab'];
    // $query = mysqli_query($koneksi, "SELECT * FROM kecamatan WHERE id_kab='$kab' ORDER BY nama");
    // while($row = mysqli_fetch_assoc($query)) 
    // {echo '<option value="'.$row['id_kec'].'">'.$row['nama'].'</option>';}
  }
}
if (!empty($_GET['kec'])){
  if (ctype_digit($_GET['kec'])) {
    $query = $pdo->prepare("SELECT * FROM kelurahan WHERE id_kec=:kec ORDER BY nama");
    $query->execute(array(':kec'=>$_GET['kec']));
    echo"<option value=''>Pilih Kelurahan/Desa</option>";
    while($d = $query->fetchObject()){
      echo "<option value='{$d->id_kel}'>{$d->nama}</option>";
    }
    // $kec = $_GET['kec'];
    // $query = mysqli_query($koneksi, "SELECT * FROM kecamatan WHERE id_kec='$kec' ORDER BY nama");
    // while($row = mysqli_fetch_assoc($query)) 
    // {echo '<option value="'.$row['id_kel'].'">'.$row['nama'].'</option>';}
  }
}