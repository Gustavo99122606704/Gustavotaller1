<?php  

	include 'model/conexion.php';
	$id = $_GET['id'];

	$sentencia4 = $bd->prepare("SELECT * FROM cursos WHERE id_curso = ?;");
	$sentencia4->execute([$id]);
	$persona2 = $sentencia4->fetch(PDO::FETCH_OBJ);
		//print_r($persona);
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar cursos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="formulario"> <h3>Editar cursos:</h3>
		<form method="POST" action="tabla2EditarProceso.php">
			<table class="table2">
            <tr>
				    <td>Nombre curso: </td>
					<td><input type="text" name="txtNombrecurso3" value="<?php echo $persona2->nombre_curso; ?>"></td>
				</tr>
				<tr>
					<td>Cantidad estudiante: </td>
					<td><input type="number" name="txtCantidad3" value="<?php echo $persona2->cantidad_estu; ?>"></td>
				</tr>
				<tr>
					<td>Correo curso: </td>
					<td><input type="email" name="txtCorreo3" value="<?php echo $persona2->correo_curso; ?>"></td>
				</tr>
				<tr>
					<td>Fecha Inicio: </td>
					<td><input type="datetime-local" name="txtFechaI3" value="<?php echo $persona2->fecha_inicio; ?>"></td>
				</tr>
                <tr>
					<td>Fecha Finalizacion: </td>
					<td><input type="date" name="txtFechaF3" value="<?php echo $persona2->fecha_finalizacion; ?>"></td>
				</tr>
                <tr>
					<td>Valor curso: </td>
					<td><input type="text" name="txtValor3" value="<?php echo $persona2->valor_curso; ?>"></td>
				</tr>
                <tr>
					<td>Profesor: </td>
					<td>
					<select name="txtProfesor3" id="">
					
					<?php 
					$sentencia1 = $bd->query("SELECT * FROM profesor;");
					$profesorr = $sentencia1->fetchAll(PDO::FETCH_OBJ);
				    foreach ($profesorr as $salida) {
					?>
					<option value="<?php echo $salida->id_profesor?>"><?php echo $salida->nombre ?> </option>
					<?php
				}
			     ?> 
					</select>
					</td>
					
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id3" value="<?php echo $persona2->id_curso; ?>">
				</tr>
			</table>
			<div class="botones">
					
					<div><input type="submit" class="form__button" value="Editar curso"></div>
					
					
           </div>
		</form>
	</div>
		
</body>
</html>