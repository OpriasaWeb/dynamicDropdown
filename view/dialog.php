<?php








?>


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