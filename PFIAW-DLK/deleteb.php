<!DOCTYPE html>
<html>
<head>
	<title>CRUD - Delete</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Eliminar juego</h3>
		<p>Esta seguro que quiere eliminar este registro permanentemente de la base de datos?</p>
		<form action="deleteb.php" method="post">
			<input class="btn-danger" type="submit" name="eliminar" value="Eliminar" />
			<input type="hidden" name="sw" value="1" />
			<?php if(isset($_GET['id'])): ?>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<?php endif; ?>
		</form><br />
		<a class="btn" href="biblioteca.php"><< Volver</a>
	</div>
</body>
</html>
<?php 

//conexion a bbdd
$link = mysqli_connect('localhost', 'root', '', 'steam');

//si el formulario fue enviado
if(isset($_POST['sw']) == 1){

	//cadena con la consulta de eliminacion segun el id de usuario
	$query = "DELETE FROM biblioteca WHERE id_game =".$_POST['id']; //No olvidar el WHERE en el DELETE!!

	if(mysqli_query($link, $query)){ //si la consulta devuelve un resultado
		header("Location: biblioteca.php"); //redirecciono a biblioteca.php
	}else{ //si hubo un error
		echo "Ocurrio un error al intentar eliminar el registro"; //mensaje de error
	}
}

//cierro conexion a bbdd
mysqli_close($link);
?>