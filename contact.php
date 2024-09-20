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
      <span class="nero__bold">Contact</span> Us
    </div>
  </div>
</main>

<div class="col-md-12">
  <div class="box">
    <div class="box-header">
      <center>
        <h4><?php echo "If you have any questions, please feel free to contact us, our customer service center is working for you 24/7."; ?></h4>
      </center>
    </div>

    <form action="contact.php" method="post">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" required>
      </div>
      <div class="form-group">
        <label>Select Enquiry Type</label>
        <select name="enquiry_type" class="form-control" required>
          <option disabled selected>Select Enquiry Type</option>
          <option>Order and Delivery Support</option>
          <option>Technical Support</option>
          <option>Price Concern</option>
          <option>Other</option>
        </select>
      </div>
      <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control" name="subject" required>
      </div>
      <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" name="message" required></textarea>
      </div>
      <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">
          Send
        </button>
      </div>
    </form>

    <?php
if (isset($_POST['submit'])) {
    $sender_name = $_POST['name'];
    $sender_email = $_POST['email'];
    $sender_subject = $_POST['subject'];
    $sender_message = $_POST['message'];
    $enquiry_type = $_POST['enquiry_type'];

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO enquiries (name, email, subject, message, enquiry_type)
            VALUES ('$sender_name', '$sender_email', '$sender_subject', '$sender_message', '$enquiry_type')";

    if (mysqli_query($con, $sql)) {
      echo "<script>alert('Your message has been sent successfully.')</script>";
      echo "<script>window.open('./index.php','_self')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>

  </div>
</div>

<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>