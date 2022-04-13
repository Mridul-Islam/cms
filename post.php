<?php include('includes/header.php'); ?>

    <!-- Navigation -->
<?php include('includes/navigation.php'); ?>

    <!-- Page Content -->
    <div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            // Create comment code
            createComment();

            ?>

            <?php

            global $connection;
            if(isset($_GET['p_id'])){
                $the_post_id = $_GET['p_id'];

                $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
                $single_post = mysqli_query($connection, $query);
                confirm_query($single_post);

                while($row = mysqli_fetch_assoc($single_post)){
                    $post_title   = $row['post_title'];
                    $post_user_id = $row['post_user_id'];
                    $post_date    = $row['post_date'];
                    $post_image   = $row['post_image'];
                    $post_content = $row['post_content'];
            ?>

                    <!-- All Blog Posts -->
                    <h2 class="text-center">  <?php echo $post_title; ?>  </h2>
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
                    <img class="img-responsive" src="./images/<?php echo $post_image;?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>

                    <hr><hr>

            <?php

                }
            }


            ?>

            <!-- Blog Comments -->
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" name="comment_author" class="form-control" id="name" />
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="email" name="comment_author_email" class="form-control" id="email" />
                    </div>
                    <div class="form-group">
                        <label for="content" >Comment Content:</label>
                        <textarea name="comment_content" class="form-control" rows="3" id="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_comment" >Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <?php

            $the_post_id = $_GET['p_id'];
            $comment_query = "SELECT * FROM comments WHERE comment_post_id={$the_post_id} ";
            $comment_query .= " AND comment_status='approved' ORDER BY comment_id DESC";
            $comment_query_result = mysqli_query($connection, $comment_query);
            confirm_query($comment_query_result);
            while($row = mysqli_fetch_assoc($comment_query_result)){
                $comment_author  = $row['comment_author'];
                $comment_date    = $row['comment_date'];
                $comment_content = $row['comment_content'];

            ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="./images/user-logo.png" alt="" width="80px" height="60px">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small> <?php echo $comment_date; ?> </small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

            <?php

            }

            ?>

        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include('includes/sidebar.php'); ?>

    </div>
    <!-- /.row -->

    <hr>

<?php include('includes/footer.php'); ?>