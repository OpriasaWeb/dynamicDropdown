<?php

include '../model/places.class.php';

class placesController{

  public $placeReferences;

  public function __construct(){
    $this->placeReferences = new places();
  }

  public function selectRegion($id){
    $selectRegion = $this->placeReferences->selectRegion($id);
    return $selectRegion;
  }

  public function selectProvince($id){
    $selectProvince = $this->placeReferences->selectProvince($id);
    return $selectProvince;
  }

  public function selectCity($id){
    $selectCity = $this->placeReferences->selectCity($id);
    return $selectCity;
  }

  public function selectBarangay($id){
    $selectBarangay = $this->placeReferences->selectBarangay($id);
    return $selectBarangay;
  }
  
}







?>