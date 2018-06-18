<?php

 include "conn.php"; 
$requestData= $_REQUEST;


$columns = array( 
	0 => 'id_contact',
    1 => 'name', 
	2 => 'surnames',
	3 => 'address',
    4 => 'tel',
    5 => 'email',
    6 => 'city',
    7 => 'sexo',
    8 => 'notes'  
);

$sql = "SELECT id_contact, name, surnames, address, tel, email, city, sexo, notes ";
$sql.=" FROM contacts";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

///Busqueda
if( !empty($requestData['search']['value']) ) {
	$sql = "SELECT *";
	$sql.="FROM contacts";
	$sql.=" WHERE name LIKE '".$requestData['search']['value']."%' ";    // 
	$sql.=" OR surnames LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
} else {	

	$sql = "SELECT id_contact, name, surnames, address, tel, email, city, sexo, notes ";
	$sql.=" FROM contacts";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	
}
//Enviar los datos a la tabla
$data = array();
while( $row=mysqli_fetch_array($query) ) {
	$nestedData=array(); 

	$nestedData[] = $row["id_contact"];
    $nestedData[] = $row["name"];
	$nestedData[] = $row["surnames"];
	$nestedData[] = $row["address"];
    $nestedData[] = $row["tel"];
    $nestedData[] = $row["email"];
    $nestedData[] = $row["city"];
    $nestedData[] = $row["sexo"];
    $nestedData[] = $row["notes"];
    $nestedData[] = '<td><center>
                     <a href="editar.php?id='.$row['id_contact'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="index.php?action=delete&id='.$row['id_contact'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
				     </center></td>';		
	
	$data[] = $nestedData;
    
}

$json_data = array(
			"draw" => intval( $requestData['draw'] ),
			"recordsTotal" => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ), 
			"data" => $data  
			);
//Enviar los datos en Json
echo json_encode($json_data);

?>
