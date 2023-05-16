<?php
// include '../model/user.class.php';
include '../model/account.class.php';
include '../model/accountdetails.class.php';


class userController{

  public $accountRecord;
  public $accountDetailsRecord;

  public function __construct(){
    // require(APPROOT."/model/user.class.php");
    $this->accountRecord = new account();
    $this->accountDetailsRecord = new accountdetails();
  }

  // ------------------------------------------------------------- // 

  // INSERT
  public function insertAccount($fullname, $status){
    $insertRecordAccount = $this->accountRecord->insertAccount($fullname, $status);
    return $insertRecordAccount;
  }

  public function insertAccountDetails($island, $region, $province, $city, $barangay, $street, $gender){
    $insertRecordAccountDetails = $this->accountDetailsRecord->insertAccountDetails($island, $region, $province, $city, $barangay, $street, $gender);
    return $insertRecordAccountDetails;
  }
  // INSERT

  // ------------------------------------------------------------- // 

  // UPDATE/EDIT
  // public function editAccountRecord($id, $fullname, $status){
  //   $editAccountRecord = $this->userRecord->editAccountRecord($id, $fullname, $status);
  //   return $editAccountRecord;
  // }

  // public function editAccountDetailsRecord($id, $address){
  //   $editAccountDetailsRecord = $this->userRecord->editAccountDetailsRecord($id, $address);
  //   return $editAccountDetailsRecord;
  // }
  // UPDATE/EDIT

  // ------------------------------------------------------------- // 

  // SELECT FOR UPDATE

  // public function selectAccount($id){
  //   $selectAccount = $this->userRecord->selectAccount($id);
  //   return $selectAccount;
  // }

  // public function selectAccountDetails($id){
    
  //   $selectAccountDetails = $this->userRecord->selectAccountDetails($id);
  //   return $selectAccountDetails;
  // }

  // SELECT FOR UPDATE

  // ------------------------------------------------------------- // 

  // DELETE
  // public function deleteAccountRecord($id){
  //   $deleteAccountRecord = $this->userRecord->deleteAccountRecord($id);
  //   return $deleteAccountRecord;
  // }

  // public function deleteAccountDetailsRecord($id){
  //   $deleteAccountDetailsRecord = $this->userRecord->deleteAccountDetailsRecord($id);
  //   return $deleteAccountDetailsRecord;
  // }

  // DELETE


  // ------------------------------------------------------------- // 

}




?>