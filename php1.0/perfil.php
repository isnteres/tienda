<link rel="stylesheet" href="estilos/perfil.css">
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

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$email = $_SESSION['usuario'];
$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    
} else {
    
    header("Location: login.html");
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Fuego Ancestral</title>
    <link rel="stylesheet" href="estilos/perfil.css">
</head>
<body>
    <div class="container">
        <h2>Bienvenido, <?php echo $usuario['nombre']; ?>!</h2>
        <p><strong>Correo:</strong> <?php echo $usuario['email']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $usuario['telefono']; ?></p>
        <p><strong>Apellido:</strong> <?php echo $usuario['apellido']; ?></p>

       
        <a href="/tienda/php1.0/index.php?vista=logaut">Cerrar sesión</a>
        <a href="/tienda/php1.0/index2.php">Inicio</a>
    </div>
</body>
</html>