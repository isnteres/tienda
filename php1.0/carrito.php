<?php
session_start();
require('./layout/header1.php');

$carrito = $_SESSION['carrito'] ?? [];
$total = 0;
?>

<main class="main">
    <h2>Carrito de Compras</h2>
    
    <?php if (!empty($carrito)): ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carrito as $id => $item):
                    $subtotal = $item['precio'] * $item['cantidad'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?= htmlspecialchars($item['nombre']) ?></td>
                    <td>S/ <?= number_format($item['precio'], 2) ?></td>
                    <td>
                        <form method="POST" action="actualizar_carrito.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="number" name="cantidad" value="<?= $item['cantidad'] ?>" min="1" style="width:50px;">
                            <button type="submit">Actualizar</button>
                        </form>
                    </td>
                    <td>S/ <?= number_format($subtotal, 2) ?></td>
                    <td>
                        <form method="POST" action="eliminar_carrito.php">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><strong>Total a pagar: S/ <?= number_format($total, 2) ?></strong></p>
    <?php else: ?>
        <div class="cart-empty">
            <p>El carrito está vacío.</p>
        </div>
    <?php endif; ?>
</main>

<?php require('./layout/footer1.php'); ?>
