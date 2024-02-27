<?php
//establezco la zona horaria por defecto
date_default_timezone_set('Europe/Madrid');

//si el formulario ha sido enviado procedo a ingresar contenido en la bbdd
if(isset($_POST['sw']) == 1){

	//conexion a bbdd
	$link = mysqli_connect('localhost', 'root', '', 'steam');

	//Consulta de insercion. Se reciben los valores de los inputs del formulario enviados por POST
	$query = "INSERT INTO biblioteca (Nombre, Peso) VALUES ('".$_POST['name']."', '".$_POST['peso']."')";
	if(mysqli_query($link, $query)){ // si la consulta se ejecuto con exito muestro mensaje y redirecciono a index.php
		echo "La informacion se guardo con exito";
		header('Location: biblioteca.php');
	}else{ //si hubo error muestro mensaje de error
		echo "Ocurrio un error al intentar guardar";
	}

	//cierro conexion a bbdd
	mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD - Create</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Nuevo juego</h3>
		<form action="createb.php" method="post">
			<label for="name">Nombre: </label><br />
			<input type="text" name="name" /><br /><br />
			<label for="peso">Peso: </label><br />
			<input type="text" name="peso" /><br /><br />
			<input class="btn-primary" type="submit" name="guardar" value="Guardar" /><br /><br />
			<a class="btn" href="biblioteca.php"><< Volver</a>
			<input type="hidden" name="sw" value="1" />
		</form>
		
	</div>
</body>
</html>