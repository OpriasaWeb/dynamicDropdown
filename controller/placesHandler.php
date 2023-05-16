<?php

include 'placesController.php';

$placesController = new placesController();

// Region
if(isset($_POST['regionPost'])){
  try{
    $island_id = $_POST['island_id'];

    $selectRegion = $placesController->selectRegion($island_id);

    echo json_encode($selectRegion);

  } catch(PDOException $e){
    throw $e;
  }
}


// Province
if(isset($_POST['provincePost'])){
  try{
    $region_id = $_POST['region_id'];

    $selectProvince = $placesController->selectProvince($region_id);

    echo json_encode($selectProvince);

  } catch(PDOException $e){
    throw $e;
  }
}

// City
if(isset($_POST['cityPost'])){
  try{
    $province_id = $_POST['province_id'];

    $selectCity = $placesController->selectCity($province_id);

    echo json_encode($selectCity);

  } catch(PDOException $e){
    throw $e;
  }
}

// Barangay
if(isset($_POST['barangayPost'])){
  try{
    $city_id = $_POST['city_id'];

    $selectBarangay = $placesController->selectBarangay($city_id);

    echo json_encode($selectBarangay);

  } catch(PDOException $e){
    throw $e;
  }
}



?>