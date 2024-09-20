<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Enquiries
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
            <div class="panel-heading"><!-- panel-heading Starts -->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Enquiries
                </h3>
            </div><!-- panel-heading Ends -->

            <div class="panel-body"><!-- panel-body Starts -->
                <div class="table-responsive"><!-- table-responsive Starts -->
                    <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Enquiry Type</th>
                                <th>Date</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody><!-- tbody Starts -->

                        <?php
                        $i = 0;
                        $get_enquiries = "SELECT * FROM enquiries";
                        $run_enquiries = mysqli_query($con, $get_enquiries);

                        while ($row_enquiries = mysqli_fetch_array($run_enquiries)) {
                            $enquiry_id = $row_enquiries['id'];
                            $name = $row_enquiries['name'];
                            $email = $row_enquiries['email'];
                            $subject = $row_enquiries['subject'];
                            $message = $row_enquiries['message'];
                            $enquiry_type = $row_enquiries['enquiry_type'];
                            $created_at = $row_enquiries['created_at'];
                            $i++;
                        ?>

                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $subject; ?></td>
                            <td><?php echo $message; ?></td>
                            <td><?php echo $enquiry_type; ?></td>
                            <td><?php echo $created_at; ?></td>
                            <td>
                                <a href="index.php?delete_enquiry=<?php echo $enquiry_id; ?>">
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>
                            </td>
                        </tr>

                        <?php } ?>

                        </tbody><!-- tbody Ends -->
                    </table><!-- table table-bordered table-hover table-striped Ends -->
                </div><!-- table-responsive Ends -->
            </div><!-- panel-body Ends -->
        </div><!-- panel panel-default Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->

<?php } ?>
