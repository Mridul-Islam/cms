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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <!-- row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php

                                        global $connection;
                                        $post_query = "SELECT * FROM posts";
                                        $post_query_result = mysqli_query($connection, $post_query);
                                        confirm_query($post_query_result);
                                        $post_count = mysqli_num_rows($post_query_result);

                                        echo "<div class='huge'> {$post_count} </div>";

                                        ?>

                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php

                                        $comments_query = "SELECT * FROM comments";
                                        $comments_query_result = mysqli_query($connection, $comments_query);
                                        confirm_query($comments_query_result);
                                        $comment_count = mysqli_num_rows($comments_query_result);
                                        echo "<div class='huge'> {$comment_count} </div>";

                                        ?>

                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php

                                        $users_query = "SELECT * FROM users";
                                        $users_query_result = mysqli_query($connection, $users_query);
                                        confirm_query($users_query_result);
                                        $user_count = mysqli_num_rows($users_query_result);
                                        echo "<div class='huge'> {$user_count} </div>";

                                        ?>

                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php

                                        $categories_query = "SELECT * FROM categories";
                                        $categories_query_result = mysqli_query($connection, $categories_query);
                                        confirm_query($categories_query_result);
                                        $category_count = mysqli_num_rows($categories_query_result);
                                        echo "<div class='huge'> {$category_count} </div>";

                                        ?>

                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


<?php include "./includes/admin_footer.php"; ?>
