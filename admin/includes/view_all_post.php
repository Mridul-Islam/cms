<?php

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])){
    $checkBoxes_id = $_POST['checkBoxArray'];

    foreach($checkBoxes_id as $checkBoxValue){
        $bulk_options = escape($_POST['bulk_options']);

        switch($bulk_options){
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checkBoxValue}";
                $set_publish_post_query = mysqli_query($connection, $query);
                confirmQuery($set_publish_post_query);
                break;
            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checkBoxValue}";
                $set_draft_post_query = mysqli_query($connection, $query);
                confirmQuery($set_draft_post_query);
                break;
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$checkBoxValue}";
                $delete_selected_post_query = mysqli_query($connection, $query);
                confirmQuery($delete_selected_post_query);
                break;
            case 'clone':
                $query = "SELECT * FROM posts WHERE post_id = {$checkBoxValue}";
                $post_clone_query = mysqli_query($connection, $query);

                confirmQuery($post_clone_query);

                while($row = mysqli_fetch_assoc($post_clone_query)){
                    $post_category_id   = $row['post_category_id'];
                    $post_title         = $row['post_title'];
                    $post_author        = $row['post_author'];
                    $post_user          = $row['post_user'];
                    $post_status        = $row['post_status'];
                    $post_image         = $row['post_image'];
                    $post_tags          = $row['post_tags'];
                    $post_content       = $row['post_content'];
                    $post_date          = $row['post_date'];


                    $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_status, post_image, post_tags, post_content, post_date) VALUES({$post_category_id}, '{$post_title}', '{$post_user}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now()) ";
                    $post_clone_insert_query = mysqli_query($connection, $query);

                    confirmQuery($post_clone_insert_query);

                }
        }

    }

}



?>



<form action="" method="post">
    <table class="table table-bordered table-hover table-striped table-responsive mytable">

        <div id="bulkOptionContainer" class="col-xs-4">
            <select class="form-control" name="bulk_options">
                <option value="">Select option</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="apply" class="btn btn-success" value="Apply">
            <a href="./posts.php?source=add_post" class="btn btn-primary"> Add New Post </a>
        </div>

        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBoxes"></th>
                <th>Id</th>
                <th>User</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Views</th>
            </tr>
        </thead>
        <tbody>
            
            <?php

            //$query = "SELECT * FROM posts ORDER BY post_id DESC";
            $query = "SELECT posts.post_id, posts.post_category_id, posts.post_title, posts.post_author, posts.post_user, posts.post_date, posts.post_image, posts.post_content, posts.post_tags, posts.post_comment_count, posts.post_status, posts.post_views_count, ";
            $query .= "categories.cat_id, categories.cat_title ";
            //$query .= "comments.comment_id, comments.comment_post_id, comments.comment_author, comments.comment_email, comments.comment_content, comments.comment_status, comments.comment_date "; 
            $query .= "FROM posts ";
            $query .= "LEFT JOIN categories ON posts.post_category_id = categories.cat_id ORDER BY post_id DESC";
            //$query .= "LEFT JOIN comments ON posts.post_id = comments.comment_post_id ORDER BY post_id DESC";

            $posts_query_result = mysqli_query($connection, $query);
            
            confirmQuery($posts_query_result);
            
            while($row = mysqli_fetch_assoc($posts_query_result)){
                $post_id            = $row['post_id'];
                $post_author        = $row['post_author'];
                $post_user          = $row['post_user'];
                $post_title         = $row['post_title'];
                $post_category_id   = $row['post_category_id'];
                $post_status        = $row['post_status'];
                $post_image         = $row['post_image'];
                $post_tags          = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_date          = $row['post_date'];
                $post_views_count   = $row['post_views_count'];
                $category_title     = $row['cat_title'];

                echo "<tr>";

            ?>

                    <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>

            <?php

                    echo "<td> {$post_id} </td>";


                    if(!empty($post_author)){
                        echo "<td> $post_author </td>";
                    }
                    elseif(!empty($post_user)){
                        echo "<td> {$post_user} </td>";
                    }

                    echo "<td> {$post_title} </td>";

                    // query for show category title into table
                    // $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
                    // $select_category_query_result = mysqli_query($connection, $query);
                    // confirmQuery($select_category_query_result);
                    // while ($row = mysqli_fetch_assoc($select_category_query_result)) {
                    //     $cat_title = $row['cat_title'];
                        echo "<td> {$category_title} </td>";
                    //}
                    
                    echo "<td> {$post_status} </td>";
                    echo "<td> <img src='../images/{$post_image}' class='img-responsive' width='100' /> </td>";
                    echo "<td> {$post_tags} </td>";

                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                    $count_comment_query = mysqli_query($connection, $query);
                    confirmQuery($count_comment_query);
                    $count_comments = mysqli_num_rows($count_comment_query);

                    echo "<td><a href='post_comments.php?post_id={$post_id}'> {$count_comments} </a></td>";

                    echo "<td> {$post_date} </td>";
                    echo "<td><a href='../post.php?p_id={$post_id}'> View Post </a></td>";
                    echo "<td> <a href='posts.php?source=edit_post&p_id={$post_id}' class='text-normal'>Edit</a> </td>";

                    //echo "<td> <a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}' class='text-danger'>Delete</a> </td>";

                    echo "<td> <a rel='$post_id' href='javascript:void(0)' class='delete_link'> Delete </a> </td>";

                    echo "<td><a href='posts.php?reset={$post_id}' title='if your click it will set the value to 0'> {$post_views_count} </a></td>";

                echo "</tr>";
            }


            ?>

        </tbody>
    </table>
</form>





<?php // Delete a post query

if(isset($_GET['delete'])){
    $the_post_id = $_GET['delete'];
    $escaped_post_id = mysqli_real_escape_string($connection, $the_post_id);
    if(isset($_SESSION['user_role'])){
        if (isset($_SESSION['user_role']) == 'Admin') {
            $query = "DELETE FROM posts WHERE post_id = {$escaped_post_id}";
            $delete_query_result = mysqli_query($connection, $query);
            confirmQuery($delete_query_result);
            header("Location: posts.php");
        }
    }
}


// delete post view count
if(isset($_GET['reset'])){
    $delete_views_count = $_GET['reset'];
    
    $escape_delete_views_count = mysqli_real_escape_string($connection, $delete_views_count);

    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = {$escape_delete_views_count}";
    $delete_views_count_query = mysqli_query($connection, $query);
    confirmQuery($delete_views_count_query);

    header("Location: posts.php");
}


?>



<script>

    $(document).ready(function(){
        
        $(".delete_link").on('click', function(){

            var id = $(this).attr("rel");

            var delete_url = "posts.php?delete="+ id +" ";

            $(".modal_delete_link").attr("href", delete_url);

            $("#myModal").modal('show');

        });

    });


</script>