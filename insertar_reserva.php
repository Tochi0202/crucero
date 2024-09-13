<?php 
include 'conexion.php';
$nombre = $_POST['nombre'];
$apepat = $_POST['apepat'];
$apemat = $_POST['apemat'];
$dni = $_POST['dni'];
$correo = $_POST['correo'];
$fecnac = $_POST['fecnac'];

$data = array();
$sql = "INSERT INTO cliente(cli_nomb,cli_apepat,cli_apemat,cli_dni,cli_corr,cli_fecnac,cli_estado) VALUES ('$nombre','$apepat','$apemat',$dni,'$correo','$fecnac',1)";
if ($conn->query($sql) === TRUE) {
    $data['error'] = 0;
    $data['message'] = 'Registro Guardado de manera satisfactoria.';
} else {
    $data['error'] = 1;
    $data['message'] = 'Hubo un error al guardar los datos';
}

echo json_encode($data);
?>