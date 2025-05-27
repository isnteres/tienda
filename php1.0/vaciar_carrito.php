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

$delete = $conexion->prepare("DELETE FROM carrito WHERE id_usuario = ?");
$delete->bind_param("i", $id_usuario);
$delete->execute();

header("Location: carrito.php");
exit;
?>
