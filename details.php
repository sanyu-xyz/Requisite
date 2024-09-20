<?php
session_start();
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

<?php
$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_url='$product_id'";
$run_product = mysqli_query($con, $get_product);
$check_product = mysqli_num_rows($run_product);

if ($check_product == 0) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
    $row_product = mysqli_fetch_array($run_product);
    $p_cat_id = $row_product['p_cat_id'];
    $pro_id = $row_product['product_id'];
    $pro_title = $row_product['product_title'];
    $pro_price = $row_product['product_price'];
    $pro_desc = $row_product['product_desc'];
    $pro_img1 = $row_product['product_img1'];
    $pro_img2 = $row_product['product_img2'];
    $pro_img3 = $row_product['product_img3'];
    $pro_label = $row_product['product_label'];
    $pro_psp_price = $row_product['product_psp_price'];
    $status = $row_product['status'];
    $pro_url = $row_product['product_url'];

    $product_label = "";
    if (!empty($pro_label)) {
        $product_label = "
            <a class='label sale' href='#' style='color:black;'>
                <div class='thelabel'>$pro_label</div>
                <div class='label-background'></div>
            </a>";
    }

    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat['p_cat_title'];
}
?>


  <main>
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">Product </span>View
      </div>
      <p class="nero__text">
      </p>
    </div>
  </main>

<div id="content">
  <div class="container">
    <div class="col-md-12">
      <div class="row" id="productMain">
        <div class="col-sm-6">
          <div id="mainImage">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="item active">
                  <center>
                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
                  </center>
                </div>
                <div class="item">
                  <center>
                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
                  </center>
                </div>
                <div class="item">
                  <center>
                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
                  </center>
                </div>
              </div>
              <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <?php echo $product_label; ?>
        </div>
        <div class="col-sm-6">
          <div class="box">
            <h1 class="text-center"><?php echo $pro_title; ?></h1>
            <?php if (isset($_POST['add_cart'])) {
              $ip_add = getRealUserIp();
              $p_id = $pro_id;
              $product_qty = $_POST['product_qty'];
              $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
              $run_check = mysqli_query($con, $check_product);
              if (mysqli_num_rows($run_check) > 0) {
                echo "<script>alert('This Product is already added in cart')</script>";
                echo "<script>window.open('$pro_url','_self')</script>";
              } else {
                $get_price = "select * from products where product_id='$p_id'";
                $run_price = mysqli_query($con, $get_price);
                $row_price = mysqli_fetch_array($run_price);
                $pro_price = $row_price['product_price'];
                $pro_psp_price = $row_price['product_psp_price'];
                if ($pro_label == "Sale" or $pro_label == "Gift") {
                  $product_price = $pro_psp_price;
                } else {
                  $product_price = $pro_price;
                }
                $query = "insert into cart (p_id, ip_add, qty, p_price) values ('$p_id', '$ip_add', '$product_qty', '$product_price')";
                $run_query = mysqli_query($con, $query);
                echo "<script>window.open('$pro_url','_self')</script>";
              }
            } ?>
            <form action="" method="post" class="form-horizontal">
              <?php if ($status == "product") { ?>
                <div class="form-group">
                  <label class="col-md-5 control-label">Product Quantity</label>
                  <div class="col-md-7">
                    <select name="product_qty" class="form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
              <?php } ?>
              <?php if ($status == "product") {
                if ($pro_label == "Sale" || $pro_label == "Gift") {
                  echo "
                    <p class='price'>
                      Product Price: <del>&#8377; $pro_price</del><br>
                      Product Sale Price: &#8377; $pro_psp_price
                    </p>
                  ";
                } else {
                  echo "
                    <p class='price'>
                      Product Price: &#8377; $pro_price
                    </p>
                  ";
                }
              } ?>
              <p class="text-center buttons">
                <button class="btn btn-danger" type="submit" name="add_cart">
                  <i class="fa fa-shopping-cart"></i> Add to Cart
                </button>
                <button class="btn btn-warning" type="submit" name="add_wishlist">
                  <i class="fa fa-heart"></i> Add to Wishlist
                </button>
              </p>
            </form>
          </div>
          <div class="row" id="thumbs">
            <div class="col-xs-4">
              <a href="#" class="thumb">
                <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
              </a>
            </div>
            <div class="col-xs-4">
              <a href="#" class="thumb">
                <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
              </a>
            </div>
            <div class="col-xs-4">
              <a href="#" class="thumb">
                <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="box" id="details">
        <a class="btn btn-info tab" style="margin-bottom:10px;" href="#description" data-toggle="tab">
          <?php if ($status == "product") { echo "Product Description"; } ?>
        </a>
        <hr style="margin-top:0px;">
        <div class="tab-content">
          <div id="description" class="tab-pane fade in active" style="margin-top:7px;">
            <?php echo $pro_desc; ?>
          </div>
        </div>
      </div>
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