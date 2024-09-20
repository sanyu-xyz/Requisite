<?php

$db = mysqli_connect("localhost","root","","ecom_store");

function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }

function items() {
  global $db;

  $ip_add = getRealUserIp();

  $get_items = "SELECT * FROM cart WHERE ip_add='$ip_add'";
  $run_items = mysqli_query($db, $get_items);
  $count_items = mysqli_num_rows($run_items);

  echo $count_items;
}

function total_price() {
  global $db;
  $ip_add = getRealUserIp();
  $total = 0;

  $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
  $run_cart = mysqli_query($db, $select_cart);

  while ($record = mysqli_fetch_array($run_cart)) {
      $pro_id = $record['p_id'];
      $pro_qty = $record['qty'];
      $sub_total = $record['p_price'] * $pro_qty;
      $total += $sub_total;
  }

  echo "₹" . $total;
}

function getPro() {
  global $db;

  $get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,4";
  $run_products = mysqli_query($db, $get_products);

  while ($row_products = mysqli_fetch_array($run_products)) {
      $pro_id = $row_products['product_id'];


      $string = $row_products['product_title'];
      $max_length = 20;
      $trimmed_string = (strlen($string) > $max_length) ? substr($string, 0, $max_length) . '...' : $string;
      $pro_title = $trimmed_string;
      
      
      $pro_price = $row_products['product_price'];
      $pro_img1 = $row_products['product_img1'];
      $pro_label = $row_products['product_label'];
      $manufacturer_id = $row_products['manufacturer_id'];

      $get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id='$manufacturer_id'";
      $run_manufacturer = mysqli_query($db, $get_manufacturer);
      $row_manufacturer = mysqli_fetch_array($run_manufacturer);
      $manufacturer_name = $row_manufacturer['manufacturer_title'];

      $pro_psp_price = $row_products['product_psp_price'];
      $pro_url = $row_products['product_url'];

      if ($pro_label == "Sale" || $pro_label == "Gift") {
          $product_price = "<del>&#8377; $pro_price</del>";
          $product_psp_price = "| &#8377; $pro_psp_price";
      } else {
          $product_price = "&#8377; $pro_price";
          $product_psp_price = "";
      }

      if ($pro_label != "") {
          $product_label = "
              <a class='label sale' href='#' style='color:black;'>
                  <div class='thelabel'>$pro_label</div>
                  <div class='label-background'></div>
              </a>";
      } else {
          $product_label = "";
      }

      echo "
          <div class='col-md-4 col-sm-6 single'>
              <div class='product'>
                  <a href='$pro_url'>
                      <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                  </a>
                  <div class='text'>
                      <center>
                          <p class='btn btn-warning'>$manufacturer_name</p>
                      </center>
                      <hr>
                      <h3>
                        <a href='$pro_url'>$pro_title</a>
                      </h3>
                      <p class='price'>$product_price $product_psp_price</p>
                      <p class='buttons'>
                          <a href='$pro_url' class='btn btn-danger'>View Details</a>

                      </p>
                  </div>
                  $product_label
              </div>
          </div>";
  }
}


