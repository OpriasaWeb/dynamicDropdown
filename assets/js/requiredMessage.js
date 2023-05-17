
// Island required message
function getIsland(){

  var islandId = $('#island').val();
  var islandValidation = $('#resultIsland')[0];

  if(islandId === ""){
    islandValidation.style.fontWeight = 'bold';
    islandValidation.style.color = 'green';
    islandValidation.style.innerText = 'Valid input.';
  } else{
    islandValidation.style.display = 'none';
  }

}

// Region required message
function getRegion(){

  var regionId = $('#region').val();
  var regionValidation = $('#resultRegion')[0];

  if(regionId === ""){
    regionValidation.style.fontWeight = 'bold';
    regionValidation.style.color = 'green';
    regionValidation.style.innerText = 'Valid input.';
  } else{
    regionValidation.style.display = 'none';
  }

}

// Province required message
function getProvince(){

  var provinceId = $('#province').val();
  var provinceValidation = $('#resultProvince')[0];

  if(provinceId === ""){
    provinceValidation.style.fontWeight = 'bold';
    provinceValidation.style.color = 'green';
    provinceValidation.style.innerText = 'Valid input.';
  } else{
    provinceValidation.style.display = 'none';
  }

}

// City required message
function getCity(){

  var cityId = $('#city').val();
  var cityValidation = $('#resultCity')[0];

  if(cityId === ""){
    cityValidation.style.fontWeight = 'bold';
    cityValidation.style.color = 'green';
    cityValidation.style.innerText = 'Valid input.';
  } else{
    cityValidation.style.display = 'none';
  }

}

// Barangay required message
function getBarangay(){

  var barangayId = $('#barangay').val();
  var barangayValidation = $('#resultBarangay')[0];

  if(barangayId === ""){
    barangayValidation.style.fontWeight = 'bold';
    barangayValidation.style.color = 'green';
    barangayValidation.style.innerText = 'Valid input.';
  } else{
    barangayValidation.style.display = 'none';
  }

}

// Gender required message
function getGender(){

  var genderId = $('#gender').val();
  var genderValidation = $('#resultGender')[0];

  if(genderId === ""){
    genderValidation.style.fontWeight = 'bold';
    genderValidation.style.color = 'green';
    genderValidation.style.innerText = 'Valid input.';
  } else{
    genderValidation.style.display = 'none';
  }

}