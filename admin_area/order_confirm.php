<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>




    <?php

    if (isset($_GET['order_confirm'])) {

        //--------------
        $complete = "Complete";
        //--------------

        $order_id = $_GET['order_confirm'];

        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$order_id'";

        $run_pending_order = mysqli_query($con, $update_pending_order);

        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$order_id'";

        $run_customer_order = mysqli_query($con, $update_customer_order);

        $insert_payment = "insert into payments (invoice_no,amount) values ('$invoice_no','$amount')";

        $run_payment = mysqli_query($con, $insert_payment);

        if ($run_pending_order) {

            if ($run_customer_order) {

                if ($run_payment) {

                    echo "<script>alert('Payment Received')</script>";

                    echo "<script>window.open('index.php?view_orders','_self')</script>";
                }
            }
        }
    }
    ?>



<?php } ?>