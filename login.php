<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<main>
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">Login</span>
    </div>
    <p class="nero__text"></p>
  </div>
</main>

<div id="content">
  <div class="container">
    <div class="col-md-12">
      <?php
      if(!isset($_SESSION['customer_email'])){
        include("customer/customer_login.php");
      } else {
        include("payment_options.php");
      }
      ?>
    </div>
  </div>
</div>

<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
