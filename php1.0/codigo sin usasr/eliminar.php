<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fuegoancestral";


    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Error de conexión: " . $connection->connect_error);
    }


    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {

        $connection->query("ALTER TABLE usuarios AUTO_INCREMENT = 1");
        

        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . $connection->error;
    }

    $stmt->close();
    $connection->close();
}
?>