function getProducts() {
  global $db;

  $aWhere = array();

  if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {
      foreach ($_REQUEST['man'] as $sKey => $sVal) {
          if ((int)$sVal != 0) {
              $aWhere[] = 'manufacturer_id=' . (int)$sVal;
          }
      }
  }

  if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {
      foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {
          if ((int)$sVal != 0) {
              $aWhere[] = 'p_cat_id=' . (int)$sVal;
          }
      }
  }

  if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {
      foreach ($_REQUEST['cat'] as $sKey => $sVal) {
          if ((int)$sVal != 0) {
              $aWhere[] = 'cat_id=' . (int)$sVal;
          }
      }
  }

  $per_page = 6;

  if (isset($_GET['page'])) {
      $page = $_GET['page'];
  } else {
      $page = 1;
  }

  $start_from = ($page - 1) * $per_page;
  $sLimit = " ORDER BY 1 DESC LIMIT $start_from, $per_page";
  $sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' OR ', $aWhere) : '') . $sLimit;

  $get_products = "SELECT * FROM products" . $sWhere;

  $run_products = mysqli_query($db, $get_products);

  while ($row_products = mysqli_fetch_array($run_products)) {
      $pro_id = $row_products['product_id'];


      $string = $row_products['product_title'];
      $max_length = 20;
      $trimmed_string = (strlen($string) > $max_length) ? substr($string, 0, $max_length) . '...' : $string;
      $pro_title = $trimmed_string;

      
      $pro_price = $row_products['product_price'];
      $pro_img1 = $row_products['product_img1'];
      $pro_label = $row_products['product_label'];
      $manufacturer_id = $row_products['manufacturer_id'];

      $get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id='$manufacturer_id'";
      $run_manufacturer = mysqli_query($db, $get_manufacturer);
      $row_manufacturer = mysqli_fetch_array($run_manufacturer);
      $manufacturer_name = $row_manufacturer['manufacturer_title'];

      $pro_psp_price = $row_products['product_psp_price'];
      $pro_url = $row_products['product_url'];

      if ($pro_label == "Sale" || $pro_label == "Gift") {
          $product_price = "<del> &#8377; $pro_price </del>";
          $product_psp_price = "| &#8377; $pro_psp_price";
      } else {
          $product_psp_price = "";
          $product_price = "&#8377; $pro_price";
      }

      if ($pro_label != "") {
          $product_label = "
              <a class='label sale' href='#' style='color:black;'>
                  <div class='thelabel'>$pro_label</div>
                  <div class='label-background'></div>
              </a>
          ";
      }

      echo "
          <div class='col-md-4 col-sm-6 center-responsive'>
              <div class='product'>
                  <a href='$pro_url'>
                      <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                  </a>
                  <div class='text'>
                      <center>
                          <p class='btn btn-warning'> $manufacturer_name </p>
                      </center>
                      <hr>
                      <h3><a href='$pro_url'>$pro_title</a></h3>
                      <p class='price'> $product_price $product_psp_price </p>
                      <p class='buttons'>
                          <a href='$pro_url' class='btn btn-danger'>View details</a>
                      </p>
                  </div>
                  $product_label
              </div>
          </div>
      ";
  }
}

function getPaginator() {
  $per_page = 6;
  global $db;
  $aWhere = array();
  $aPath = '';

  if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {
      foreach ($_REQUEST['man'] as $sKey => $sVal) {
          if ((int)$sVal != 0) {
              $aWhere[] = 'manufacturer_id=' . (int)$sVal;
              $aPath .= 'man[]=' . (int)$sVal . '&';
          }
      }
  }

  if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {
      foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {
          if ((int)$sVal != 0) {
              $aWhere[] = 'p_cat_id=' . (int)$sVal;
              $aPath .= 'p_cat[]=' . (int)$sVal . '&';
          }
      }
  }

  if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {
      foreach ($_REQUEST['cat'] as $sKey => $sVal) {
          if ((int)$sVal != 0) {
              $aWhere[] = 'cat_id=' . (int)$sVal;
              $aPath .= 'cat[]=' . (int)$sVal . '&';
          }
      }
  }

  $sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' OR ', $aWhere) : '');
  $query = "SELECT * FROM products " . $sWhere;
  $result = mysqli_query($db, $query);
  $total_records = mysqli_num_rows($result);
  $total_pages = ceil($total_records / $per_page);

  echo "<li><a href='shop.php?page=1" . (!empty($aPath) ? "&" . $aPath : "") . "'>First Page</a></li>";

  for ($i = 1; $i <= $total_pages; $i++) {
      echo "<li><a href='shop.php?page=" . $i . (!empty($aPath) ? '&' . $aPath : '') . "'>" . $i . "</a></li>";
  }

  echo "<li><a href='shop.php?page=$total_pages" . (!empty($aPath) ? "&" . $aPath : "") . "'>Last Page</a></li>";
}

?>