<?php include('includes/header.php'); ?>

    <!-- Navigation -->
    <?php include('includes/navigation.php'); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

                global $connection;
                $query = "SELECT * FROM posts WHERE post_status='published' ORDER BY post_id DESC";
                $all_posts = mysqli_query($connection, $query);
                confirm_query($all_posts);

                $count_posts = mysqli_num_rows($all_posts);

                if($count_posts > 0){

                    echo "<h1 class='page-header bg-success text-center' style='padding-top: 0px; margin-top: 0px; margin-bottom: 50px'>
                    View All posts
                </h1>";

                    while($row = mysqli_fetch_assoc($all_posts)){
                        $post_id      = $row['post_id'];
                        $post_title   = $row['post_title'];
                        $post_user_id = $row['post_user_id'];
                        $post_date    = $row['post_date'];
                        $post_image   = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_status  = $row['post_status'];
                    ?>

                        <!-- All Blog Posts -->
                        <h2 class="text-center">
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead text-center">

                            <?php

                            $post_author_query = "SELECT * FROM users WHERE user_id=$post_user_id";
                            $result = mysqli_query($connection, $post_author_query);
                            confirm_query($result);
                            while($row = mysqli_fetch_assoc($result)){
                                $post_author = $row['username'];
                            }

                            ?>

                            by <a href="#"><?php echo $post_author; ?></a>
                        </p>
                        <p class="text-center"><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                        <hr>
                        <div style="margin: auto">
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="./images/<?php echo $post_image;?>" alt=""></a>
                        </div>
                        <hr>
                        <p><?php echo substr($post_content, 0, 200); ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr><hr>

                <?php

                    }

                ?>

                        <!-- Pager -->
                        <ul class="pager">
                            <li class="previous">
                                <a href="#">&larr; Older</a>
                            </li>
                            <li class="next">
                                <a href="#">Newer &rarr;</a>
                            </li>
                        </ul>

                <?php

                }
                else{
                    echo "<h1 class='page-header bg-info text-center' style='padding-top: 0px; margin-top: 0px; margin-bottom: 50px'>
                    No post Available 
                </h1>";
                }

                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include('includes/sidebar.php'); ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include('includes/footer.php'); ?>