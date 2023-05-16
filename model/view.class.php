<?php

class view{

  public $local;

  public function __construct(){
    require_once(APPROOT."/config/config.php");
    $this->local = new PDO(DSN, DBUSER, DBPASS);
    if($this->local->errorCode()){
      die("Something went wrong connecting to local database.");
    } else{
      echo "Connected from local database.";
    }
  }

  public function view(){
    try{
      $query = "SELECT a.id, a.name, ad.address, a.status FROM tutorial.account a LEFT JOIN tutorial.accountdetails ad ON a.id = ad.account_id";
      $statement = $this->local->query($query);
      $statement->execute();
      return $statement;
    } catch (PDOException $e) {
        throw $e;
    }
  }

}






?>