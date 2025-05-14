<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    die("Debes iniciar sesión para ver tu carrito.");
}

$conexion = new mysqli("localhost", "root", "", "fuegoancestral");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id_usuario = $_SESSION['usuario_id'];

// Consulta para obtener los productos del carrito con información del producto
$sql = "SELECT 
            c.id, 
            p.nombre, 
            p.precio, 
            c.cantidad, 
            (p.precio * c.cantidad) AS subtotal 
        FROM carrito c
        JOIN productos p ON c.id_producto = p.id
        WHERE c.id_usuario = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu Carrito</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #eee;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Carrito de Compras</h2>
    <table>
        <tr>
            <th>Producto</th>
            <th>Precio unitario</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nombre']) ?></td>
                <td>S/ <?= number_format($row['precio'], 2) ?></td>
                <td><?= $row['cantidad'] ?></td>
                <td>S/ <?= number_format($row['subtotal'], 2) ?></td>
            </tr>
            <?php $total += $row['subtotal']; ?>
        <?php endwhile; ?>

        <tr>
            <td colspan="3" class="total" style="text-align: right;">Total:</td>
            <td class="total">S/ <?= number_format($total, 2) ?></td>
        </tr>
    </table>
</body>
</html>
