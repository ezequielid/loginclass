<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Conexión a la base de datos (modifica con tus propias credenciales)
    $conex = mysqli_connect("localhost", "root", "", "usuarios_db");
    
    if (!$conex) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    $query = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = mysqli_query($conex, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $user["password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["correo"] = $user["correo"];
            header("Location: dashboard.php");
        } else {
            echo "Credenciales incorrectas";
        }
    } else {
        echo "Credenciales incorrectas";
    }
    
    mysqli_close($conex);
}
?>
