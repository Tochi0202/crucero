<?php 
include 'conexion.php';
$id = $_POST['id'];

$data = array();
$sql = "DELETE FROM tb_depar WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    $data['error'] = 0;
    $data['message'] = 'Registro ELIMINADO correctamente.';
} else {
    $data['error'] = 1;
    $data['message'] = 'Hubo un error al eliminar el dato';
}

echo json_encode($data);
?>