<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<main>
  <div class="hero">
    <a href="shop.php" class="btn1"> SHOP NOW </a>
  </div>

  <div class="wrapper">
    <h1>Top Products</h1>
  </div>

  <div id="content" class="container">
    <div class="row">
      
      <?php
      getPro();
      ?>

    </div>
  </div>
</main>

<?php
include("includes/footer.php");
?>

</body>
</html>