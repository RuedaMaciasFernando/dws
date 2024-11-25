<?php

require_once 'models/DatosPelis.php';
require_once 'models/Usuario.php';

class App
{

    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'home';
        }
        $this->$method();
    }


    public function home()
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        

        $pages = DatosPelis::paginate($page,8);

 
        include("views/home.php");
    }
    
    public function login()
    {
       
        App::authDefinitivo();


        include("views/login.php");

    }
        

    public function BorrarPeli()

    {
        $resultadoborradopeli = DatosPelis::BorrarPelicula();

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $pages = DatosPelis::paginate($page,8);
        include("views/home.php");

    }


    public function VerDatosIntroducidos()

    {
        $resultadoañadidopeli = DatosPelis::IntroducirDatos();
        include("views/introducirX.php");
    }

    public function VerDatosActualizados()
    {
        $resultadoactualizadopeli = DatosPelis::ActualizarDatos();
        include("views/ActualizarX.php");

    }
    


    public function auth2()
    {
        if(isset($_POST["Nombre"]) && isset($_POST["password"])){
            if($_POST["Nombre"] != "" && $_POST["password"] != "" ){

                $encontrado = Usuario::autenticarSoloUsuario($_POST["Nombre"]);
                if(!$encontrado){
                    Usuario::IntroducirUsuario($_POST["Nombre"], $_POST["password"]);
                    header('Location: home'); 
                }else{
                    $correcto = Usuario::autenticar($_POST["Nombre"], $_POST["password"]);
                    if($correcto){
                        header('Location: home');
                    }else{
                        header('Location: login');
                    }
                }

        }

    }

    } 

    public function auth()
    {
        if(isset($_POST["Nombre"]) && isset($_POST["password"])){
            if($_POST["Nombre"] != "" && $_POST["password"] != "" ){
                $encontrado = Usuario::autenticar($_POST["Nombre"],$_POST["password"]);
                if($encontrado){
                    header('Location: home'); 
                }else{
             
                        header('Location: login');
                    }
                }else{
                    header('Location: login');
                }

        }

    }

    public function authDefinitivo()
    {
        if(isset($_POST["Nombre"]) && isset($_POST["password"])){
            if($_POST["Nombre"] != "" && $_POST["password"] != "" ){

                $usuario = Usuario::autenticarSoloUsuariodeVolviendoUsuario($_POST["Nombre"]);
                if(!$usuario){
                    $hash=password_hash($_POST["password"],PASSWORD_BCRYPT);
                    Usuario::IntroducirUsuario($_POST["Nombre"],$hash);
                    header('Location: home'); 
                }else{
                    $correcto=password_verify($_POST["password"],$usuario->getContrasenya());
                    if($correcto){
                        header('Location: home');
                    }else{
                        header('Location: login');
                    }
                    }
                }else{
                    header('Location: login');
                }

        }

    }

}
