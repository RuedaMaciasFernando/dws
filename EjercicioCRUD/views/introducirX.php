<html>
  <style>

    </style>
<body>

<h1>Registrar Pelicula</h1>
<div class="form">
<form action="?method=VerDatosIntroducidos" method="post">


  <label for="TituloI">Titulo</label><br>
  <input type="text" id="TituloI" name="TituloI" ><br><br>


  <label for="CinesI">Teatros / Cines</label><br>
  <input type="number" id="CinesI" name="CinesI" ><br><br>

  <label for="RecaudacionI">Recaudacion</label><br>
  <input type="number" id="RecaudacionI" name="RecaudacionI" ><br><br>


  <label for="fechaEstrenoI">Fecha de estreno Formato(Dia-Mes-Anyo)</label><br>
  <input type="text" id="fechaEstrenoI" name="fechaEstrenoI" ><br><br>


  <label for="DistribuidorI">Distribuidor</label><br>
  <input type="text" id="DistribuidorI" name="DistribuidorI" ><br><br>

  <input type="submit" value="Registrar Pelicula">

</form> 
</div>

<?php
    if(isset($_POST["TituloI"]) && isset($_POST["CinesI"]) && isset($_POST["RecaudacionI"])
     &&isset($_POST["fechaEstrenoI"]) && isset($_POST["DistribuidorI"]) ){
    
       
      if($resultadoañadidopeli == true){
        echo "Se ha actualizado la peli";
      }else{
        echo "No se ha podido actualizar la peli";

      }
  }
?>

<a href="?method=home"><button>Volver</button></a>





</body>
</html>