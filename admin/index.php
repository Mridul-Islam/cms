<?php include("includes/admin_header.php"); ?>

    <div id="wrapper">
   <!-- Navigation -->
        <?php include("includes/admin_navigation.php"); ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">
                            Welcome 
                            <?php echo $_SESSION['username']; ?>
                        </h1>
                    </div>
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <!-- count post here -->
                                        <div class='huge'> <?php echo $post_count = recordCount('posts'); ?> </div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
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
                                        <!-- count comments here -->
                                        <div class='huge'> <?php echo $comments_count = recordCount('comments'); ?> </div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
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
                                        <!-- count users here -->
                                        <div class='huge'> <?php echo $users_count = recordCount('users'); ?> </div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
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
                                        <!-- count users here -->
                                        <div class='huge'> <?php echo $categories_count = recordCount('categories'); ?> </div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <?php
                
                // active post count query
                $published_post_count = subRecordCount('posts', 'post_status', 'published');

                // count draft post query
                $draft_post_count = subRecordCount('posts', 'post_status', 'draft');

                // unapproved comments count
                $unapproved_comment_count = subRecordCount('comments', 'comment_status', 'unapproved');

                // Subscriber user count
                $subscriber_count = subRecordCount('users', 'user_role', 'Subscriber');

                ?>
                
                
                <!-- /.row -->
                <div class="row">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],

                                <?php

                                $element_text = ['All Posts', 'Active posts', 'Draft posts', 'Comments', 'Pending comments', 'Users', 'Subscriber User', 'Categories'];
                                
                                $element_count = [$post_count, $published_post_count, $draft_post_count, $comments_count, $unapproved_comment_count, $users_count, $subscriber_count, $categories_count];

                                for($i = 0; $i < 8; $i++){
                                    echo "['{$element_text[$i]}'" . "," . " {$element_count[$i]}],";
                                }


                                ?>

                            ]);

                            var options = {
                                chart: {
                                title: '',
                                subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>
                </div>
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/admin_footer.php"); ?>
