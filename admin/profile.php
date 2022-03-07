<?php include "./includes/admin_header.php"; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <!-- Top Menu Items -->
    <?php include "./includes/admin_top_nav.php"; ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include "./includes/admin_side_nav.php"; ?>

</nav>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1 class="page-header text-center">
                    Welcome
                </h1>

                <?php

                global $connection;
                // pull the user information
                if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                    $query = "SELECT * FROM users WHERE username = '$username'";
                    $query_result = mysqli_query($connection, $query);
                    confirm_query($query_result);
                    while($row = mysqli_fetch_assoc($query_result)){
                        $user_id          = $row['user_id'];
                        $username         = $row['username'];
                        $user_firstname   = $row['user_firstname'];
                        $user_lastname    = $row['user_lastname'];
                        $user_email       = $row['user_email'];
                        $user_password    = $row['user_password'];
                        $user_role        = $row['user_role'];
                        $user_image       = $row['user_image'];
                        $user_address     = $row['user_address'];
                        $user_description = $row['user_description'];

                ?>

                        <!-- Profile -->
                        <div class="col-xs-12 col-sm-12 col-md-12" style="line-height: 2.0">
                            <div class="well well-md">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5">
                                        <img src="../images/<?php echo $user_image; ?>" alt="" class="img-rounded img-responsive" width="320px" height="250px" />
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <h4><?php echo $username; ?></h4>
                                        <small><cite title="San Francisco, USA"> <?php echo $user_address; ?> <i class="glyphicon glyphicon-map-marker">
                                                </i></cite></small>
                                        <p>
                                            <i class="glyphicon glyphicon-envelope"></i><?php echo $user_email; ?>
                                            <br />
                                        </p>
                                        <p> <?php echo $user_description; ?></p>
                                        <a href="./users.php?source=edit_profile&p_user_id=<?php echo $user_id; ?>" class="btn btn-primary">Edit Profile</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./ profile -->

                <?php

                    }
                }


                ?>



            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<?php include "./includes/admin_footer.php"; ?>
