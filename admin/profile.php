<?php include("includes/admin_header.php"); ?>

<?php //information of admin after login

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_profile_query = mysqli_query($connection, $query);
    confirmQuery($select_user_profile_query);

    while ($row = mysqli_fetch_assoc($select_user_profile_query)) {
        $profile_username = $row['username'];
        $user_firstname   = $row['user_firstname'];
        $user_lastname    = $row['user_lastname'];
        $user_password    = $row['user_password'];
        $user_email       = $row['user_email'];
    }
}



?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/admin_navigation.php"); ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $username; ?></small>
                        </h1>

                        <?php // update profile query

                        if(isset($_POST['update_profile'])){
                            $user_firstname  = escape($_POST['firstname']);
                            $user_lastname   = escape($_POST['lastname']);
                            $update_username = escape($_POST['username']);
                            $user_password   = escape($_POST['password']);
                            $user_email      = escape($_POST['email']);
                            $user_role       = escape($_POST['role']);

                            $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', username = '{$update_username}', user_password = '{$user_password}', user_email = '{$user_email}' WHERE username = '{$username}' ";
                            $update_user_profile_query = mysqli_query($connection, $query);
                            confirmQuery($update_user_profile_query);

                        }



                        ?>


                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="firstname">FirstName</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $user_firstname;?>">
                            </div>
                            <div class="form-group">
                                <label for="lastname">LastName</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $user_lastname;?>">
                            </div>
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" name="username" id="username" class="form-control" value="<?php echo $profile_username;?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $user_email;?>">
                            </div>
                            <!-- <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div> -->
                            <div class="form-group">
                                <input type="submit" name="update_profile" value="Update Profile" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/admin_footer.php"); ?>
