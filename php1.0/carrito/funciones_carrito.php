<?php

function actualizarCantidad($item_id, $cantidad) {
    $conexion = new mysqli("localhost", "root", "", "fuegoancestral");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    if ($cantidad == 0) {
       
        $stmt = $conexion->prepare("DELETE FROM carrito WHERE id = ?");
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
    } else {
        
        $stmt = $conexion->prepare("UPDATE carrito SET cantidad = ? WHERE id = ?");
        $stmt->bind_param("ii", $cantidad, $item_id);
        $stmt->execute();
    }

    $conexion->close();
}

function vaciarCarrito() {
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
        return;
    }

    $id_usuario = $_SESSION['usuario_id'];

    $conexion = new mysqli("localhost", "root", "", "fuegoancestral");
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("DELETE FROM carrito WHERE id_usuario = ?");
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();

    $conexion->close();
}

function eliminarProducto($item_id) {
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
        return;
    }

    $id_usuario = $_SESSION['usuario_id'];

    $conexion = new mysqli("localhost", "root", "", "fuegoancestral");
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("DELETE FROM carrito WHERE id = ? AND id_usuario = ?");
    $stmt->bind_param("ii", $item_id, $id_usuario);
    $stmt->execute();

    $conexion->close();
}

?>
