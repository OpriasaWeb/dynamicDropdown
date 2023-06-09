<?php

require_once("./config/config.php");
require_once("./config/messages.php");

$localaddress = new PDO(DSNA, DBUSERA, DBPASSA);
$localaddress->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

include (APPROOT.'/view/header.php');

?>

<!-- Include header -->
<!-- Include header -->


<body class="show" id="show">

  <div class="container m-5">
    <p class="fs-4 float-end">View info</p>
    <a href="http://localhost/mvc_project/index.php?module=home&action=insert" class="btn btn-info">Back</a>

    

    <table id="dbtable" class="table table-hover border-dark">
      <thead>
        <tr>
          <th>No#</th>
          <th>Name</th>
          <th>Address</th>
          <!-- <th>Region</th>
          <th>Province</th>
          <th>City</th>
          <th>Barangay</th>
          <th>Street</th> -->
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
        <?php
            foreach ($users as $key => $u):
        ?>
      <tbody>
        <tr>

          <th><?php echo $key + 1 ?></th>
          <td><?php echo $u['name'] ?></td>
          <td><?php echo $u['street'] . ', ' . $u['barangay'] . ', ' . $u['city'] . ', ' . $u['province'] . ', ' . $u['region'] . ', ' . $u['island'] ?></td>
          <td><?php echo $u['status'] ?></td>
          <td>
            <button value="<?php echo $u['id']; ?>" data-id="<?php echo $u['id']; ?>" id="modalEdit" name="edit" class="postEdit btn btn-sm btn-outline-primary">Edit</button>
            <button value="<?php echo $u['id']; ?>" id="modalDelete" name="delete" class="postDelete btn btn-sm btn-outline-danger">Delete</button>
            <!-- <button id="modalRegex" name="" class="btn btn-sm btn-outline-dark">Regex</button> -->
            <!-- onclick="editModal()" / onclick="deleteModal()" -->
          </td>
        </tr>
        <?php
          endforeach;
        ?>
        <!-- endforeach -->
      </tbody>
    </table>


    <!------- Last modal please ------->

    <!-- Edit modal/dialog -->
    <dialog id="editDialog">
      <!-- <form method="dialog"> -->
      <button id="closeEdit" class="float-end" aria-label="close" formnovalidate>&times;</button>
      <section>
        <p class="fs-6">Update record <i class='bx bx-text'></i></p>
        
        <div class="updateRecord" id="updateRecord">

          <input type="hidden" name="id" id="id">

          <label for="currentStatus">Current status: <span class="bold" id="spanStatus"></span></label>
          <br>

          <div class="mb-2">
            <label for="" class="form-label">Fullname</label>
            <input type="text" name="fullname" id="fullname" class="form-control" maxlength="32" minlength="2" onInput="editFullname()"> 
            <span id="validationFullname"></span>
            <!-- pattern="^[^~!$%^?]$" title="Only the letters, period and space are allowed." -->
          </div>

          <!-- ---------- TEST and DEBUGGING (Complete address update) if sir ask ---------- -->



          <div class="mb-2">
            <label for="" class="form-label">Bldg/Blk/Lot/Subd</label>
            <input type="text" name="street" id="street" class="form-control" maxlength="32" minlength="2" onInput="editCompleteAddress()" > 
            <span id="validationCompleteAddress"></span>
            <!-- pattern="^[^~!$%^?]$" title="Only the letters, period and space are allowed." -->
          </div>

          <div class="mb-2">
            <label for="gender">Gender</label>
            <span id="resultGender"></span></span>
            <select class="reset form-select mb-3" name="gender" id="gender">
              <option disabled>Update gender...</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>

          <!-- ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- -->

          <label for="status">Status</label>
          <select class="reset form-select mb-3" name="status" id="status">
            <option disabled>Choose...</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
          <div class="mb-2">
            <button name="updateRec" id="updateRec" class="updateRec btn btn-sm btn-dark">Update</button>
          </div>
        </div>
      </section>
      <!-- </form> -->
    </dialog>
    <!-- Edit modal/dialog -->

    <!-- Delete modal/dialog -->
    <dialog id="deleteDialog">
      <form method="dialog">
        <button id="closeDelete" class="float-end" aria-label="close" formnovalidate>&times;</button>
        <section>
          <input type="hidden" name="id" id="id">
          <p class="fs-6">Delete record <i class='bx bx-message-square-minus'></i></p>
          <div class="deleteRecord" id="deleteRecord">
            <div class="mb-2">
              <p class="fs-5">Are you sure you want to delete this record?</p>
              <button name="deleteRec" id="deleteRec" class="deleteRec btn btn-sm btn-danger">Delete</button>
              <!-- <button name="deleteEx" id="deleteEx" class="deleteRec btn btn-sm btn-warning">Example</button> // Debug -->
            </div>
          </div>
        </section>
      </form>
    </dialog>
    <!-- Delete modal/dialog -->

    <!-- Regex error dialog -->
    <dialog id="regexDialog">
      <form method="dialog">
        <section>
          <div class="deleteRecord" id="deleteRecord">
            <div class="mb-2">
              <p class="fs-5 p-5" id="errorMessage">
                <?php
                  echo message::INVALID_FULLNAME;
                ?>
              </p>
              <button name="regError" id="regError" class="regError btn btn-sm btn-dark">Ok</button>
              <!-- <button name="deleteEx" id="deleteEx" class="deleteRec btn btn-sm btn-warning">Example</button> // Debug -->
            </div>
          </div>
        </section>
      </form>
    </dialog>
    <!-- Regex error dialog -->


    <!------- Last modal please ------->


  </div>
    
    <!-- Include header -->
  <?php
    include (APPROOT.'/view/footer.php');
  ?>
  <!-- Include header -->

  <script type="text/javascript">

    // DataTables
    $(document).ready(function () {
      $('#dbtable').DataTable({
      });
    });


    // ------------------------------------------------------- // 

    // Dynamic select address
    <?php 
        include(APPROOT.'/assets/js/dynamicSelect.js'); 
    ?>
    // Dynamic select address

    // Reset click
    <?php 
        include(APPROOT.'/assets/js/resetClick.js'); 
    ?>
    // Reset click

    // ------------------------------------------------------- // 

    // Fullname validation
    <?php 
        include(APPROOT.'/assets/js/fullnameValidation.js'); 
    ?>
    // Fullname validation

    // Complete address validation
    <?php 
        include(APPROOT.'/assets/js/completeAddressValidation.js'); 
    ?>
    // Complete address validation

    // ------------------------------------------------------- // 

    // Modal fetch data
    <?php 
        include(APPROOT.'/assets/js/fetchDataUpdate.js'); 
    ?>
    // Modal fetch data

    // Modal edit
    <?php 
        include(APPROOT.'/assets/js/modalUpdate.js'); 
    ?>
    // Modal edit

    // Model delete
    <?php 
        include(APPROOT.'/assets/js/modalDelete.js'); 
    ?>
    // Model delete

  </script>
  
  
  
</body>
</html>