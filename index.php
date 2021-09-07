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

                $post_per_page = 5;

                if(isset($_GET['page'])){
                    $page_number = $_GET['page'];
                }else{
                    $page_number = "";
                }

                if($page_number== "" || $page_number == 1){
                    $show = 0;
                }
                else{
                    $show = ($post_per_page * $page_number) - $post_per_page;
                }



                // count the number of posts
                if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin'){
                    $count_query = "SELECT * FROM posts";
                }
                else{
                    $count_query = "SELECT * FROM posts WHERE post_status = 'published'";
                }
                
                $count_all_post_query = mysqli_query($connection, $count_query);
                if(!$count_all_post_query){
                    die("Qeury Failed" . mysqli_error($connection));
                }
                $count_posts = mysqli_num_rows($count_all_post_query);
                $count_page = ceil($count_posts/$post_per_page);

                

                if($count_posts < 1){
                    echo "<h1 class='text-center text-primary'> No post available. </h1>";
                }
                else{

                    // show post query
                    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin'){
                        $query = "SELECT * FROM posts LIMIT $show, $post_per_page";
                    }
                    else{
                        $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $show, $post_per_page";
                    }
                    
                    $select_all_posts_query = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_id      = $row['post_id'];
                        $post_title   = $row['post_title'];
                        $post_author  = $row['post_author'];
                        $post_user    = $row['post_user'];
                        $post_date    = $row['post_date'];
                        $post_image   = $row['post_image'];
                        $post_content = substr($row['post_content'],0,200);
                        $post_status  = $row['post_status'];


                    ?>

                            <h1 class="page-header">
                                Page Heading
                                <small>Secondary Text</small>
                            </h1>

                            <!-- First Blog Post -->
                            <h2>
                                <a href="post.php?p_id=<?php echo $post_id;?>" > <?php echo $post_title;?> </a>
                            </h2>
                            <p class="lead">
                                by <a href="author_posts.php?author=<?php echo $post_user;?>"> 

                                    <?php 

                                    if(!empty($post_author)){
                                        echo $post_author;
                                    }
                                    else if(!empty($post_user)){
                                        
                                        echo $post_user;
                                    }


                                    ?> 
                                
                                </a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?> </p>
                            <hr>
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                            <hr>
                            <p> <?php echo $post_content;?> </p>
                            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>
                            
                <?php

                        }

                    }

                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <?php include("includes/sidebar.php");?>


        </div>
        <!-- /.row -->

        <hr>

        <ul class="pager">
            <?php

            for($i = 1; $i <= $count_page; $i++){

                if($i == $page_number){
                    echo "<li><a class='active_link' href='index.php?page={$i}'> {$i} </a></li>";
                }else{
                    echo "<li><a href='index.php?page={$i}'> {$i} </a></li>";
                }
                
            }



            ?>
        </ul>


<!-- Footer -->
        
<?php include("includes/footer.php"); ?>