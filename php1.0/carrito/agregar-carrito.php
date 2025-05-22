<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "fuegoancestral");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if (!isset($_SESSION['usuario_id'])) {
    die("Debes iniciar sesión para agregar al carrito.");
}

$id_usuario = $_SESSION['usuario_id'];
$id_producto = $_POST['id'];   
$nombre = $_POST['nombre'];   
$precio = $_POST['precio'];   
$cantidad = 1; 


$verifica = $conexion->prepare("SELECT id FROM productos WHERE id = ?");
$verifica->bind_param("i", $id_producto);
$verifica->execute();
$res = $verifica->get_result();

if ($res->num_rows == 0) {
    die("El producto no existe.");
}


$sql = "SELECT id, cantidad FROM carrito WHERE id_usuario = ? AND id_producto = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $id_usuario, $id_producto);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $nueva_cantidad = $row['cantidad'] + $cantidad;

    $update = $conexion->prepare("UPDATE carrito SET cantidad = ? WHERE id = ?");
    $update->bind_param("ii", $nueva_cantidad, $row['id']);
    $update->execute();
} else {
   
    $insert = $conexion->prepare("INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES (?, ?, ?)");
    $insert->bind_param("iii", $id_usuario, $id_producto, $cantidad);
    $insert->execute();
}

header("Location: carrito.php");
exit;

?>
