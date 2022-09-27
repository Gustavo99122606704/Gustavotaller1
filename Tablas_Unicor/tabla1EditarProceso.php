<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'model/conexion.php';
	$id2 = $_POST['id2'];
	$apellidos2 = $_POST['txtApellidos2'];
	$n_identificacion2= $_POST['txtIdentificacion2'];
	$nombre2= $_POST['txtNombre2'];
	$telefono2= $_POST['txtTelefono2'];

	$sentencia = $bd->prepare("UPDATE profesor SET apellidos = ?, n_identificacion = ?, nombre = ?, 
												telefono = ?  WHERE id_profesor = ?;");
	$resultado = $sentencia->execute([$apellidos2,$n_identificacion2,$nombre2,$telefono2, $id2]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>