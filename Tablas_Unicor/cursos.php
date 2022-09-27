<?php  

	include 'model/conexion.php';
	$sentencia = $bd->query("SELECT * FROM cursos;");
	$cursos = $sentencia->fetchAll(PDO::FETCH_OBJ);

	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de cursos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="formulario">
<h3>Ingresar cursos:</h3>
		<form method="POST" action="tabla2Insertar.php">
			<table class="table1">
			    <tr>
				    <td>Nombre curso: </td>
					<td><input type="text" name="txtNombrecurso"></td>
				</tr>
				<tr>
					<td>Cantidad estudiante: </td>
					<td><input type="number" name="txtCantidad"></td>
				</tr>
				<tr>
					<td>Correo curso: </td>
					<td><input type="email" name="txtCorreo"></td>
				</tr>
				<tr>
					<td>Fecha Inicio: </td>
					<td><input type="datetime-local" name="txtFechaI"></td>
				</tr>
                <tr>
					<td>Fecha Finalizacion: </td>
					<td><input type="date" name="txtFechaF"></td>
				</tr>
                <tr>
					<td>Valor curso: </td>
					<td><input type="text" name="txtValor"></td>
				</tr>
                <tr>
					<td>Profesor: </td>
					<td>
					<select name="txtProfesor" id="">
					
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

				<input type="hidden" name="oculto" value="1">
				
			</table>
			<div class="botones">
					
					<div><input type="submit" class="form__button" value="Ingresar cursos"></div>
					<div><input type="reset" class="form__button"  name="" value="Limpiar"></div>
					<div><a href="index.php" class="form__buttonn">Ir registrar profesor</a></div>
					
					
           </div>
		</form>
		<!-- fin insert-->
        <hr>
		<h3>Lista de cursos</h3>
		<table>
			<tr>
				<td>Código</td>
				<td>Nombre curso</td>
				<td>Cantidad estudiante</td>
				<td>Correo curso</td>
				<td>Fecha Inicio</td>
                <td>Fecha Finalizacion</td>
                <td>Valor curso</td>
                <td>Profesor</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>

			<?php 
				foreach ($cursos as $dato2) {
		
					?>
					<tr>
						<td><?php echo $dato2->id_curso; ?></td>
						<td><?php echo $dato2->nombre_curso; ?></td>
						<td><?php echo $dato2->cantidad_estu ?></td>
						<td><?php echo $dato2->correo_curso; ?></td>
						<td><?php echo $dato2->fecha_inicio; ?></td>
                        <td><?php echo $dato2->fecha_finalizacion; ?></td>
                        <td><?php echo $dato2->valor_curso; ?></td>
                        <td><?php echo $dato2->id_profesor; ?></td>
					

						<td><a href="tabla2Editar.php?id=<?php echo $dato2->id_curso; ?>">Editar</a></td>
						<td><a href="tabla2Eliminar.php?id=<?php echo $dato2->id_curso; ?>">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>

	</div>
		
		
		

</body>

</html>