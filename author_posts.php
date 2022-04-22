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
                if(isset($_GET['author'])){
                    $the_author_name = $_GET['author'];
                }
                $query = "SELECT * FROM posts WHERE post_author='{$the_author_name}' AND post_status = 'published'";
                $select_author_posts_query = mysqli_query($connection,$query);
                if(!$select_author_posts_query){
                    die("Qeury Failed" . mysqli_error($connection));
                }
                while($row = mysqli_fetch_assoc($select_author_posts_query)){
                    $the_post_id  = $row['post_id'];
                    $post_title   = $row['post_title'];
                    $post_author  = $row['post_author'];
                    $post_date    = $row['post_date'];
                    $post_image   = $row['post_image'];
                    $post_content = $row['post_content'];

                ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $the_post_id; ?>"> <?php echo $post_title;?> </a>
                </h2>
                <p class="lead">
                    by <?php echo $post_author;?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?> </p>
                <hr>
                <a href="post.php?p_id=<?php echo $the_post_id; ?>"><img width="500px" class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                <hr>
                <p> <?php echo $post_content;?> </p>

                <hr>
                
                <?php 
                    }
                
                ?>
                
                <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <?php include("includes/sidebar.php");?>


        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
        
<?php include("includes/footer.php"); ?>