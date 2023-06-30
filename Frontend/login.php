<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Frontend/CSS/login.css">
    <link rel="stylesheet" href="../Frontend/CSS/registrar.css">
</head>
<body>
    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario"></div>
            <form action="../Backend/PHP/validar.php" method="POST" class="formulario">
                <div class="texto-formulario">
                    <h2>HOTEL CONTROLLER</h2>
                    <P>Inicia Sesion con tu cuenta</P>
                </div>
                <div class="inputContainer">
                    <input type="text" name="usuario" id="" class="input">
                    <label for="" class="label">USUARIO:</label>
                </div>
                <div class="inputContainer">
                    <input type="password" name="codigo" id="" class="input">
                    <label for="" class="label">CONTRASEÑA:</label>
                </div>
                <input type="submit" value="INGRESAR" class="submitBtn">
            </form>
    </div>
</body>

</html>