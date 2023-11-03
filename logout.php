<?php
session_start();
session_destroy(); // Destruir todas las variables de sesión

header("Location: login.php"); // Redirigir al inicio de sesión
?>
