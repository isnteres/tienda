<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nombre = $_POST['nombre'] ?? '';
    $precio = $_POST['precio'] ?? 0;

    if (is_numeric($id) && $nombre && is_numeric($precio)) {
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

// Redirige de vuelta al origen
$origen = $_GET['origen'] ?? 'index.php';

// Evita inyecciones eliminando caracteres no válidos
$origen = filter_var($origen, FILTER_SANITIZE_URL);

// Redirección
header("Location: /tienda/php1.0/$origen");
exit;
