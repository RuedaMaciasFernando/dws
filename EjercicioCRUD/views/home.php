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
.siuu{
    margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}
    </style>
</head>

<body>


    <h1>Consultas de Peliculas</h1>
    <h2>
        Seleccione la consulta a realizar
    </h2>

    <header>
    <a id="enlace" href="?method=login">Cerrar sesion</a>
    <nav>
    <a href="?method=VerDatosIntroducidos">Añadir una pelicula |</a> 
    <a href="?method=VerDatosActualizados">Actualizar una pelicula</a> 
    </nav>
    </header>
    <br>

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
                    <th>Titulo</th>
                    <th>Cines / Teatros</th>
                    <th>Recaudacion Total</th>
                    <th>Fecha de Estreno</th>
                    <th>Distribuidor</th>
                </tr>

              
                <?php
                foreach ($pages->peli as $peli) {
                    echo "<tr>";
                    
                    echo "<td>" . $peli->getId() . "</td>";
                    echo "<td>" . $peli->getTitle() . "</td>";
                    echo "<td>" . $peli->getTheaters() . "</td>";
                    echo "<td>" . $peli->getTotalGross() . "</td>";
                    echo "<td>" . $peli->getReleaseDate() . "</td>";
                    echo "<td>" . $peli->getDistributor() . "</td>";
                }
                echo "</tr>";

                ?>

            </table>
                <div class="siuu">
                <?php
                for($i=1;$i<=$pages->n; $i++){
                    echo "<a href='?page=$i'><button>$i</button></a>                                  ";
                }
                ?>


                </div>

</body>

</html>