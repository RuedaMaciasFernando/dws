<?php

if(!isset($_COOKIE["visitas"])){
    //El usuario se ha metido por primera vez
    setcookie("visitas","1",time()+ 3600*24);
    echo "Pagina visitada por primera vez";
}else{
    //El usuario se ha metido varias veces
    $visitas = (int)$_COOKIE["visitas"];
    $visitas++;
    setcookie("visitas",$visitas,time()+ 3600*24);
    echo date("l jS \of F Y h:i:s A") . "<br>";
    echo"Pagina visitada " .$visitas." veces" ;
}

?>


<html>

<head>



</head>


<body>





  


</body>


</html>