<?php
class Stockceromenor extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = "El stock no puede ser cero o negativo";
    return $errorMsg;
  }
}

class Precioceromenor extends Exception {
    public function errorMessage() {
      //error message
      $errorMsg = "El precio no puede ser cero o negativo";
      return $errorMsg;
    }
  }

  class Productonoencontrado extends Exception {
    public function errorMessage() {
      //error message
      $errorMsg = "El producto no existe";
      return $errorMsg;
    }
  }
  
?>


  
