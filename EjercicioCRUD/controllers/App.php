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
        include("views/home.php");
    }


    public function obtenerPelis()
    {
        //Llamas al modelo
        $escritores = DatosPelis::consultarTodos();


        
        //Pasas el resultado a la vista
        include("views/home.php");

    }

    public function BorrarPeli()

    {
        DatosPelis::BorrarPelicula();
        include("views/home.php");

    }


    public function VerDatosIntroducidos()

    {
        //DatosPelis::IntroducirDatos();
        include("views/introducirX.php");

    }

    public function VerDatosActualizados()
    {
        //DatosPelis::ActualizarDatos();
        include("views/ActualizarX.php");

    }

    public function logout()
    {
        //DatosPelis::GestionarSesiones();
        include("views/login.php");

    }




        
}
