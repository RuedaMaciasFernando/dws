<?php

require_once 'models/Model.php';

class DatosPelis extends Model
{

    private $id;
    private $Title;
    private $Theaters;
    private $Total_Gross;
    private $Release_Date;
    private $Distributor;


    public static function paginate($page = 1, $size = 10)
{
//obtener conexión
$db = Model::db();
//preparar consulta
$sql = "SELECT count(id) FROM DatosPelis";
//ejecutar
$statement = $db->query($sql);
//recoger datos con fetch_all
$n = (int) $statement->fetch()[0]; //registros
$n = ceil($n / $size); //pages

$offset = ($page - 1) * $size;
$sql1 = "SELECT * FROM DatosPelis LIMIT $offset, $size";
$sql2 = "SELECT * FROM DatosPelis WHERE id > $offset LIMIT $size";
$sql3 = "SELECT * FROM DatosPelis";
//ejecutar
$antes = microtime();
$statement = $db->query($sql1);
$despues = microtime();
echo $despues - $antes;
//recoger datos con fetch_all
$peli = $statement->fetchAll(PDO::FETCH_CLASS, DatosPelis::class);
//retornar
$pages = new stdClass;

$pages->peli = $peli;
$pages->n = $n;
return $pages;
}




/*
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
        */

    public static function ActualizarDatos(){ 
        try{

            $conexion = DatosPelis::db();
     
            $sql1 = "UPDATE `DatosPelis` SET `Theaters`= ? ,`Total_Gross`= ? WHERE id = ? ";
    
          
            $resultadoactualizadopeli = $conexion->prepare($sql1);
            $resultadoactualizadopeli->bindValue(1, $_POST["CinesA"]);
            $resultadoactualizadopeli->bindValue(2, $_POST["RecaudacionA"]);
            $resultadoactualizadopeli->bindValue(3, $_POST["CodigoPeli"]);
            $resultadoactualizadopeli->execute();

      
      
        
          }catch(PDOException $e){  
            echo "Problema en la conexion";
            $conexion->rollback();
          }catch(Exception $b){  
            echo "Problema en la conexion";
            $conexion->rollback();
          }finally{
            return $resultadoactualizadopeli;
          }
      

    }


    public static function IntroducirDatos(){
            // me sale un dato vacio y el otro me lo añade
        try{

            $conexion = DatosPelis::db();
            $conexion->beginTransaction();
     
            $sql1 = "INSERT INTO `DatosPelis`(`Title`, `Theaters`, `Total_Gross`, `Release_Date`, `Distributor`) 
            VALUES (?,?,?,?,?)";
    
      
          
            $resultadoañadidopeli = $conexion->prepare($sql1);
            $resultadoañadidopeli->bindValue(1, $_POST["TituloI"]);
            $resultadoañadidopeli->bindValue(2, $_POST["CinesI"]);
            $resultadoañadidopeli->bindValue(3, $_POST["RecaudacionI"]);
            $resultadoañadidopeli->bindValue(4, $_POST["fechaEstrenoI"]);
            $resultadoañadidopeli->bindValue(5, $_POST["DistribuidorI"]);
            $resultadoañadidopeli->execute();

      
            $conexion->commit();
          
          }catch(PDOException $e){  
            echo "Problema en la conexion";
            $conexion->rollback();
          }catch(Exception $b){  
            echo "Problema en la conexion";
            $conexion->rollback();
          }finally{
            return $resultadoañadidopeli;
          }
      
    }

    public static function BorrarPelicula(){
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
      }finally{
        return $resultadoborradopeli;
      }
  

    }


    public function getId()
    {
        return $this->id;
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