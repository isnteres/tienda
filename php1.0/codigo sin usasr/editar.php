<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "fuegoancestral"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    die("Error: No se proporcionó un ID válido para editar.");
}

$id = intval($_GET["id"]);


$sql = "SELECT email, nombre, apellido, telefono, contraseña FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows == 0) {
    die("Error: El usuario con ID $id no existe.");
}

$row = $result->fetch_assoc();
$email = $row["email"];
$nombre = $row["nombre"];
$apellido = $row["apellido"];
$telefono = $row["telefono"];
$contraseña = $row["contraseña"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $telefono = trim($_POST["telefono"]);
    $contraseña = trim($_POST["contraseña"]);

    if (empty($email) || empty($nombre) || empty($apellido) || empty($telefono) || empty($contraseña)) {
        $errorMessage = "Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "El formato del email no es válido.";
    } else {
        
        $sql_update = "UPDATE usuarios SET email = ?, nombre = ?, apellido = ?, telefono = ?, contraseña = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sssis", $email, $nombre, $apellido, $telefono, $contraseña, $id);

        if ($stmt_update->execute()) {
            echo "<script>alert('Usuario actualizado correctamente.'); window.location.href='index.php';</script>";
        } else {
            $errorMessage = "Error al actualizar el usuario: " . $stmt_update->error;
        }
        $stmt_update->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Editar Usuario</h2>

        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= $errorMessage ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="w-25 p-4 bg-light rounded shadow">

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?= htmlspecialchars($email) ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Apellido</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="apellido" value="<?= htmlspecialchars($apellido) ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Telefono</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="telefono" value="<?= htmlspecialchars($telefono) ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="contraseña" value="<?= htmlspecialchars($contraseña) ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>