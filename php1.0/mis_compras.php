<?php
session_start();
require __DIR__ . '/conexion/conexion.php';

if (!isset($_SESSION['id'])) {
    die("Debes iniciar sesión para ver tus compras.");
}

$idUsuario = $_SESSION['id'];


$sql = "SELECT * FROM ordenes WHERE id_usuario = ? ORDER BY fecha DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();

require './layout/header1.php';
?>

<main class="main">
    <h2>Mis Compras</h2>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($orden = $result->fetch_assoc()): ?>
            <section style="border:1px solid #ccc; padding:10px; margin-bottom:20px;">
                <h3>Orden #<?= $orden['id'] ?> - Fecha: <?= $orden['fecha'] ?> - Total: S/ <?= number_format($orden['total'], 2) ?></h3>
                <p>Estado: <?= ucfirst($orden['estado']) ?></p>
                <table border="1" cellpadding="5" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $sqlDetalles = "SELECT d.cantidad, d.subtotal, p.nombre 
                                    FROM detalles_orden d 
                                    JOIN productos p ON d.id_producto = p.id 
                                    WHERE d.id_orden = ?";
                    $stmtDetalles = $conn->prepare($sqlDetalles);
                    $stmtDetalles->bind_param("i", $orden['id']);
                    $stmtDetalles->execute();
                    $detalles = $stmtDetalles->get_result();

                    while ($detalle = $detalles->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($detalle['nombre']) ?></td>
                            <td><?= $detalle['cantidad'] ?></td>
                            <td>S/ <?= number_format($detalle['subtotal'], 2) ?></td>
                        </tr>
                    <?php endwhile; 
                    $stmtDetalles->close();
                    ?>
                    </tbody>
                </table>
            </section>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No tienes compras registradas.</p>
    <?php endif; ?>
</main>

<?php require './layout/footer1.php'; ?>
