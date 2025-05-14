<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "fuegoancestral"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$email = "";
$nombre = "";
$apellido = "";
$telefono = "";
$contraseña ="";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST["email"]);
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $telefono = trim($_POST["telefono"]);
    $contraseña = trim($_POST["contraseña"]);

    do {
        if (empty($email) || empty($nombre) || empty($apellido) || empty($telefono) || empty($contraseña)) {
            $errorMessage = "Todos los campos son requeridos.";
            break;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage = "El formato del email no es válido.";
            break;
        }

        $sql = "INSERT INTO usuarios (email, nombre, apellido, telefono, contraseña) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            $errorMessage = "Error en la consulta: " . $conn->error;
            break;
        }

        $stmt->bind_param("sssis", $email, $nombre, $apellido, $telefono, $contraseña);

        if ($stmt->execute()) {
            $successMessage = "El nuevo cliente se ha registrado correctamente.";
            $email = $nombre = $apellido = "";
            echo "<script>alert('Usuario creado correctamente.'); window.location.href='index.html';</script>";
        } else {
            $errorMessage = "Error al insertar el cliente: " . $stmt->error;
        }

        $stmt->close();
    } while (false);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
    <link rel="stylesheet" href="estilos/stylecreate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $errorMessage ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="d-flex flex-column justify-content-center align-items-center vh-100">
    <h2 class="mb-3">Registrarte</h2>
    <div class="w-25 p-4 bg-light rounded shadow">
        <form method="post">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" value="<?= htmlspecialchars($email) ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Apellido</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="apellido" value="<?= htmlspecialchars($apellido) ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Teléfono</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="telefono" value="<?= htmlspecialchars($telefono) ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="contraseña" value="<?= htmlspecialchars($contraseña) ?>">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Enviar</button>
            </div>

            <?php if (!empty($successMessage)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= $successMessage ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>
    </div>
</body>
</html>