<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvidé mi Contraseña</title>
    <link rel="stylesheet" href="estilos/recuperar_contraseña.css">
</head>
<body>
    <div class="container">
        <h2>Recuperar Contraseña</h2>
        <p>Por favor, ingresa tu dirección de correo electrónico asociada a tu cuenta y te enviaremos un enlace para restablecer tu contraseña.</p>
        <form action="conexion/enviar_restablecimiento.php" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="buttons">
                <button type="submit" class="reset-password">Enviar enlace de restablecimiento</button>
                <a href="inicio.php" class="back-to-login">Volver al Login</a>
            </div>
        </form>
    </div>
</body>
</html>
