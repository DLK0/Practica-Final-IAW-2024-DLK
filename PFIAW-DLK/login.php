<?php
session_start();

// Verifica si el usuario ya está autenticado y redirige si es necesario
if (isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['name'];
    $email = $_POST['email'];

    $mysqli = new mysqli("localhost", "root", "", "steam");

    // Consulta SQL para verificar las credenciales
    $query = "SELECT id_user, Nombre, Email FROM usuarios WHERE Email = '$email' AND Nombre = '$user'";
    $res = $mysqli->query($query);

    if ($res && $res->num_rows > 0) {
        $user = $res->fetch_assoc();

        // Inicia la sesión y almacena la información del usuario
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['nombre'] = $user['Nombre'];
        $_SESSION['email'] = $user['Email'];

        // Redirige a la página principal
        header("Location: index.php");
        exit();
    } else {
        $error = "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Iniciar sesión</title>
</head>
<body>
    
    <form action="" method="post">
        <div class="login-container" id="loginForm">
        <h1>Iniciar sesión</h1>
        <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <label for="name">Nombre usuario:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>