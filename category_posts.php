<?php include('includes/header.php'); ?>

    <!-- Navigation -->
<?php include('includes/navigation.php'); ?>

    <!-- Page Content -->
    <div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if(isset($_GET['c_id'])){
                $the_cat_id = $_GET['c_id'];

                global $connection;
                $query = "SELECT * FROM posts WHERE post_category_id = {$the_cat_id} ORDER BY post_id DESC";
                $category_posts = mysqli_query($connection, $query);
                confirm_query($category_posts);
                $count = mysqli_num_rows($category_posts);
                if($count > 0){
                    while($row = mysqli_fetch_assoc($category_posts)){
                        $post_id      = $row['post_id'];
                        $post_title   = $row['post_title'];
                        $post_user_id = $row['post_user_id'];
                        $post_date    = $row['post_date'];
                        $post_image   = $row['post_image'];
                        $post_content = $row['post_content'];
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

                    } // End of while loop
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

                } // ./Count if loop
                else{
                    echo "<h1 class='page-header bg-info text-center'>
                        No Post Available.
                    </h1>";
                }
            } // ./Get[] if loop


            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include('includes/sidebar.php'); ?>

    </div>
    <!-- /.row -->

    <hr>

<?php include('includes/footer.php'); ?>