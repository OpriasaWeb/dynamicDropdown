<?php

class places {
  public $pwcdb;

  public function __construct(){
    // require_once(APPROOT."/config/config.php");
    require_once("../config/config.php");
    $this->pwcdb = new PDO(DSNA, DBUSERA, DBPASSA);
  }

  public function selectRegion($id){
    try{
      $query = "SELECT * FROM region WHERE island_id = $id";
      $statement = $this->pwcdb->query($query);
      $statement->execute();
      $data = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    } catch(PDOException $e){
      throw $e;
    }
  }

  public function selectProvince($id){
    try{
      $query = "SELECT * FROM province WHERE region_id = $id";
      $statement = $this->pwcdb->query($query);
      $statement->execute();
      $data = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    } catch(PDOException $e){
      throw $e;
    }
  }

  public function selectCity($id){
    try{
      $query = "SELECT * FROM city WHERE province_id = $id";
      $statement = $this->pwcdb->query($query);
      $statement->execute();
      $data = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    } catch(PDOException $e){
      throw $e;
    }
  }

  public function selectBarangay($id){
    try{
      $query = "SELECT * FROM barangay WHERE city_id = $id";
      $statement = $this->pwcdb->query($query);
      $statement->execute();
      $data = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    } catch(PDOException $e){
      throw $e;
    }
  }

}


?>