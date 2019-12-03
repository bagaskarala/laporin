<?php
/* Database connection start */
include "koneksi.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'ids',
    1 => 'nama', 
	2 => 'sekolah',
	3 => 'jenis_masalah',
    4 => 'status_lap',
      
);

// getting total number records without any search
$sql = "SELECT ids, nama, sekolah, jenis_masalah, status_lap ";
$sql.=" FROM laporan";
$query=mysqli_query($koneksi, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT ids, nama, sekolah, jenis_masalah, status_lap ";
	$sql.=" FROM laporan";
	$sql.=" WHERE nama LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR sekolah LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR jenis_masalah LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR status_lap LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($koneksi, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($koneksi, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT ids, nama, sekolah, jenis_masalah, status_lap ";
	$sql.=" FROM laporan";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($koneksi, $sql) or die("ajax-grid-data.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["ids"];
    $nestedData[] = $row["nama"];
	$nestedData[] = $row["sekolah"];
	$nestedData[] = $row["jenis_masalah"];
    $nestedData[] = $row["status_lap"];
    $nestedData[] = '<td><center>
                     <a href="?module=admin&exe=edit&id='.$row['ids'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning" style="margin:5px"> <i class="fa fa-pencil-square-o"></i> </a>
                     <a href="?module=admin&exe=detail&id='.$row['ids'].'"  data-toggle="tooltip" title="Lihat" class="btn btn-sm btn-info" style="margin:5px"> <i class="fa fa-eye"></i> </a>
                     <a href="?module=admin&exe=delete&id='.$row['ids'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger" style="margin:5px"> <i class="fa fa-trash-o"></i> </a>
				     </center></td>';		
	
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
