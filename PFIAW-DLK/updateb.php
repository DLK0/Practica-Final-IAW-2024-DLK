<?php
//zona horaria por defecto
date_default_timezone_set('Europe/Madrid');

//conexion a bbdd
$link = mysqli_connect('localhost', 'root', '', 'steam');

//si existe "id" en la url 
if(isset($_GET['id'])){
	$id = $_GET['id'];//le asigno una variable 
	$query1 = "SELECT * FROM biblioteca WHERE id_game =".$id; //cadena de consulta para el elemento $id
	if($result = mysqli_query($link, $query1)){ //si obtengo resultados ejecutando la consulta anterior
		while($user = mysqli_fetch_assoc($result)){ //asigno ese resultado a un array asociativo $user
			$name = $user['Nombre']; //creo variables con los nombres de los campos de la tabla "users" 
			$peso = $user['Peso'];
		}
	}

}

if(isset($_POST['sw']) == 1){ //si se ha presionado el boton "Actualizar" 

	//cadena con la orden de actualizacion a la tabla "users" con los valores de los inputs enviados por POST
	$query2 = "UPDATE biblioteca SET Nombre='".$_POST['name']."', Peso='".$_POST['peso']."' WHERE id_game=".$_POST['id'];
	if(mysqli_query($link, $query2)){ //si la consulta se ejecuta con exito
		echo "La informacion se actualizo con exito"; //mensaje de exito
		header('Location: biblioteca.php'); //redireccion a bilbioteca.php
	}else{ //si ocurrio un error
		echo "Ocurrio un error al intentar actualizar"; //mensaje de error
	}
}

//cierro conexion a bbdd
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD - Update</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Editar juego</h3>
		<form action="updateb.php" method="post">
			<label for="name">Nombre: </label><br />
			<input type="text" name="name" value="<?php if(isset($name)) echo $name; ?>" /><br /><br />

			<label for="peso">Peso: </label><br />
			<input type="text" name="peso" value="<?php if(isset($peso)) echo $peso; ?>" /><br /><br />

			<input class="btn-success" type="submit" name="actualizar" value="Actualizar" /><br /><br />
			<a class="btn" href="biblioteca.php"><< Volver</a>
			<input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" />
			<input type="hidden" name="sw" value="1" />
		</form>
	</div>
</body>
</html>