<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "fuegoancestral");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Validar sesión
if (!isset($_SESSION['usuario_id'])) {
    die("Debes iniciar sesión para agregar al carrito.");
}

$id_usuario = $_SESSION['usuario_id'];
$id_producto = $_POST['producto_id'];
$cantidad = $_POST['cantidad'] ?? 1;

// Verificar si ya existe en el carrito
$sql = "SELECT id, cantidad FROM carrito WHERE id_usuario = ? AND id_producto = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $id_usuario, $id_producto);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Ya existe, actualizar cantidad
    $row = $result->fetch_assoc();
    $nueva_cantidad = $row['cantidad'] + $cantidad;

    $update = $conexion->prepare("UPDATE carrito SET cantidad = ? WHERE id = ?");
    $update->bind_param("ii", $nueva_cantidad, $row['id']);
    $update->execute();
} else {
    // Insertar nuevo
    $insert = $conexion->prepare("INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES (?, ?, ?)");
    $insert->bind_param("iii", $id_usuario, $id_producto, $cantidad);
    $insert->execute();
}

header("Location: carrito.php"); // redirige al carrito
exit;
?>
