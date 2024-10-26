<html>
  <style>

table, th, td {
  border:1px solid black;
}

  </style>
<body>

<h2>Buscar Producto</h2>

<form action="?method=BuscarProducto" method="post">
  <label for="NombreProducto">Producto</label><br>
  <input type="text" id="NombreProducto" name="NombreProducto" ><br>

  <input type="submit" value="Buscar Producto">
</form> 

<a href="?method=home"><button>Volver</button></a>

<table style="width:100%">
 
  <tr>
    <?php
      if (isset($_POST["NombreProducto"])) {
        if ($_POST['NombreProducto'] != "") {
    if(isset($_COOKIE["DatosTabla"])){
      $lista = unserialize($_COOKIE["DatosTabla"]);
      
      echo "<tr>
      <th>Producto</th>
      <th>Stock</th>
      <th>Precio Unidad</th>
    </tr>";

      foreach ($lista as $producto) {
        echo "<tr>";
        foreach ($producto as $dato) {
          if($producto[0] == $_POST["NombreProducto"]){
            echo "<td>" . $dato . '</td>'; 
          }
        }
    }
    echo "</tr>";
  }
}
}

    ?>
    </tr>
</table>

</body>
</html>