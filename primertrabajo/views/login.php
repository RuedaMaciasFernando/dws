<html>

<head>
    <title>Título</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: lightgreen;
        }
        h1{
            text-align: center;
            color: white;
        }
        .element{
            max-width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }
        input[type=text], input[type=password]{
            padding: 10px;
            margin-top: 25px;
            color: black;
        }
        input[type=submit]{
            margin-top: 20px;
            color: white;
            border: none;
            background: green;
            padding: 15px 32px;
            font-size:15px;
        }


        </style>
</head>

<body>
    <h1>Login</h1>
<div class="element">
    <form action="?method=auth" method="post">
        <label for="correo">Correo electronico</label>
        <input type="text" name="correo"> <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password"> <br>
        <input type="submit" value="Iniciar sesion">
    </form>
    </div>

    <p>
    <?php
    if (isset($_SESSION['errorcorreo'])) {
        echo "<p style='color:red;'>Eso no es un correo válido.</p>";
        unset($_SESSION['errorcorreo']); 
    } else if (isset($_SESSION['errorcontraseña'])) {
        echo "<p style='color:red;'>La contraseña debe tener al menos 8 caracteres.</p>";
        unset($_SESSION['errorcontraseña']); 
    } else if (isset($_SESSION['error'])) {
        echo "<p style='color:red;'>Los campos no pueden estar vacíos.</p>";
        unset($_SESSION['error']); 
    }
    ?>
</p>
</body>

</html>