<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    die("Debes iniciar sesión para ver tu carrito.");
}

$conexion = new mysqli("localhost", "root", "", "fuegoancestral");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$id_usuario = $_SESSION['usuario_id'];


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
            text-align: center;
        }
        th {
            background: #eee;
        }
        .total {
            font-weight: bold;
        }
        .acciones {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .acciones form {
            display: inline;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Carrito de Compras</h2>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'datos_invalidos'): ?>
        <p style="color:red; text-align:center;">Error: Datos inválidos.</p>
    <?php endif; ?>

    <table>
        <tr>
            <th>Producto</th>
            <th>Precio unitario</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acciones</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nombre']) ?></td>
                <td>S/ <?= number_format($row['precio'], 2) ?></td>
                <td>
                    <form method="POST" action="actualizar.php" onsubmit="this.querySelector('button[type=submit]').disabled = true;">
                        <input type="hidden" name="item_id" value="<?= $row['id'] ?>">
                        <input type="number" name="cantidad" class="cantidad-input" value="<?= $row['cantidad'] ?>" min="0">
                        <button type="submit">Actualizar</button>
                    </form>
                </td>
                <td>S/ <?= number_format($row['subtotal'], 2) ?></td>
                <td class="acciones">
                    <form method="GET" action="eliminar.php">
                        <input type="hidden" name="item_id" value="<?= $row['id'] ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php $total += $row['subtotal']; ?>
        <?php endwhile; ?>

        <tr>
            <td colspan="3" class="total" style="text-align: right;">Total:</td>
            <td class="total">S/ <?= number_format($total, 2) ?></td>
            <td>
                <form method="POST" action="vaciar.php" onsubmit="return confirm('¿Estás seguro de vaciar tu carrito?');">
                    <button type="submit">Vaciar Carrito</button>
                </form>
            </td>
        </tr>
    </table>

    <script>
    document.querySelectorAll(".cantidad-input").forEach(input => {
        input.addEventListener("change", () => {
            if (input.value < 0 || isNaN(input.value)) {
                alert("Cantidad inválida");
                input.value = 1;
            }
        });
    });
    </script>
</body>
</html>