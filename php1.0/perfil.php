<?php
session_start(); 

if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "fuegoancestral";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta del perfil
$email = $_SESSION['usuario'];
$sql = "SELECT nombre, apellido, email, telefono FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: login.html");
    exit();
}

$usuario = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Fuego Ancestral</title>
    <link rel="stylesheet" href="estilos/perfil.css">
</head>
<body>
    <div class="perfil-contenedor">
        <h1>Perfil del Usuario</h1>
        <div class="perfil-info">
            <p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></p>
            <p><strong>Apellido:</strong> <?= htmlspecialchars($usuario['apellido']) ?></p>
            <p><strong>Correo Electrónico:</strong> <?= htmlspecialchars($usuario['email']) ?></p>
            <p><strong>Teléfono:</strong> <?= htmlspecialchars($usuario['telefono']) ?></p>
        </div>
        <div class="perfil-acciones">
            <a class="btn" href="/tienda/php1.0/index.php?vista=logaut">Cerrar sesión</a>
            <a class="btn" href="/tienda/php1.0/index2.php">Ir al Inicio</a>
        </div>
    </div>
</body>
</html>
