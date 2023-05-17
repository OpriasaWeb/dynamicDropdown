

<!-- View -->

<?php

// view represents the user interface of the application.
require_once("./config/config.php");

// Local address
$localaddress = new PDO(DSNA, DBUSERA, DBPASSA);
$localaddress->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Local
$local = new PDO(DSN, DBUSER, DBPASS);
$local->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!-- Include header -->
<?php
    include (APPROOT.'/view/header.php');
?>
<!-- Include header -->

<body>
  <div class="container">
    <div class="m-5">
    <p class="fs-4">PhilWeb exercises</p>
    <a href="http://localhost/mvc_project/index.php?module=home&action=showall" class="btn btn-success float-end">View info</a>
    </div>
  </div>

  <div class="input-section">
    <div class="container-input">
      <div class="mb-3">
        <label for="" class="form-label">Lastname <span class="limitation">(Only letters, period and space are allowed)</span></label>
        <span id="resultLname">* required</span>
        <input type="text" name="lname" id="lastname" class="form-control" maxlength="32" minlength="2" onInput="getLname()" required> 
        
        <!-- pattern="^[^~!$%^?]$" title="Only the letters, period and space are allowed." -->
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Firstname <span class="limitation">(Only letters, period and space are allowed)</span></label>
        <span id="resultFname">* required</span>
        <input type="text" name="fname"  id="firstname" class="form-control" maxlength="32" minlength="2" onInput="getFname()" required>
        
        <!-- pattern=^[^~!$%^?]$" title="Only the letters, period and space are allowed." -->
      </div>
      <p class="fs-5 text-bold">Address</p>



      <input type="hidden" name="status" id="status" value="active">

      <label for="island">Island</label>
      <span id="resultIsland">* required</span>
      <select id="island" name="slnd" class="reset form-select mb-3" onChange="getIsland()">
        <option value="" selected disabled>Select an island...</option>

        <!-- Fetching island from database using while loop -->
        <?php
          // $pwconn = $localdb->pwcconn();
          // fetching island data from db
          $islandData = "SELECT * FROM address.island";
          $island_stmt = $localaddress->query($islandData);

          $island_stmt->execute();
          // var_dump($islandData);
          // echo $island;
          while($island = $island_stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
          <option value="<?php echo htmlspecialchars($island['island_id'])?>"><?php echo htmlspecialchars($island['island_name'])?></option>
        <?php
          }
        ?>
          
        <!-- Fetching island from database using while loop -->
        
      </select>
      

      <label for="region">Region</label>
      <span id="resultRegion">* required</span>
      <select class="reset form-select mb-3" name="rgn" id="region" placeholder="Select region..." onChange="getRegion()">
        <option disabled>Select region...</option>
      </select>
      

      <label for="province">Province</label>
      <span id="resultProvince">* required</span>
      <select class="reset province form-select mb-3" name="prvnc" id="province" onChange="getProvince()">
        <option disabled>Select province...</option>
      </select>
      

      <label for="city">City</label>
      <span id="resultCity">* required</span>
      <select class="reset form-select mb-3" name="ct" id="city" onChange="getCity()">
        <option disabled>Select city...</option>
      </select>
      

      <label for="barangay">Barangay</label>
      <span id="resultBarangay">* required</span>
      <select class="reset form-select mb-3" name="brgy" id="barangay" onChange="getBarangay()">
        <option disabled>Select barangay...</option>
      </select>
      

      <div class="mb-3">
        <label for="" class="form-label">Bldg/Blk/Lot/Subd</label>
        <span id="resultAddress">* required</span>
        <input type="text" onInput="addressInput()" name="ddrss" id="address" class="address form-control">
        <!-- pattern="^[a-zA-Z0-9\s,'-]*$" title="!, $, %, ^ are not allowed" -->
        
        
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Gender</label>
        <span id="resultGender">* required</span>
        <select id="gender" name="gndr" class="gender form-select" aria-label="Default select example" onChange="getGender()">
          <option value="">Choose...</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        <!-- <option value="No">I'd rather not to say</option> -->
        </select>
        
        
      </div>

      <div class="mb-3">
        <label>Birthdate <span class="limitation">(21 above are allowed)</span></label>
        <span id="resultBirthdate">Optional</span>
        <input type="text" name="birthdate" id="datepicker" class="birthdate form-control" placeholder="Date..">
        
      </div>

      <div class="form-group">
        <button type="submit" name="insert" id="insert" class="insert btn btn-primary float-end m-5" onclick="displayData()">Submit</button>
        <!-- <input type="submit" value="Submit" name="insert" id="insert" class="btn btn-success btn-block mt-5 float-end" onclick="displayData()"> -->
      </div>
      
      
      <!-- <button type="submit" name="info" id="newUser" class="btn btn-primary float-end mb-3" onclick="displayData()">Submit</button> -->

      
    <!-- </form> -->
    </div>
  </div>

  <!-- Last modal please -->

  <!-- Simple pop-up dialog box, containing a form -->
  <dialog id="favDialog">
    <form method="dialog">
      <button id="close" class="float-end" aria-label="close" formnovalidate>&times;</button>
      <section>
        <p class="fs-4">View info</p>
        <div class="viewInfo" id="viewInfo">
        
        </div>
      </section>
    </form>
  </dialog>

  <!-- Regex error dialog -->

  <!-- Regex error dialog -->

  <!-- Regex error dialog -->
  
  <!-- Regex error dialog -->

  <!-- Last modal please -->


  <!-- --------------------------------------------------------------------------- -->
  
  <?php
      include (APPROOT.'/view/footer.php');
  ?>


  <!-- Date picker -->
  <script type="text/javascript">

    // Prevent the bad input in names
    <?php 
        include(APPROOT.'/assets/js/lnameValidation.js'); 
    ?>

    <?php 
        include(APPROOT.'/assets/js/fnameValidation.js'); 
    ?>
    // Prevent the bad input in names

    // Prevent bad input of address
    <?php 
        include(APPROOT.'/assets/js/addressValidation.js'); 
    ?>
    // Prevent bad input of address

    // ---------------------------------------------------------- //

    // Form button display data
    <?php 
        include(APPROOT.'/assets/js/displayData.js'); 
    ?>
    // Form button display data

    // ---------------------------------------------------------- //

    // Date picker
    <?php 
        include(APPROOT.'/assets/js/datePicker.js'); 
    ?>
    // Date picker

    // ---------------------------------------------------------- //

    // Dynamic select
    <?php 
        include(APPROOT.'/assets/js/dynamicSelect.js'); 
    ?>
    // Dynamic select

    // ---------------------------------------------------------- //

    // Reset required message
    <?php 
        include(APPROOT.'/assets/js/requiredMessage.js'); 
    ?>
    // Reset required message

    // ---------------------------------------------------------- //
    
    // Insert data
    <?php 
        include(APPROOT.'/assets/js/insertRecord.js'); 
    ?>
    // Insert data

  </script>
  
</body>
</html>
<!-- View -->



