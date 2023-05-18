<?php

include 'userController.php';
// include '../config/messages.php';

$userController = new userController();

// ------------------------------------------------------------------------- //

// ----------- INSERT ------------- // 
// isset($_POST['fullname']) && isset($_POST['status']) && isset($_POST['account_id']) && isset($_POST['full_address']) && isset($_POST['gender'])
if(isset($_POST['insert'])){

  try{
    
    $nameRegex = '/^[A-Za-z \'-]{2,50}$/';
    $addressRegex = '/^[A-Za-z0-9 .,#\'-]{2,100}$/';

    if(empty($_POST['fullname']) || empty($_POST['status']) 
      || empty($_POST['island_name'])
      || empty($_POST['region_name'])
      || empty($_POST['province_name'])
      || empty($_POST['city_name'])
      || empty($_POST['barangay_name'])
      || empty($_POST['street'])
      || empty($_POST['gender'])){
      echo "Cannot be empty. Please fill-in everything.";
      return;
    } 
    // const nameRegex = /^[A-Za-z '-]{2,50}$/;
    else if(!preg_match($nameRegex, $_POST['fullname']) || !preg_match($addressRegex, $_POST['street'])){
      echo "Kindly recheck the lastname, firstname or address if valid input.";
      return;
    }
    
    else{
      // Insert accounts
      $fullname = $_POST['fullname'];
      $status = $_POST['status'];

      // Insert accountdetails
      $island_name = $_POST['island_name'];
      $region_name = $_POST['region_name'];
      $province_name = $_POST['province_name'];
      $city_name = $_POST['city_name'];
      $barangay_name = $_POST['barangay_name'];
      $street = $_POST['street'];
      $gender = $_POST['gender'];

      // Debug
      print_r($_POST);

      // From controller back to view
      $insertedAccount = $userController->insertAccount($fullname, $status);
      $insertedAccountDetails = $userController->insertAccountDetails($island_name, $region_name, $province_name, $city_name, $barangay_name, $street, $gender);

      echo json_encode($insertedAccount);

      echo json_encode($insertedAccountDetails);
      
      if(!$insertedAccount && $insertedAccountDetails){
        echo "
          <script>console.log('Inserting data failed.')</script>
        ";
      }   
      else{
        echo "
          <script>console.log('Inserted successfully to both account and account details tables.')</script>
        ";
      }
    }

  } catch(PDOException $e){

    throw $e;
  }
  
}
// else{
//     include(APPROOT.'/view/User/insert.php');
// }
// ----------- INSERT ------------- // 

// ------------------------------------------------------------------------- //

// ----------- UPDATE / EDIT ------------- // 
if(isset($_POST['updateData'])){
  try{
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    // $address = $_POST['address'];

    // Insert accountdetails
    // $island_name = $_POST['island_name'];
    // $region_name = $_POST['region_name'];
    // $province_name = $_POST['province_name'];
    // $city_name = $_POST['city_name'];
    // $barangay_name = $_POST['barangay_name'];
    
    $street = $_POST['street'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];

    print_r($_POST);

    $updateAccount = $userController->editAccountRecord($id, $fullname, $status);

    // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //
    $updateAccountDetails = $userController->editAccountDetailsRecord($id, $street, $gender);
    // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //

    echo json_encode($updateAccount);
    echo json_encode($updateAccountDetails);

  } catch(PDOException $e){
    throw $e;
  }
  

}

// ----------- UPDATE / EDIT ------------- // 

// ------------------------------------------------------------------------- //

// ----------- SELECT UPDATE ------------- //
if(isset($_POST['fetchData'])){

  try{
    $id = $_POST['fetchId'];
    // print_r($_POST);

    $selectUpdateAccount = $userController->selectAccount($id);
    $selectUpdateAccountDetails = $userController->selectAccountDetails($id);

    $result = array(
      'account' => $selectUpdateAccount,
      'accountDetails' => $selectUpdateAccountDetails
    );

    echo json_encode($result);

  } catch(PDOException $e){
    throw $e;
  }
  
}
// ----------- SELECT UPDATE ------------- //

// ------------------------------------------------------------------------- //

// ----------- DELETE ------------- // 
if(isset($_POST['deleteRec'])){

  try{
    $id = $_POST['delete'];

    $deleteAccount = $userController->deleteAccountRecord($id);
    $deleteAccountDetails = $userController->deleteAccountDetailsRecord($id);

    if(!$deleteAccount && $deleteAccountDetails){
      echo "
        <script>console.log('Deleting record failed.')</script>
      ";
    }   
    else{
        echo "
          <script>console.log('Delete record successfully!')</script>
        ";
    }

  } catch(PDOException $e){

    throw $e;
  }
  
}
// ----------- DELETE ------------- // 

// ------------------------------------------------------------------------- //



?>