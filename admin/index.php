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
                        <h1 class="page-header text-center" style="margin-top: 0">
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

                                        // Count all posts
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

                                        // Count all Comments
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

                                        // Count all Users
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

                                        // Count all Categories
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

                <!-- CMS Chart -->
                <div>
                    <div id="columnchart_material" style="width: auto; height: 600px;"></div>
                </div>
                <!-- ./ CMS Chart -->

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


<?php include "./includes/admin_footer.php"; ?>


<?php

// Active Post Count
$active_posts_query = "SELECT * FROM posts WHERE post_status='published'";
$active_posts_result = mysqli_query($connection, $active_posts_query);
confirm_query($active_posts_result);
$active_post_count = mysqli_num_rows($active_posts_result);

// Draft post count
$draft_posts_query = "SELECT * FROM posts WHERE post_status='draft'";
$draft_posts_result = mysqli_query($connection, $draft_posts_query);
confirm_query($draft_posts_result);
$draft_post_count = mysqli_num_rows($draft_posts_result);

// Approved Comments count
$approved_comment_query = "SELECT * FROM comments WHERE comment_status='approved'";
$approved_comment_result = mysqli_query($connection, $approved_comment_query);
confirm_query($approved_comment_result);
$approved_comment_count = mysqli_num_rows($approved_comment_result);

// Un Approved Comments Count
$un_approved_comment_query = "SELECT * FROM comments WHERE comment_status='un-approved'";
$un_approved_comment_result = mysqli_query($connection, $un_approved_comment_query);
confirm_query($un_approved_comment_result);
$un_approved_comment_count = mysqli_num_rows($un_approved_comment_result);

// Admin Users Count
$admin_user_query = "SELECT * FROM users WHERE user_role='Admin'";
$admin_user_result = mysqli_query($connection, $admin_user_query);
confirm_query($admin_user_result);
$admin_count = mysqli_num_rows($admin_user_result);

// Subscriber Users Count
$subscriber_user_query = "SELECT * FROM users WHERE user_role='Subscriber'";
$subscriber_user_result = mysqli_query($connection, $subscriber_user_query);
confirm_query($subscriber_user_result);
$subscriber_count = mysqli_num_rows($subscriber_user_result);


?>


<!-- Chart javaScript Code -->
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Data', 'count'],

            <?php

            $element_text = ['All posts', 'Active Posts', 'Draft Posts', 'Comments', 'Active Comments', 'Pending Comments', 'Users', 'Admin', 'Subscriber', 'Categories'];
            $element_count = [$post_count, $active_post_count, $draft_post_count, $comment_count, $approved_comment_count, $un_approved_comment_count, $user_count, $admin_count, $subscriber_count, $category_count];

            for($i = 0; $i < 10; $i++){
                echo "['{$element_text[$i]}'" . ", " . "$element_count[$i]],";
            }

            ?>

        ]);

        var options = {
            chart: {
                title: 'CMS Data',
                subtitle: 'Posts, Users, Categories and Comments: count',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
