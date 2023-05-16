<?php

class accountdetails{
  public $local;

  public function __construct(){
    require_once('../config/config.php');
    $this->local = new PDO(DSN, DBUSER, DBPASS);
  }

  // --------------------------------------------------------------- //

  public function selectAccountDetails($id){
    try{
      $query = "SELECT account_id, address FROM tutorial.accountdetails WHERE account_id = $id";
      $statement = $this->local->prepare($query);
      $statement->execute();
      $data = $statement->fetch(PDO::FETCH_ASSOC);
      // print_r($data);
      // return json_encode($data);
      return $data; 
      // print_r($statement);
      // return $statement;
    }catch(PDOException $e){
        throw $e;
    }
  }

  // --------------------------------------------------------------- //

  // Insert account details model
  public function insertAccountDetails($address, $gender){
    try{
      $statement = $this->local->prepare("INSERT INTO tutorial.accountdetails(address, gender) VALUES ('$address', '$gender')");
      $statement->execute();
      echo message::INSERTED_SUCCESSFULLY;
    } catch(PDOException $e){
      echo message::INSERT_FAILED;
      throw $e;
    }
  }

  // --------------------------------------------------------------- //

  // Edit/Update account details model
  public function editAccountDetailsRecord($id, $address){
    try{
      $statement = $this->local->prepare("UPDATE tutorial.accountdetails SET address = :address WHERE account_id = :id");
      $statement->bindParam(':id', $id);
      $statement->bindParam(':address', $address);
      $statement->execute();
      echo message::UPDATED_SUCCESSFULLY;
    }catch(PDOException $e){
      echo message::UPDATED_FAILED;
      throw $e;
    }
  }

  // --------------------------------------------------------------- //

  // Delete account details model
  public function deleteAccountDetailsRecord($account_id){
    try{
      $statement = $this->local->query("DELETE FROM tutorial.accountdetails WHERE account_id = $account_id");
      $statement->execute();
      echo message::DELETED_SUCCESSFULLY;
    }catch(PDOException $e){
      echo message::DELETED_FAILED;
      throw $e;
    }
  }

  // --------------------------------------------------------------- //


}



?>