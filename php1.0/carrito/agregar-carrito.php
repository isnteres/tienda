<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    die("Debes iniciar sesión para agregar al carrito.");
}

if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("No se especificó un producto válido.");
}

$conexion = new mysqli("localhost", "root", "", "fuegoancestral");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id_usuario = $_SESSION['usuario_id'];
$id_producto = (int) $_POST['id'];
$cantidad = 1; // Puedes cambiar para que venga por formulario si quieres

// Verifica si el producto existe y obtiene datos reales
$query = $conexion->prepare("SELECT nombre, precio FROM productos WHERE id = ?");
$query->bind_param("i", $id_producto);
$query->execute();
$res = $query->get_result();

if ($res->num_rows == 0) {
    die("El producto no existe.");
}

$producto = $res->fetch_assoc();

// Verifica si ya está en el carrito
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

// Obtener la página de origen para redirigir, por defecto 'index.php'
$origen = isset($_GET['origen']) ? $_GET['origen'] : 'index.php';

header("Location: $origen?agregado=1");
exit;
?>
