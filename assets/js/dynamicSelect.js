
// Dynamic select
$(document).ready(function(){
  // Region
  $("#island").change(function(){

    var islandId = $(this).val();

    $.ajax({
      // url: "./controller/addressController.php",
      url: "./controller/placesHandler.php",
      method: 'POST',
      dataType: 'json',
      data:{
        regionPost: true,
        island_id: islandId
      },
      success:function(data){

        $("#region").empty();
        $("#province").empty();
        $("#city").empty();
        $("#barangay").empty();
        
        $('#region').append($('<option disabled selected>').text("Select region..."));
        $.each(data, function(i, val) {
          $('#region').append($('<option>', {text: val.region_name, value: val.region_id}));
          // $('#region').append($('<option').text(val.region_name).val(region_id));
        });

        console.log(data);
      }
    });
  });

  // Province
  $("#region").change(function(){
    // var islandId = $("#island").val();
    var regionId = $(this).val();
    $.ajax({
      url: "./controller/placesHandler.php",
      method: 'POST',
      dataType: 'json',
      data:{
        provincePost: true,
        region_id: regionId
      },
      success:function(data){

        $("#province").empty();
        $("#city").empty();
        $("#barangay").empty();

        $('#province').append($('<option disabled selected>').text("Select province..."));
        
        $.each(data, function(i, val) {
          $('#province').append($('<option>', {text: val.province_name, value: val.province_id}));
          // $('#province').append($('<option>').text(val.province_name).val(province_id));
        });

        console.log(data);
      }
    });
  });

  // City
  $("#province").change(function(){
    var provinceId = $(this).val();
    $.ajax({
      url: "./controller/placesHandler.php",
      method: 'POST',
      dataType: 'json',
      data:{
        cityPost: true,
        province_id: provinceId
      },
      success:function(data){
        $("#city").empty();
        $("#barangay").empty();

        $('#city').append($('<option disabled selected>').text("Select city..."));
        $.each(data, function(i, val) {
          $('#city').append($('<option>', {text: val.city_name, value: val.city_id}));
          // $('#province').append($('<option>').text(val.province_name).val(province_id));
        });
        console.log(data);
      }
    });
  });

  // Barangay
  $("#city").change(function(){
    var cityId = $(this).val();
    $.ajax({
      url: "./controller/placesHandler.php",
      method: 'POST',
      dataType: 'json',
      data:{
        barangayPost: true,
        city_id: cityId
      },
      success:function(data){
        $("#barangay").empty();

        $('#barangay').append($('<option disabled selected>').text("Select barangay..."));
        $.each(data, function(i, val) {
          $('#barangay').append($('<option>', {text: val.barangay_name, value: val.barangay_id}));
          // $('#province').append($('<option>').text(val.province_name).val(province_id));
        });

        console.log(data);
      }
    });
  });

});
// Dynamic select


