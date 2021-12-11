<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
        <div class="login-box modal">
            <img src="assets/img/person_3.jpg" class="avatar">
            <br>
                <form action="?c=Login" method="POST">
                <p>Núm. Documento</p>
                <input type="number" name="documento" placeholder="Ingrese su documento" pattern="[0-9]{8,10}" maxlength="10" 
                title="Ingrese el documento correcto" required/>
                <p>Contraseña</p>
                <input type="password" name="pass" placeholder="Ingrese su contraseña" pattern="[a-zA-Z0-9]{3,10}" 
                title="Escriba entre 3 a 10 caracteres" maxlength="10" required/>
                <br><br><br>
                <button type="submit">
                <p class="button-submit">INGRESAR</p>
                </button>
            </form>
        </div>
</body>
</html>