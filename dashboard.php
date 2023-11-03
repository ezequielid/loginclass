<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirigir al inicio de sesión si no hay sesión activa
}

// Aquí puedes construir la interfaz del panel de control
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       
        </style>
    <title>Panel de control</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION["username"]; ?></h2>
    <p>Contenido del panel de control.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
