<?php 
include 'conexion.php';
$destiid = $_POST['destiid'];
$idcliente = $_POST['idcliente'];
$fec_reg = date('Y-m-d');

$data = array();
$sql = "INSERT INTO viaje(des_id,cli_id,fec_reg) VALUES ($destiid,$idcliente,'$fec_reg')";
if ($conn->query($sql) === TRUE) {
    $data['error'] = 0;
    $data['message'] = 'Viaje Guardado de manera satisfactoria.';
} else {
    $data['error'] = 1;
    $data['message'] = 'Hubo un error al guardar los datos';
}

echo json_encode($data);
?>