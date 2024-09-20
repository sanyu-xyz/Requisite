<body>

<header class="page-header">
  <div class="page-header__topline">
    <div class="container clearfix">
      <div class="currency">
        <a class="currency__change" href="./my_account.php?my_orders">
          <?php if (!isset($_SESSION['customer_email'])): ?>
            Welcome: Guest
          <?php else: ?>
            Welcome: <?php echo $_SESSION['customer_email']; ?>
          <?php endif; ?>
        </a>
      </div>

      <div class="login">
        <a href="../cart.php" class="login__link">
          <i class="icon-basket"></i>
          <?php items(); ?> items
        </a>
      </div>

      <div class="login">
        <a href="../shop.php" class="login__link">
          View All Products
        </a>
      </div>

      <ul class="login">
        <li class="login__item">
          <?php if (!isset($_SESSION['customer_email'])): ?>
            <a href="../customer_register.php" class="login__link">Register</a>
          <?php else: ?>
            <a href="./my_account.php?my_orders" class="login__link">My Account</a>
          <?php endif; ?>
        </li>
        <li class="login__item">
          <?php if (!isset($_SESSION['customer_email'])): ?>
            <a href="../login.php" class="login__link">Sign In</a>
          <?php else: ?>
            <a href="../logout.php" class="login__link">Logout</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>

</header>