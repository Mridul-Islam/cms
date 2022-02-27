<h2 class="text-center bg-info">All Posts</h2>
<hr>

<!-- Show All Posts table -->
<table class="table table-bordered table-striped table-hover table-responsive">

    <?php

    // Show all posts Query Functions
    global $connection;
    $query = "SELECT * FROM posts";
    $all_posts_result = mysqli_query($connection, $query);
    confirm_query($all_posts_result);
    $count = mysqli_num_rows($all_posts_result);
    if($count > 0){

    ?>
        <thead>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Image</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>

    <?php

            while($row = mysqli_fetch_assoc($all_posts_result)){
                $post_id       = $row['post_id'];
                $post_author   = $row['post_author'];
                $post_title    = $row['post_title'];
                $post_cat_id   = $row['post_category_id'];
                $post_status   = $row['post_status'];
                $post_tags     = $row['post_tags'];
                $post_comments = $row['post_comment_count'];
                $post_image    = $row['post_image'];
                $post_date     = $row['post_date'];

                echo "<tr>";
                    echo "<td> $post_id </td>";
                    echo "<td> $post_author </td>";
                    echo "<td><a href='../post.php?p_id={$post_id}'> $post_title </a></td>";

                    // show category_title using post_category_id
                    $query = "SELECT * FROM categories WHERE cat_id = {$post_cat_id}";
                    $post_category = mysqli_query($connection, $query);
                    confirm_query($post_category);
                    while($row = mysqli_fetch_assoc($post_category)){
                        $the_cat_title = $row['cat_title'];
                        echo "<td> $the_cat_title </td>";
                    }

                    echo "<td> $post_status </td>";
                    echo "<td> $post_tags </td>";
                    echo "<td> $post_comments </td>";

                    // Show image using condition
                    if($post_image == '' || empty($post_image)){
                        echo "<td><img src='../images/post.jpg' class='img-responsive' width='120px' height='80px' /></td>";
                    }
                    else{
                        echo "<td><img src='../images/{$post_image}' class='img-responsive' width='120px' height='80px' /></td>";
                    }

                    echo "<td> $post_date </td>";
                    echo "<td><a class='btn btn-primary' href='posts.php?source=edit_post&edit_id={$post_id}'>Edit</a></td>";
                    echo "<td><a class='btn btn-danger' href='posts.php?delete_id={$post_id}'>Delete</a></td>";
                echo "</tr>";
            }
        echo "</tbody>";
    }
    else{
        echo "<h2 class='mt-50 text-center bg-info text-primary'>No Post Available</h2>";
    }

    ?>

</table>
<!-- ./ Show All Posts table -->

<!-- Delete Post query -->
<?php

if(isset($_GET['delete_id'])){
    $the_post_id = $_GET['delete_id'];

    // Bring image information to delete the image from server
    $query1 = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    $query1_result = mysqli_query($connection, $query1);
    confirm_query($query1_result);
    while($row = mysqli_fetch_assoc($query1_result)){
        $post_image = $row['post_image'];

        // image deletion
        unlink("../images/{$post_image}");

        // Post delete query
        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        $delete_post_result = mysqli_query($connection, $query);
        confirm_query($delete_post_result);
        header("Location: posts.php");
    }

}

?>