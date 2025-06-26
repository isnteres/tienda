<?php
session_start();
require __DIR__ . '/conexion/conexion.php';

if (!isset($_SESSION['id'])) {
    die("Debes iniciar sesión para finalizar la compra.");
}

$carrito = $_SESSION['carrito'] ?? [];

if (empty($carrito)) {
    die("El carrito está vacío.");
}

$idUsuario = $_SESSION['id'];
$total = 0;
foreach ($carrito as $item) {
    $total += $item['precio'] * $item['cantidad'];
}

// Insertar la orden principal
$sqlOrden = "INSERT INTO ordenes (id_usuario, fecha, total) VALUES (?, NOW(), ?)";
$stmtOrden = $conn->prepare($sqlOrden);
if (!$stmtOrden) {
    die("Error en prepare orden: " . $conn->error);
}
$stmtOrden->bind_param("id", $idUsuario, $total);

if (!$stmtOrden->execute()) {
    die("Error en execute orden: " . $stmtOrden->error);
}

$idOrden = $stmtOrden->insert_id;
$stmtOrden->close();


$sqlDetalle = "INSERT INTO detalles_orden (id_orden, id_producto, cantidad, subtotal) VALUES (?, ?, ?, ?)";
$stmtDetalle = $conn->prepare($sqlDetalle);
if (!$stmtDetalle) {
    die("Error en prepare detalle: " . $conn->error);
}

foreach ($carrito as $idProd => $item) {
    $subtotal = $item['precio'] * $item['cantidad'];
    $stmtDetalle->bind_param("iiid", $idOrden, $idProd, $item['cantidad'], $subtotal);
    if (!$stmtDetalle->execute()) {
        die("Error en execute detalle: " . $stmtDetalle->error);
    }
}

$stmtDetalle->close();


unset($_SESSION['carrito']);


header("Location: mis_compras.php");
exit();
