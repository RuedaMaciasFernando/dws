<html>

<head>
    <style>

nav {
  text-align:center;
  border: 1px;
    background-color: green;
    color: white;
    padding: 6px;
    font-family: Arial, Helvetica, sans-serif;
}

a{
        text-decoration: none;
            color: white;
            font-size: 20px;
}


h1 {
  text-align:center;
    background-color: green;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}

table, th, td {
  border:1px solid black;
}



    </style>
   
</head>

<body>
    <h1>SIMPLY</h1>
    <a style=text-align:rigt;color:black; href="?method=close">Cerrar sesion</a>
    <header>
    <nav>
    <a href="?method=RegistrarProducto">Registrar Producto |</a> 
    <a href="?method=BuscarProducto">Buscar Producto |</a> 
    <a href="?method=ValorTotal">Valor total</a> 
    </nav>
    </header>

    <h2>Tabla de inventario</h2>
    <table style="width:100%">
  <tr>
    <th>Precio</th>
    <th>Stock</th>
    <th>Precio Unidad</th>
    <th>Añadido por</th>
    <th>Acciones</th>
  </tr>
  <tr>
    <?php
     if(isset($_COOKIE["DatosTabla"])){
        $lista = unserialize($_COOKIE["DatosTabla"]);

        foreach ($lista as $producto) {
          echo "<tr>";
          foreach ($producto as $dato) {
              echo "<td>" . $dato . '</td>'; 
          }
          echo "<td>" . $_SESSION["correo"] . '</td>'; 
            echo "<td><a><button>Eliminar</button></a></td>"; 
          echo "</tr>";
      }
  }
    ?>
    </tr>
</table>

<a href="?method=eliminarTabla"><button>Borrar toda la tabla</button></a>


 


</body>

</html>