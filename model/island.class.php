<?php

class island{
  public $pwcdb;

  public function __construct(){
    require_once(APPROOT."/config/config.php");
    $this->pwcdb = new PDO(DSNA, DBUSERA, DBPASSA);
  }

  public function selectIsland($id){
    try{
      $query = "SELECT * FROM region WHERE island_id = $id";
      $statement->pwcdb->prepare($query);
      $statement->execute();
      $data = $statement->fetch(PDO::FETCH_ASSOC);
      return $this->data;
    } catch(PDOException $e){
      throw $e;
    }
  }

}


?>