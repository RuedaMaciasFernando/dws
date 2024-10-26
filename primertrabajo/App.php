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
      $method = 'home';//cambiar a login
    }
    $this->$method();
  }



  public function home()
  {

    include("views/home.php");
  }

  public function login()
  {

    include("views/login.php");
  }

  public function auth()
  {
    if (isset($_POST["correo"]) && isset($_POST["password"])) {
      if ($_POST['correo'] != "" && $_POST['password'] != "") {
        if (filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
          if (preg_match("/^.{8,}$/", $_POST["password"])) {
            $_SESSION["correo"] = $_POST['correo'];
            $_SESSION["password"] = $_POST['password'];
            header('Location: ?method=home');
          } else {
            $_SESSION["errorcontraseña"] = true;
            header('Location: ?method=login');
          }
        } else {
          $_SESSION["errorcorreo"] = true;
          header('Location: ?method=login');
        }
      } else {
        $_SESSION["error"] = true;
        header('Location: ?method=login');
      }
    } else {
      header('Location: ?method=login');
    }
  }



  public function close()
  {
    // Destruir la sesión
    session_destroy();
    header("Location: ?method=login");
  }

  public function RegistrarProducto()
  {
    include("views/registrarProducto.php");


    if (isset($_POST["Producto"]) && isset($_POST["Stock"]) && isset($_POST["PrecioUni"])) {
      if ($_POST['Producto'] != "" && $_POST['Stock'] != "" && $_POST["PrecioUni"] != "") {
        if (isset($_COOKIE['DatosTabla'])) {
          $lista = unserialize($_COOKIE['DatosTabla']);
        } else {
          $lista = [];
          
        }
        $nuevoProducto = [$_POST['Producto'], $_POST['Stock'], $_POST["PrecioUni"]];
        //lo que estoy intentando hacer es meter un array dentro de la lista para que cada producto sea un array
        array_push($lista, $nuevoProducto);//meter al arrya dentro del array
        setcookie("DatosTabla", serialize($lista), time() + 3600 * 24);
      }
    }
  }


  public function BuscarProducto()
  {
    include("views/buscarProducto.php");
  
  }


  public function ValorTotal()
  {

    include("views/valorTotal.php");
  }

  public function eliminartabla()
  {

    setcookie("DatosTabla", "", time() + -1);



    header("Location: ?method=home");
  }
}
