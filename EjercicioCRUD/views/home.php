<html>


<head>
    <title>Consultas</title>
    <style>

table, tr{
  border:1px solid black;
  text-align: center;
}
td{
  text-align: left;
  border:1px solid black;
}
    </style>
</head>

<body>


    <h1>Consultas de Peliculas</h1>
    <h2>
        Seleccione la consulta a realizar
    </h2>

    <header>
    <a id="enlace" href="?method=logout">Cerrar sesion</a>
    <nav>
    <a href="?method=VerDatosIntroducidos">Añadir una pelicula |</a> 
    <a href="?method=VerDatosActualizados">Actualizar una pelicula</a> 
    </nav>
    </header>
    <br>


            <form action="obtenerPelis" method="post">
                <label for="">Cargar datos de peliculas</label><br>
                <input type="submit" value="Cargar">
            </form>

            <form action="BorrarPeli" method="post">
        <label for="Codigopeli">Codigo de la pelicula a eliminar:</label><br>
    <input type="text" id="Codigopeli" name="Codigopeli" >
    <br>
    <input type="submit" value="Eliminar Pelicula">

    </form>
    <?php



if(isset($_POST["codigopeli"])){
    
  if($resultadoborradopeli  == true){
   echo "<p>Se ha borrado la pelicula</p>";

  }else{
    echo "<p>No se  ha podido borrar la pelicula</p>";
  }
}
?>


            <h2>
                Resultado:
            </h2>
            <table style="width:100%">
                <tr>
                    <th>Id</th>
                    <th>Clasificacion</th>
                    <th>Titulo</th>
                    <th>Cines / Teatros</th>
                    <th>Recaudacion Total</th>
                    <th>Fecha de Estreno</th>
                    <th>Distribuidor</th>
                </tr>

              
                <?php
                foreach ($escritores as $escritor) {
                    echo "<tr>";
                    
                    echo "<td>" . $escritor->getId() . "</td>";
                    echo "<td>" . $escritor->getRank() . "</td>";
                    echo "<td>" . $escritor->getTitle() . "</td>";
                    echo "<td>" . $escritor->getTheaters() . "</td>";
                    echo "<td>" . $escritor->getTotalGross() . "</td>";
                    echo "<td>" . $escritor->getReleaseDate() . "</td>";
                    echo "<td>" . $escritor->getDistributor() . "</td>";
                }
                echo "</tr>";

                ?>

            </table>



</body>

</html>