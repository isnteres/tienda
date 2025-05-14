<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuego Ancestral - Login</title>
    <link rel="stylesheet" href="estilos/registro.css">
</head>
<body>
    <div class="container">
        <h2>Inicio de Sesión</h2>
        <hr>
        <form action="conexion/login.php" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Correo" required>
            </div>
            <div class="form-group">
                <input type="password" name="contraseña" placeholder="Contraseña" required>
            </div>
            <a href="#" class="forgot-password">Olvidaste tu contraseña <span>click aquí</span></a>
            <div class="buttons">
               <input name="btningresar" class="btn" type="submit" value="Login">
                <a href="registro.php" class="register">Registro</a>
            </div>
        </form>
    </div>
</body>
</html>
