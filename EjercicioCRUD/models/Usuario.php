<?php
require_once 'models/Model.php';

class Usuario extends Model{

    private $id;
    private $usuario ;
    private $contrasenya;

    public static function IntroducirUsuario($usuario,$contrasenyacifrada){
        try{
          $conexion = Usuario::db();
 
            $sql1 = "INSERT INTO `usuarios`(`usuario`, `contrasenya`) 
              VALUES (?,?)";
  
      $resultado = $conexion->prepare($sql1);
      $resultado->bindValue(1,$usuario);
      $resultado->bindValue(2, $contrasenyacifrada);
      $resultado->execute();
      //header('Location: ?method=home');
  

            return $resultado;
        }catch(PDOException $e){  
          echo "Problema en la conexion";
        }finally{
          // include("views/home.php");
          $conexion = null;
        }
    
  
      }

      public static function autenticar($usuario, $contrasenya){
        try{
          $conexion = Usuario::db();
  

            $sql1 = "SELECT * from `usuarios` WHERE usuario = ? and contrasenya = ? ";
  
      $resultado = $conexion->prepare($sql1);
      $resultado->bindValue(1,$_POST['Nombre']);
      $resultado->bindValue(2,$_POST['password']);
      $resultado->execute();
      $encontrado = $resultado->fetch();

      if($encontrado != false){
        $encontrado=true;
      }
  

      return $encontrado;
        }catch(PDOException $e){  
          echo "Problema en la conexion";
        }finally{
          // include("views/home.php");
          $conexion = null;
        }
    
  
      }

      public static function autenticarSoloUsuario($usuario){
        try{
          $conexion = Usuario::db();
  


            $sql1 = "SELECT * from `usuarios` WHERE usuario = ?";
  
      $resultado = $conexion->prepare($sql1);
      $resultado->bindValue(1, $_POST['Nombre']);
      $resultado->execute();
      $encontrado = $resultado->fetch();

      if($encontrado != false){
        $encontrado=true;
      }
  

      return $encontrado;
        }catch(PDOException $e){  
          echo "Problema en la conexion";
        }finally{
          // include("views/home.php");
          $conexion = null;
        }
    
  
      }

      public static function autenticarSoloUsuariodeVolviendoUsuario($usuario){
        
          $conexion = Usuario::db();
          $sql1 = "SELECT * from `usuarios` WHERE usuario = ?";

      $resultado = $conexion->prepare($sql1);
      $resultado->bindValue(1,$usuario);
      $resultado->execute();
      $resultado->setFetchMode(PDO::FETCH_CLASS,Usuario::class);
      $usuario = $resultado->fetch();

      return $usuario ;

      }



    public function getId()
    {
        return $this->id;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getContrasenya()
    {
        return $this->contrasenya;
    }








}

?>