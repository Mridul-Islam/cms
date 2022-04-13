<?php include("includes/db.php"); ?>
<?php include("includes/header.php"); ?>

    <!-- Navigation -->
    <?php include("includes/navigation.php");?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                global $connection;
                //show single post query
                if(isset($_GET['p_id'])){
                    $the_post_id = $_GET['p_id'];
                    $query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = {$the_post_id}";
                    $post_views_count_query = mysqli_query($connection, $query);
                    if(!$post_views_count_query){
                        die("Qeury Failed" . mysqli_error($connection));
                    }
                    if(isset($_POST['create_comment'])){
                        echo "<p class='bg-success text-center'>Your comment has been submitted,, please wait for the approval...</p>";
                    }
                    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin'){
                        $query = "SELECT * FROM posts WHERE post_id='{$the_post_id}' ";
                    }
                    else{
                        $query = "SELECT * FROM posts WHERE post_id='{$the_post_id}' AND post_status = 'published' ";
                    }
                    // select all information from the database to show the post information
                    $select_all_posts_query = mysqli_query($connection,$query);
                    $count_posts = mysqli_num_rows($select_all_posts_query);
                    if($count_posts < 1){
                        echo "<h1 class='text-center text-info'> You are not able to see this post. </h1>";
                    }
                    else{
                        while($row = mysqli_fetch_assoc($select_all_posts_query)){
                            $post_title   = $row['post_title'];
                            $post_author  = $row['post_author'];
                            $post_date    = $row['post_date'];
                            $post_image   = $row['post_image'];
                            $post_content = $row['post_content'];

                ?>

                        <!-- First Blog Post -->
                        <h2 class="text-primary">
                            <?php echo $post_title;?>
                        </h2>
                        <p class="lead">
                            by <?php echo $post_author;?>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?> </p>
                        <hr>
                        <img class="img-responsive" src="/cms/images/<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p> <?php echo $post_content;?> </p>

                        <hr>
                        
                <?php 
                            }
                        
                ?>


                        <!-- Blog Comments -->

                <?php //create comment query

                        if(isset($_POST['create_comment'])){
                            $the_post_id = $_GET['p_id'];
                            $comment_author_name = $_POST['comment_author'];
                            $comment_author_email = $_POST['comment_email'];
                            $comment_content = $_POST['comment_content'];


                            //create comment query
                            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                            $query .= "VALUES ({$the_post_id}, '{$comment_author_name}', '{$comment_author_email}', '{$comment_content}', 'unapproved', now())";

                            $insert_comment_query = mysqli_query($connection, $query);

                            if(!$insert_comment_query){
                                die("Qeury Failed" . mysqli_error($connection));
                            }

                        }

                ?>

                        <!-- Comments Form -->
                        <div class="well">
                            <h4>Leave a Comment:</h4>
                            <form action="" method="post" role="form">
                                
                                <div class="form-group">
                                    <label for="author">Your Name</label>
                                    <input type="text" name="comment_author" class="form-control" id="author">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input type="email" name="comment_email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="comment">Your Comment</label>
                                    <textarea class="form-control" rows="3" id="comment" name="comment_content"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                            </form>
                        </div>

                        <hr>

                        <!-- Posted Comments -->
                        <!-- show comment query -->
                <?php

                        $query = "SELECT * FROM comments WHERE comment_post_id={$the_post_id} ";
                        $query .= "AND comment_status='approved' ";
                        $query .= "ORDER BY comment_id DESC ";
                        $select_comment_query = mysqli_query($connection, $query);
                        if(!$select_comment_query){
                            die("Qeury Failed" . mysqli_error($connection));
                        }

                        while($row = mysqli_fetch_assoc($select_comment_query)){
                            $the_comment_author = $row['comment_author'];
                            $the_comment_date = $row['comment_date'];
                            $the_comment_content = $row['comment_content'];

                ?>

                            <!-- Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $the_comment_author; ?>
                                        <small><?php echo $the_comment_date; ?></small>
                                    </h4>
                                    <?php echo $the_comment_content;?>
                                </div>
                            </div>

                <?php    
                        }
                    }
                }
                else{
                    header("Location: index.php");
                }

                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <?php include("includes/sidebar.php");?>


        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
        
<?php include("includes/footer.php"); ?>