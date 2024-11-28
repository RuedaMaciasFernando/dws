<html>

<head>
   
</head>

<body>
    <h1>Estas en tu home</h1>


    <form action="?method=meterproducto" method="post">
        <label for="">Producto</label>
        <input type="text" name="producto"> <br>
        <input type="submit">
    </form>

    <?php
        if($bandera == true){
            echo "Producto añadido";
        }
    ?>





    <form action="?method=leerproducto" method="post">
        <input type="submit">
    </form>

    <?php
    echo $datos;
    ?>



</body>

</html>