<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$database = "fuegoancestral";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $contraseña = trim($_POST['contraseña']);

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        if (password_verify($contraseña, $usuario['contraseña'])) {
            $_SESSION['usuario'] = $usuario['email'];
            header("Location: ../perfil.php");
            exit();

        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href='../inicio.php';</script>";
        }
    } else {
        echo "<script>alert('El usuario no existe'); window.location.href='../inicio.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
