<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: cursos.php');
	}

	include 'model/conexion.php';
	$id3 = $_POST['id3'];
    $Nombrecurso3 = $_POST['txtNombrecurso3'];
	$Cantidad_estu3= $_POST['txtCantidad3'];
	$Correo3 = $_POST['txtCorreo3'];
    $FechaI3= date('Y-m-d H:i:s', strtotime( $_POST['txtFechaI3']));
	$FechaF3= date('Y-m-d', strtotime( $_POST['txtFechaF3']));
    $Valor_c3= $_POST['txtValor3'];
    $Profesor3= $_POST['txtProfesor3'];


	$sentencia3 = $bd->prepare("UPDATE cursos SET nombre_curso = ?, cantidad_estu = ?, correo_curso = ?, 
												valor_curso = ?, fecha_inicio = ?, fecha_finalizacion = ?, id_profesor = ?   WHERE id_curso = ?;");
	$resultado2 = $sentencia3->execute([$Nombrecurso3,$Cantidad_estu3,$Correo3,$Valor_c3,$FechaI3,$FechaF3,$Profesor3, $id3]);

	if ($resultado2 === TRUE) {
		header('Location: cursos.php');
	}else{
		echo "Error";
	}
?>