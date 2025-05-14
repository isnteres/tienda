<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fuegoancestral";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $telefono = trim($_POST['telefono']);
    $email = trim($_POST['email']);
    $raw_pass = trim($_POST['contraseña']);

    if (!empty($nombre) && !empty($apellido) && !empty($telefono) && !empty($email) && !empty($raw_pass)) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_email = "Correo no válido.";
}

        $password = password_hash($raw_pass, PASSWORD_DEFAULT);

        $sql = $conn->prepare("INSERT INTO usuarios (nombre, apellido, telefono, email, password) VALUES (?, ?, ?, ?, ?)");

        if (!$sql) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        $sql->bind_param("sssss", $nombre, $apellido, $telefono, $email, $password);

        if ($sql->execute()) {
            header("Location: ../index2.php");
            exit();
        } else {
            echo "Error en el registro: " . $sql->error;
        }

        $sql->close();

    } else {
        echo "Todos los campos son obligatorios.";
    }
}

$conn->close();
?>