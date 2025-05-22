<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    die("Debes iniciar sesión.");
}

$conexion = new mysqli("localhost", "root", "", "fuegoancestral");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id_usuario = $_SESSION['usuario_id'];
$item_id = $_POST['item_id'];
$cantidad = (int) $_POST['cantidad'];

// Validar cantidad
if ($cantidad < 0) {
    header("Location: carrito.php?error=cantidad_invalida");
    exit;
}

if ($cantidad == 0) {
    // Eliminar si cantidad = 0
    $delete = $conexion->prepare("DELETE FROM carrito WHERE id = ? AND id_usuario = ?");
    $delete->bind_param("ii", $item_id, $id_usuario);
    $delete->execute();
} else {
    // Actualizar si cantidad > 0
    $update = $conexion->prepare("UPDATE carrito SET cantidad = ? WHERE id = ? AND id_usuario = ?");
    $update->bind_param("iii", $cantidad, $item_id, $id_usuario);
    $update->execute();
}

header("Location: carrito.php");
exit;
?>
