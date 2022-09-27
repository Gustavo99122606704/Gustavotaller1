<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$apellidos = $_POST['txtApellidos'];
	$n_identificacion= $_POST['txtIdentificacion'];
	$nombre = $_POST['txtNombre'];
	$telefono= $_POST['txtTelefono'];

	$sentencia = $bd->prepare("INSERT INTO profesor(apellidos,nombre,n_identificacion,telefono) VALUES (?,?,?,?);");
	$resultado = $sentencia->execute([$apellidos,$nombre,$n_identificacion,$telefono]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>