<?php 
include 'conexion.php';
$dni = $_POST['dni'];

$sql = "SELECT * FROM cliente WHERE cli_dni = $dni";
$result = $conn->query($sql);

$datatab = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data = array();
    $data['cli_id'] = $row["cli_id"];
    $data['cli_nomb'] = $row["cli_nomb"];
    $data['cli_apepat'] = $row["cli_apepat"];
    $data['cli_apemat'] = $row["cli_apemat"];
    array_push($datatab, $data);
  }
}

echo json_encode($datatab);
?>