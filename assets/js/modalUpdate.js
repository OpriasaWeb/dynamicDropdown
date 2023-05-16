$(document).ready(function(){
  // e.preventDefault();

  $('#updateRec').click(function(e){

    e.preventDefault();

    const regexDialog = document.getElementById("regexDialog");
    const regError = document.getElementById("regError");
    // const errorMessage = $("errorMessage");
    
    var id = $('#id').val();
    var fullname = $('#fullname').val();
    var status = $('select[name="status"] option:selected').val();
    var regexfName = /^[a-zA-Z.\s]*$/;

    if(!fullname.match(regexfName)){
      regexDialog.showModal();

      $("errorMessage").text("Invalid name updating.");

      // Debugging if working correctly
      function openCheck(regexDialog) {
        if (regexDialog.open) {
          console.log("Regex dialog open");
        } else {
          console.log("Regex dialog closed");
        }
      }
      // Call the openCheck for debugging
      openCheck(regexDialog);
    
      // Form close button closes the dialog box
      regError.addEventListener("click", () => {
        regexDialog.close();
        // $(".reset").slice(0, 6).find("option").prop("selected", false);
        openCheck(regexDialog);

        return true;
      });

      return false;

    }

   

    // Reload page function
    function reloadPage(){
      setTimeout(function() {
        location.reload(true);
      }, 0);
    }
    // Reload page function

    

    // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //
    // var ddrss = $('#address').val();
    // var islandName = $('select[name="slnd"] option:selected').text();
    // var regionName = $('select[name="rgn"] option:selected').text();
    // var provinceName = $('select[name="prvnc"] option:selected').text();
    // var cityName = $('select[name="ct"] option:selected').text();
    // var barangayName = $('select[name="brgy"] option:selected').text();

    // var full_address = ddrss + ", " + barangayName + ", " + cityName + ", " + provinceName + ", " + regionName + ", " + islandName;
    // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //


    $.ajax({
      url: "./controller/userHandler.php",
      type: "POST",
      data: { 
        updateData: true,
        id: id,
        fullname: fullname,
        // fullAddress: full_address,
        status: status
      },
      success: function(response){
        console.log(response);
        editDialog.close();
        reloadPage();
        // return false;
        // window.location.href = "http://localhost/mvc_project/index.php?module=home&action=showall";
      },
      error: function(error){
        console.log(error);
      }
    })

  })

})