<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$Nombrecurso = $_POST['txtNombrecurso'];
	$Cantidad_estu= $_POST['txtCantidad'];
	$Correo = $_POST['txtCorreo'];
    $FechaI= date('Y-m-d H:i:s', strtotime( $_POST['txtFechaI']));
	$FechaF= date('Y-m-d', strtotime( $_POST['txtFechaF']));
    $Valor_c= $_POST['txtValor'];
    $Profesor= $_POST['txtProfesor'];


	$sentencia = $bd->prepare("INSERT INTO cursos(nombre_curso,cantidad_estu,correo_curso,valor_curso,fecha_inicio,fecha_finalizacion,id_profesor) VALUES (?,?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$Nombrecurso,$Cantidad_estu,$Correo,$Valor_c,$FechaI,$FechaF,$Profesor]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: cursos.php');
	}else{
		echo "Error";
	}
?>