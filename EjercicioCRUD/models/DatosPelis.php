<?php

require_once 'models/Model.php';

class DatosPelis extends Model
{

    private $id;
    private $Rank;
    private $Title;
    private $Theaters;
    private $Total_Gross;
    private $Release_Date;
    private $Distributor;




    public static function consultarTodos(){
        
        $todosEscritores = null;

        try {
            $conexion = DatosPelis::db();


            $sql1 = "SELECT * FROM DatosPelis";

            $resultado = $conexion->query($sql1);    
        
            $todosEscritores = $resultado->fetchAll(PDO::FETCH_CLASS, DatosPelis::class);

        } catch (PDOException) {
            echo "Problema en la conexión";
        } finally{
           
            return $todosEscritores;
        }

    }

    public static function ActualizarDatos(){
        

    }


    public static function IntroducirDatos(){
        

    }

    public static function BorrarPelicula(){
     //DELETE FROM `DatosPelis` WHERE id = ?; 
     // me la borra, no me sale mensaje de confirmacion y no se actualiza ni el ranking ni el id  
     try{

        $conexion = DatosPelis::db();

      if(isset($_POST["Codigopeli"]) && $_POST["Codigopeli"] != ""){
        $codigopeli = $_POST["Codigopeli"];
      }
  
        $sql1 = "DELETE FROM DatosPelis  WHERE id = ?";

  
      
        $resultadoborradopeli = $conexion->prepare($sql1);
        $resultadoborradopeli->bindValue(1, $codigopeli);
        $resultadoborradopeli->execute();
  
  
    
      }catch(PDOException $e){  
        echo "Problema en la conexion";
        $conexion->rollback();
      }catch(Exception $b){  
        echo "Problema en la conexion";
        $conexion->rollback();
      }
  

    }

    public static function GestionarSesiones(){
        

    }





    public function getId()
    {
        return $this->id;
    }


    public function getRank()
    {
        return $this->Rank;
    }


    public function getTitle()
    {
        return $this->Title;
    }

    public function getTheaters()
    {
        return $this->Theaters;
    }

    public function getTotalGross()
    {
        return $this->Total_Gross;
    }

    public function getReleaseDate()
    {
        return $this->Release_Date;
    }

    public function getDistributor()
    {
        return $this->Distributor;
    }

}