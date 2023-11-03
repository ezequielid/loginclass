<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $correo = $_POST["correo"];
    
    // Conexión a la base de datos (modifica con tus propias credenciales)
    $conex = mysqli_connect("localhost", "root", "", "usuarios_db");
    
    if (!$conex) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO usuarios (username, password, correo) VALUES ('$username', '$hashedPassword', '$correo')";
    $result = mysqli_query($conex, $query);
    
    if ($result) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($conex);
    }
    
    mysqli_close($conex);
}
?>
