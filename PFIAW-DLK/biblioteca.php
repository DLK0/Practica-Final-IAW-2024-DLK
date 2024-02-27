<?php 
	//Conecto a mi base de datos
	$link = mysqli_connect('localhost', 'root', '', 'steam');

	//Cadena de consulta que me devuelve todos los registros de la tabla 'users'
	$query = "SELECT * FROM biblioteca";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Biblioteca</h3>
        <a href="createb.php" class='btn btn-primary'>Agregar juego</a>
        <a href="index.php" class='btn btn-primary'>Gestionar usarios</a>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Peso en GB</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				//Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
				if($result = mysqli_query($link, $query)):  
			?>
				<?php 
					//la variable $user contiene el contenido de $result en un array asociativo
					while($user = mysqli_fetch_assoc($result)): 
				?>
					<tr>
						<td width="5%" class="text-center"><?php echo $user['id_game']; ?></td>
						<td width="20%"><?php echo $user['Nombre']; ?></td>
						<td width="15%"><?php echo $user['Peso']; ?></td>
						<td width="15%" class="text-center">
							<a href="updateb.php?id=<?php echo $user['id_game'] ?>" class='btn btn-success'>Editar</a> <a href="deleteb.php?id=<?php echo $user['id_game'] ?>" class='btn btn-danger'>Eliminar</a>
						</td>
					</tr>
				<?php endwhile; ?>
				<?php mysqli_free_result($result); ?>
			<?php endif; ?>
			</tbody>		
		</table>
	</div>
</body>
</html>
<?php 
//cierro conexion a bbdd
mysqli_close($link); 
?>