<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estils.css">
</head>
<body>
    <div class="contenidor">
        <h1>Registro de Usuario</h1>
        <form method="POST" action="register.php">
            <input type="text" name="username" placeholder="Nombre de Usuario" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <input type="password" name="confirm_password" placeholder="Confirmar Contraseña" required><br>
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
