<?php

require_once 'models/DatosPelis.php';

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
    /*
    public function obtenerPelis()
    {
        //Llamas al modelo
        $escritores = DatosPelis::paginate();


        
        //Pasas el resultado a la vista
        include("views/home.php");

    }
        */

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

    public function sesiones()
    {
        DatosPelis::GestionarSesiones();
        include("views/login.php");

    }




        
}
