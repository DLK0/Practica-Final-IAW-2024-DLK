<?php
	session_start();

	// Verifica si el usuario está autenticado y redirige en caso de que no este logeado
	if (!isset($_SESSION['id_user'])) {
		header("Location: login.php");
		exit();
	}

	//Conexion a la base de datos
	$link = mysqli_connect('localhost', 'root', '', 'steam');

	//Consulta que me devuelve todos los registros de la tabla "usuarios"
	$query = "SELECT * FROM usuarios";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h2><h1>Bienvenido, <?php echo $_SESSION['nombre']; ?>!</h1></h2>
		<a href="logout.php" class='btn btn-primary'>Cerrar sesión</a>
		<h3>Lista de usuarios</h3>
		<a href="create.php" class='btn btn-primary'>Nuevo usuario</a>
		<a href="biblioteca.php" class='btn btn-primary'>Lista de juegos</a>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Email</th>
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
						<td width="5%" class="text-center"><?php echo $user['id_user']; ?></td>
						<td width="20%"><a href="read.php?id=<?php echo $user['id_user'] ?>"><?php echo $user['Nombre']; ?></a></td>
						<td width="15%"><?php echo $user['Email']; ?></td>
						<td width="15%" class="text-center">
							<a href="update.php?id=<?php echo $user['id_user'] ?>" class='btn btn-success'>Editar</a> <a href="delete.php?id=<?php echo $user['id_user'] ?>" class='btn btn-danger'>Eliminar</a>
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