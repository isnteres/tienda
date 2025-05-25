<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nombre = $_POST['nombre'] ?? '';
    $precio = $_POST['precio'] ?? 0;

    if ($id && $nombre && $precio) {
        $producto = [
            'id' => $id,
            'nombre' => $nombre,
            'precio' => (float)$precio,
            'cantidad' => 1
        ];

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        $encontrado = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['id'] == $producto['id']) {
                $item['cantidad']++;
                $encontrado = true;
                break;
            }
        }
        if (!$encontrado) {
            $_SESSION['carrito'][] = $producto;
        }
    }
}

$origen = $_GET['origen'] ?? 'index.php';
header("Location: /tienda/php1.0/$origen");
exit;
