<?php include "./includes/admin_header.php"; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../admin">Admin</a>
    </div>

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
<!--                <h1 class="page-header">-->
<!--                    Welcome to Admin-->
<!--                    <small>Mridul Islam</small>-->
<!--                </h1>-->

                <?php

                if(isset($_GET['source'])){
                    $source = $_GET['source'];
                }
                else{
                    $source = '';
                }

                switch($source){
                    case 'add_post':
                        include './includes/add_post.php';
                        break;
                    case 'edit_post':
                        include './includes/edit_post.php';
                        break;
                    default:
                        include './includes/view_all_posts.php';
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
