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
<div class="row">
        <div class="col-lg-12" id="judul">
            <h1 class="page-header">Data Admin</h1>
        </div>
    </div>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-refresh fa-spin"></i> Tabel Data Admin</h3> 
                        </div>
                        <div class="panel-body">
                            <div class="pull-left" style="margin-bottom: 10px;">
                            <a href="?module=data-admin&exe=create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah admin</a>
                            </div>

                                    <table id="tabeldata" class="table table-striped table-bordered table-hover">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	                                    
                                        <th>IDS</th>
	                                    <th>Nama </th>
                                        <th>Sekolah </th>
                                        <th>Kabupaten </th>
	                                    <th class="text-center"> Action </th> 
	  
                                       </tr>
                                      </thead>
                                        <tbody>
                                            <?php
                                                $ses_adm=$_SESSION['laporin']['username'];
                                                $sql = "SELECT * FROM login WHERE username!='$ses_adm' ORDER BY ids ASC";
                                            
                                            $query = mysqli_query($koneksi, $sql) or die(mysqli_error()); 
                                            while($row = mysqli_fetch_assoc($query)){
                                                if(!empty($row['kab'])){
                                                $sqlkab = "SELECT * FROM kabupaten WHERE id_kab=".$row['kab']."";
                                                $querykab = mysqli_query($koneksi, $sqlkab) or die(mysqli_error());
                                                $rowkab = mysqli_fetch_assoc($querykab);
                                                }else{$rowkab['nama']="";}
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['ids'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['username'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['sekolah'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $rowkab['nama'] ?>
                                                    </td>
                                                    <td><center>
                                                         <a href="?module=data-admin&exe=edit&id=<?php echo $row['ids'] ?>"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning" style="margin:5px 1px"> <i class="fa fa-pencil-square-o"></i> </a> 
                                                         <a href="?module=data-admin&exe=delete&id=<?php echo $row['ids'] ?>"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger" style="margin:5px 1px"> <i class="fa fa-trash-o"></i> </a>
                                                         </center>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            
                    
        
<?php
//include "js/ajax_datatable.js";
?>       

<script type="text/javascript">
    $(document).ready(function() {

        $('#tabeldata').DataTable();

    });
</script>
      
