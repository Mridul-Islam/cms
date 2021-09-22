
<?php include("includes/db.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("admin/function.php"); ?>

    <!-- Navigation -->
    <?php include("includes/navigation.php");?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

                if(isset($_GET['category'])){
                    $the_cat_id = mysqli_real_escape_string($connection, $_GET['category']);

                    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin'){
                    //if(is_admin($_SESSION['username'])) {
                        //$query = "SELECT * FROM posts WHERE post_category_id = '{$the_cat_id}'";
                        $statement1 = mysqli_prepare($connection, "SELECT post_id, post_title, post_user, post_date, post_image, post_content FROM posts WHERE post_category_id = ? ");
                    }
                    else{
                        //$query = "SELECT * FROM posts WHERE post_category_id = '{$the_cat_id}' AND post_status = 'published'";
                        $statement2 = mysqli_prepare($connection, "SELECT post_id, post_title, post_user, post_date, post_image, post_content FROM posts WHERE post_category_id = ? AND post_status = ?");
                        $published = 'published';
                    }
                
                    
                    //$select_all_posts_query = mysqli_query($connection,$query);

                    if(isset($statement1)){
                        mysqli_stmt_bind_param($statement1, "i", $the_cat_id);
                        mysqli_stmt_execute($statement1);
                        mysqli_stmt_bind_result($statement1, $post_id, $post_title, $post_user, $post_date, $post_image, $post_content);

                        $statement = $statement1;
                    }
                    else{
                        mysqli_stmt_bind_param($statement2, "is", $the_cat_id, $published);
                        mysqli_stmt_execute($statement2);
                        mysqli_stmt_bind_result($statement2, $post_id, $post_title, $post_user, $post_date, $post_image, $post_content);

                        $statement = $statement2;
                    }

                    if(!$statement){
                        die("Qeury Failed " . mysqli_error($connection));
                    }

                    //$category_count = mysqli_num_rows($select_all_posts_query);

                    $category_count = mysqli_stmt_num_rows($statement);

                    if($category_count === 0){
                        //echo "<h1 class='text-center text-primary'> No post available. </h1>";
                    }
                    //else{
                        //while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        while(mysqli_stmt_fetch($statement)):  //{
                            // $post_id      = $row['post_id'];
                            // $post_title   = $row['post_title'];
                            // $post_user    = $row['post_user'];
                            // $post_date    = $row['post_date'];
                            // $post_image   = $row['post_image'];
                            // $post_content = substr($row['post_content'],0,100);

                        ?>

                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <!-- <a href="/cms/post.php?p_id=<?php echo $post_id;?>" > <?php echo $post_title;?> </a> -->
                            <a href="/cms/post/<?php echo $post_id;?>" > <?php echo $post_title;?> </a>

                        </h2>
                        <p class="lead">
                            by <a href="/cms/author_posts.php?author=<?php echo $post_user; ?>"> <?php echo $post_user;?> </a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?> </p>
                        <hr>
                        <!-- <a href="/cms/post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="/cms/images/<?php echo $post_image; ?>" alt=""></a> -->
                        <a href="/cms/post/<?php echo $post_id; ?>"><img class="img-responsive" src="/cms/images/<?php echo $post_image; ?>" alt=""></a>
                        <hr>
                        <p> <?php echo $post_content;?> </p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    
                <?php 


                        //}
                    //}
                    endwhile;
                    mysqli_stmt_close($statement);
                }
                else{
                    header("Location:index.php");
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