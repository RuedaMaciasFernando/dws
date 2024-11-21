<html>
  <style>

    </style>
<body>

<h1>Actualizar una pelicula por Codigo</h1>
<h3>Introduce los valores que quieras actualizar</h3>
<p>Actualizar la recaudación y los cines y teatros de la película</p>
<p>El titulo,la fecha de estreno, y el distribuidor siempre va a ser el mismo</p>
<div class="form">
<form action="?method=VerDatosActualizados" method="post">

  <label for="CodigoPeli">Codigo de la Pelicula</label><br>
  <input type="number" id="CodigoPeli" name="CodigoPeli" required><br>


  <label for="CinesA">Teatros / Cines</label><br>
  <input type="number" id="CinesA" name="CinesA" ><br><br>

  <label for="RecaudacionA">Recaudacion</label><br>
  <input type="number" id="RecaudacionA" name="RecaudacionA" ><br><br>


  <input type="submit" value="Actualizar Pelicula">

</form> 
</div>

<a href="?method=home"><button>Volver</button></a>


<?php
    if(isset($_POST["CodigoPeli"]) && isset($_POST["CinesA"]) && isset($_POST["RecaudacionA"])){
    
      if($resultadoactualizadopeli == true){
        echo "Se ha actualizado la peli";
      }else{
        echo "No se ha podido actualizar la peli";

      }
  }
?>





</body>
</html>