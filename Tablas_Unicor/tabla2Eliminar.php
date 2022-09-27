<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$codigo = $_GET['id'];
	include 'model/conexion.php';
	$sentencia = $bd->prepare("DELETE FROM cursos WHERE id_curso= ?;");
	$resultado = $sentencia->execute([$codigo]);

	if ($resultado === TRUE) {
		header('Location: cursos.php');
	}else{
		echo "Error";
	}

?>