<html>
<body>

<h2>Registrar Producto</h2>

<form action="?method=RegistrarProducto" method="post">
  <label for="Producto">Producto</label><br>
  <input type="text" id="Producto" name="Producto" ><br>
  <label for="Stock">Stock</label><br>
  <input type="number" id="Stock" name="Stock" ><br><br>

  <label for="PrecioUni">Precio Unidad</label><br>
  <input type="number" step="0.01" id="PrecioUni" name="PrecioUni" ><br><br>

  <input type="submit" value="Registrar Producto">
</form> 


<a href="?method=home"><button>Volver</button></a>


</body>
</html>