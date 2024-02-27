<?php 

//conexion a bbdd
$link = mysqli_connect('localhost', 'root', '', 'steam');

//obtenemos el valor de la id desde la url y la asignamos a un variable
$id = $_GET['id'];

//consulta que permite ubicar toda la información el usuario con id = $id
$query = "SELECT * FROM usuarios WHERE id_user =".$id;

if($result = mysqli_query($link, $query)){//si la consulta devuelve informacion
	while($user = mysqli_fetch_assoc($result)){ //recorremos el resultado y lo asignamos a un array asociativo '$user'
		$name = $user['Nombre']; //cada valor obtenido de cada campo de la tabla "user" es asignado a un variable con el mismo nombre.
		$email = $user['Email'];
	}
}

//cerrar conexion a bbdd
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD - Read</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Detalles de usuario</h3>
		<ul>
			<li>ID: <?php echo $id ?></li>
			<li>Nombre: <?php echo $name ?></li>
			<li>Email: <?php echo $email ?></li>
		</ul>
		<a class="btn" href="index.php"><< Volver</a>
	</div>
</body>
</html>
