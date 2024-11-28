<?php

class App
{

  public function __construct()
  {
    session_start();
  }


  public function run2()
  {
    if (isset($_GET["method"])) {
      $method = $_GET['method'];
    } else {
      $method = 'home';
    }
    $this->$method();
  }
  


  public function home()
  {
    
    include("views/home.php");
 
  }




  


  public function meterproducto(){
    
    $myfile = fopen("newfile.txt", "a");
    $bandera = false;

    if($myfile){
      fwrite($myfile,$_POST["producto"]."<br>");
      $bandera = true;
      
    }

    fclose($myfile);
    
    include("views/home.php");
    return $bandera;
   
}

public function leerproducto(){

  $myfile = fopen("newfile.txt", "r");
   $tamanyo = filesize("newfile.txt");
  if($myfile){
    $datos = fread($myfile,$tamanyo);
  }

  fclose($myfile);
  include("views/home.php");



  }

 
}


  