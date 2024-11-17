<html>
  <style>

    </style>
<body>

<h1>Actualizar una pelicula por Codigo</h1>
<h3>Introduce los valores que quieras actualizar</h3>
<div class="form">
<form action="?method=VerDatosActualizados" method="post">

  <label for="CodigoPeli">Codigo de la Pelicula</label><br>
  <input type="number" id="CodigoPeli" name="CodigoPeli" required><br>

  <label for="RangoA">Rango</label><br>
  <input type="text" id="RangoA" name="RangoA" ><br>

  <label for="TituloA">Titulo</label><br>
  <input type="text" id="TituloA" name="TituloA" ><br><br>


  <label for="CinesA">Teatros / Cines</label><br>
  <input type="number" id="CinesA" name="CinesA" ><br><br>

  <label for="RecaudacionA">Recaudacion</label><br>
  <input type="number" id="RecaudacionA" name="RecaudacionA" ><br><br>


  <label for="fechaEstrenoA">Fecha de estreno</label><br>
  <input type="date" id="fechaEstrenoA" name="fechaEstrenoA" ><br><br>


  <label for="DistribuidorA">Distribuidor</label><br>
  <input type="text" id="DistribuidorA" name="DistribuidorA" ><br><br>

  <input type="submit" value="Actualizar Pelicula">

</form> 
</div>

<a href="?method=home"><button>Volver</button></a>





</body>
</html>