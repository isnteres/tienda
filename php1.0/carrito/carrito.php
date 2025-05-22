<?php
session_start();

// Validaciones (ajusta según tu sistema)
if (!isset($_SESSION['usuario_id'])) {
    echo "<p>Debes iniciar sesión para ver tu carrito.</p>";
    exit;
}

$conexion = new mysqli("localhost", "root", "", "fuegoancestral");
if ($conexion->connect_error) {
    echo "<p>Error de conexión con la base de datos.</p>";
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

$sql = "SELECT c.id, p.nombre, p.precio, c.cantidad, (p.precio * c.cantidad) AS subtotal
        FROM carrito c
        JOIN productos p ON c.id_producto = p.id
        WHERE c.id_usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;

// Contenido que el AJAX va a cargar (solo la tabla y mensajes)
if ($result->num_rows == 0) {
    echo "<p style='text-align:center;'>Tu carrito está vacío.</p>";
} else {
    ?>
    <table style="width:100%; border-collapse: collapse;">
        <thead>
            <tr style="background:#eee;">
                <th>Producto</th>
                <th>Precio unitario</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr style="border-bottom:1px solid #ccc;">
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td>S/ <?= number_format($row['precio'], 2) ?></td>
            <td>
                <form method="POST" action="actualizar.php" onsubmit="this.querySelector('button[type=submit]').disabled = true;">
                    <input type="hidden" name="item_id" value="<?= $row['id'] ?>">
                    <input type="number" name="cantidad" class="cantidad-input" value="<?= $row['cantidad'] ?>" min="0" style="width:60px;">
                    <button type="submit">Actualizar</button>
                </form>
            </td>
            <td>S/ <?= number_format($row['subtotal'], 2) ?></td>
            <td>
                <form method="GET" action="eliminar.php">
                    <input type="hidden" name="item_id" value="<?= $row['id'] ?>">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php
        $total += $row['subtotal'];
    }
    ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right; font-weight: bold;">Total:</td>
                <td style="font-weight: bold;">S/ <?= number_format($total, 2) ?></td>
                <td>
                    <form method="POST" action="vaciar.php" onsubmit="return confirm('¿Estás seguro de vaciar tu carrito?');">
                        <button type="submit">Vaciar Carrito</button>
                    </form>
                </td>
            </tr>
        </tfoot>
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
    <?php
}
?>
