<!-- Show All Posts table -->
<table class="table table-bordered table-striped table-hover table-responsive">

    <?php

    // Show all posts Query Functions
    global $connection;
    $query = "SELECT * FROM comments";
    $all_comments_result = mysqli_query($connection, $query);
    confirm_query($all_comments_result);
    $count = mysqli_num_rows($all_comments_result);
    if($count > 0){
        echo "<h2 class='text-center bg-info'>All Comments</h2><hr>";

    ?>

        <thead>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Un-approve</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>

        <?php

        while($row = mysqli_fetch_assoc($all_comments_result)){
            $comment_id      = $row['comment_id'];
            $comment_author  = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email   = $row['comment_email'];
            $comment_status  = $row['comment_status'];
            $comment_post_id = $row['comment_post_id'];
            $comment_date    = $row['comment_date'];

            echo "<tr>";
                echo "<td> {$comment_id} </td>";
                echo "<td> {$comment_author} </td>";
                echo "<td> {$comment_content} </td>";
                echo "<td> {$comment_email} </td>";
                echo "<td> {$comment_status} </td>";

                // Bring the comment post title and show here
                $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
                $comment_post = mysqli_query($connection, $query);
                confirm_query($comment_post);
                while($row = mysqli_fetch_assoc($comment_post)){
                    $comment_post_title = $row['post_title'];
                    echo "<td> {$comment_post_title} </td>";
                }
                
                echo "<td> {$comment_date} </td>";
                echo "<td><a href='#'>Approve</a></td>";
                echo "<td><a href='#'>Un-Approve</a></td>";
                echo "<td><a href='#'> Edit </a></td>";
                echo "<td><a href='#'> Delete </a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
    }
    else{
        echo "<h2 class='mt-50 text-center bg-info text-primary'>No Comments Available</h2>";
    }

    ?>

</table>
<!-- ./ Show All Posts table -->

<!-- Delete Post query -->
<?php



?>