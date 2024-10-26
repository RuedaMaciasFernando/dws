<html>
<body>

<h2>Valor total de todos los productos del mercado</h2>

<form action="?method=ValorTotal" method="post">
</form> 


<?php
    if(isset($_COOKIE["DatosTabla"])){
       $lista = unserialize($_COOKIE["DatosTabla"]);

       $valor = 0;

       foreach ($lista as $producto) {
         foreach ($producto as $dato) {
            $valorTotal += $producto[1] * $producto[2] / 3; 
         }
     }
     
     echo "El valor total de mi mercado es ".$valorTotal."$"; 
 }
 
    ?>
<br>
<a href="?method=home"><button>Volver</button></a>

</body>
</html>