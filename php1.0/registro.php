<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos/registro.css">
</head>
<body>
    <div class="container">
        <h2>Registro</h2>
        <form action="conexion/create.php" method="POST">
            <div class="form-group">
                <input type="text" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <input type="text" name="apellido" placeholder="Apellido" required>
            </div>
            <div class="form-group">
                <input type="text" name="telefono" placeholder="Telefono" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="contraseña" placeholder="Contraseña" required>
            </div>
            <div class="buttons">
                <button type="submit" class="register">Registro</button>
                <a href="inicio.php" class="login">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
