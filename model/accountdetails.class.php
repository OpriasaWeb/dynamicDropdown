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
      $query = "SELECT account_id, gender, street, barangay, city, province, region, island FROM tutorial.accountdetails WHERE account_id = $id";
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
  public function insertAccountDetails($island, $region, $province, $city, $barangay, $street, $gender){
    try{
      $statement = $this->local->prepare("INSERT INTO tutorial.accountdetails(island, region, province, city, barangay, street, gender) VALUES ('$island', '$region', '$province', '$city', '$barangay', '$street','$gender')");
      $statement->execute();
      echo message::INSERTED_SUCCESSFULLY;
    } catch(PDOException $e){
      echo message::INSERT_FAILED;
      throw $e;
    }
  }

  // --------------------------------------------------------------- //

  // Edit/Update account details model
  public function editAccountDetailsRecord($id, $street, $gender){
    try{
      $statement = $this->local->prepare("UPDATE tutorial.accountdetails SET street = :street, gender = :gender WHERE account_id = :id");
      $statement->bindParam(':id', $id);
      $statement->bindParam(':street', $street);
      $statement->bindParam(':gender', $gender);
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