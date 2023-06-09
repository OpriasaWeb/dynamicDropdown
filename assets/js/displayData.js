// Form button display data
function displayData(){

  // Regex pop error message condition
  // Regex for address
  var addressRegex = /^[a-zA-Z0-9\s,'-.]*$/;

  // Regex for lastname and firstname 
  var regex = /^[a-zA-Z.\s]*$/;

  // Lastname
  var lname = document.getElementById("lastname");
  var lnameValue = lname.value;

  // Firstname
  var fname = document.getElementById("firstname");
  var fnameValue = fname.value;

  // Island
  var island = document.getElementById("island");
  var islandValue = island.value;

  // Region
  var region = document.getElementById("region");
  var regionValue = region.value;

  // Province
  var province = document.getElementById("province");
  var provinceValue = province.value;

  // City
  var city = document.getElementById("city");
  var cityValue = city.value;

  // Barangay
  var barangay = document.getElementById("barangay");
  var barangayValue = barangay.value;

  // Address
  var inputAddress = document.getElementById("address");
  var addressValue = inputAddress.value;  

  // Gender
  var gender = document.getElementById("gender");
  var genderValue = gender.value;

  // Birthdate
  var birthdate = document.getElementById("datepicker");
  var birthdateValue = birthdate.value;




  // Required message span id
  let resultLname = document.getElementById("resultLname"), resultFname = document.getElementById("resultFname"),
  resultAddress = document.getElementById("resultAddress"), resultIsland = document.getElementById("resultIsland"),
  resultRegion = document.getElementById("resultRegion"), resultProvince = document.getElementById("resultProvince"),
  resultCity = document.getElementById("resultCity"), resultBarangay = document.getElementById("resultBarangay"), 
  resultGender = document.getElementById("resultGender"), resultBirthdate = document.getElementById("resultBirthdate");
  // Required message span id

  // If lastname left no value
  if(lnameValue === ""){
    resultLname.style.fontWeight = 'bold';
    resultLname.style.color = 'red';
    resultLname.innerText = "* required";
    // If any of these if empty
    alert("Last name should not be empty.");
    return false;
  } 
  // If firstname left no value
  if(fnameValue === ""){
    resultFname.style.fontWeight = 'bold';
    resultFname.style.color = 'red';
    resultFname.innerText = "* required";
    alert("First name should not be empty.");
    return false;
  } 

  // If island left no value
  if(islandValue === ""){
    // If any of these if empty
    alert("Island should not be empty.");
    return false;
  } else{
    resultIsland.display = "none";
  }
  // If region left no value
  if(regionValue === "Select region..."){
    resultRegion.style.fontWeight = 'bold';
    resultRegion.style.color = 'red';
    resultRegion.innerText = "* required";
    // If any of these if empty
    alert("Region should not be empty.");
    return false;
  } else{
    resultRegion.display = "none";
  }
  // If province left no value
  if(provinceValue === "Select province..."){
    resultProvince.style.fontWeight = 'bold';
    resultProvince.style.color = 'red';
    resultProvince.innerText = "* required";
    // If any of these if empty
    alert("Province should not be empty.");
    return false;
  } else{
    resultProvince.display = "none";
  }
  // If city left no value
  if(cityValue === "Select city..."){
    resultCity.style.fontWeight = 'bold';
    resultCity.style.color = 'red';
    resultCity.innerText = "* required";
    // If any of these if empty
    alert("City should not be empty.");
    return false;
  } else{
    resultCity.display = "none";
  }
  // If barangay left no value
  if(barangayValue === "Select barangay..."){
    resultBarangay.style.fontWeight = 'bold';
    resultBarangay.style.color = 'red';
    resultBarangay.innerText = "* required";
    // If any of these if empty
    alert("Barangay should not be empty.");
    return false;
  } else{
    resultBarangay.display = "none";
  }

  // If address left no value
  if(addressValue === ""){
    resultAddress.style.fontWeight = 'bold';
    resultAddress.style.color = 'red';
    resultAddress.innerText = "* required";
    alert("Address should not be empty.");
    return;
  } else{
    resultIsland.style.fontWeight = 'bold';
    resultIsland.style.color = 'green';
    resultIsland.innerText = "Valid input";
  }

  // If gender left no value
  var allowedValues = ['male', 'female'];
  
  if(genderValue.selectedIndex === 0){
    resultGender.style.fontWeight = 'bold';
    resultGender.style.color = 'red';
    resultGender.innerText = "* required";
    // If any of these is empty
    // alert("Gender is required.");
    console.log("Gender is required.");
    return false;
  } else if (!allowedValues.includes(genderValue)) {
    // If the user value is not in the allowed ENUM values, show an error message
    alert("Gender is required.");
    return;
  } else{
    resultIsland.style.fontWeight = 'bold';
    resultIsland.style.color = 'green';
    resultIsland.innerText = "Valid input";
  }
  // If birthdate left no value
  // if(birthdateValue.trim() === ''){
  //   resultBirthdate.style.fontWeight = 'bold';
  //   resultBirthdate.style.color = 'red';
  //   resultBirthdate.innerText = "* required";
  //   // If any of these if empty
  //   alert("Birthdate should not be empty.");
  //   return false;
  // }

  if(!regex.test(lnameValue) || !regex.test(fnameValue) || !addressRegex.test(addressValue)){
    // if any of these is false
    alert("Kindly recheck the lastname, firstname or address if valid input.");
    return false;
  }
  // If no error, show the popup created user
  else{
    // Inputs variable

    // ------------------------------------------------------- //


    // Dialog pop
    const closeButton = document.getElementById("close");
    const dialog = document.getElementById("favDialog");

    // Debugging if working correctly
    function openCheck(dialog) {
      if (dialog.open) {
        console.log("Dialog open");
      } else {
        console.log("Dialog closed");
      }
    }

    // Show the light box containing the data inputted by the user
    dialog.showModal();
    openCheck(dialog);


    // Form close button closes the dialog box
    closeButton.addEventListener("click", () => {
      dialog.close();
      openCheck(dialog);

      window.location.href = "http://localhost/mvc_project/index.php?module=home&action=showall";

      // setTimeout(function() {
      //   location.reload(true);
      // }, 100);
    });

    // Dialog pop

    // ------------------------------------------------------- //

    // Content of the input data from the user
    var lname = document.getElementById("lastname").value;
    var fname = document.getElementById("firstname").value;
    var islnd = document.getElementById("island").value;
    var rgn = document.getElementById("region").value;

    // Get the province text content
    var prvnc = document.getElementById("province");
    var prvncOption = prvnc.options[prvnc.selectedIndex];
    var prvncSelected = prvncOption.textContent;
    // Get the province text content

    // Get the city text content
    var ct = document.getElementById("city");
    var ctOption = ct.options[ct.selectedIndex];
    var ctSelected = ctOption.textContent;
    // Get the city text content

    // Get the barangay text content
    var brgy = document.getElementById("barangay");
    var brgyOption = brgy.options[brgy.selectedIndex];
    var brgySelected = brgyOption.textContent;
    // Get the barangay text content

    var addrss = document.getElementById("address").value;
    var gndr = document.getElementById("gender").value;
    var birthdate = document.getElementById("datepicker").value;


    // To be display
    var nameOfUser = "Fullname: " + fname + " " + lname;
    var userAddress = "Address: " + addrss + ", " + brgySelected + ", " + ctSelected + ", " + prvncSelected;
    var genderUser = "Gender: " + gndr;
    // To be display

    // Create div to include the info
    const nameDiv = document.createElement("p");
    const addressDiv = document.createElement("p");
    const genderDiv = document.createElement("p");
    // const dialogPop = document.createElement("dialog");

    // Put the context of the string to the newly created div
    nameDiv.textContent = nameOfUser;
    addressDiv.textContent = userAddress;
    genderDiv.textContent = genderUser;

    // Display modal variable text content
    var viewInfo = document.getElementById("viewInfo");

    viewInfo.appendChild(nameDiv);
    viewInfo.appendChild(addressDiv);
    viewInfo.appendChild(genderDiv);

  }
}
// Form button display data

// Island

// Region

// Province

// City

// Barangay