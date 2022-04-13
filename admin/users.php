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
            <div class="col-lg-12 col-md-12">

                <?php

                if(isset($_GET['source'])){
                    $source = $_GET['source'];
                }
                else{
                    $source = '';
                }

                switch($source){
                    case 'add_user':
                        include './includes/add_user.php';
                        break;
                    case 'edit_user':
                        include './includes/edit_user.php';
                        break;
                    case 'edit_profile':
                        include './includes/edit_profile.php';
                        break;
                    default:
                        include './includes/view_all_users.php';
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
