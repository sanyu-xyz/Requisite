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
      <span class="nero__bold">About</span> us
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>

<div id="content">
  <div class="container">
    <div class="col-md-12">
      <div class="box">
        <p class="lead">
          <?php
          echo "Welcome to RequiSite, your go-to destination for the freshest and highest quality groceries. Founded with a passion for healthy living and community support, we are dedicated to providing an exceptional shopping experience. At RequiSite, you will find a diverse selection of fresh produce, organic products, and specialty items sourced from trusted suppliers who share our commitment to quality and sustainability.";
          ?>
          <br>
          <br>
          <?php
          echo "At RequiSite, we believe in the power of community and the importance of sustainability. We strive to create a welcoming environment. Our team is committed to reducing our environmental footprint by offering eco-friendly options and supporting local agriculture. Thank you for choosing RequiSite, where quality meets community.";
          ?>
</p>

      </div>
    </div>
  </div>
</div>

<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>