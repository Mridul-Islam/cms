<?php

function confirm_query($result){
    global $connection;
    if(!$result){
        die("Query Failed " . mysqli_error($connection));
    }
}



//*********************************** Categories Functions ***************************** //
function showAllCategories(){
    global $connection;
    $query = "SELECT * FROM categories";
    $categories = mysqli_query($connection, $query);
    confirm_query($categories);
    while($row = mysqli_fetch_assoc($categories)){
        $cat_id    = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
            echo "<td> $cat_id</td>";
            echo "<td>$cat_title</td>";
            echo "<td><a class='btn btn-primary' href='categories.php?cat_edit_id={$cat_id}'>Edit</a></td>";
            echo "<td><a class='btn btn-danger' href='categories.php?cat_delete_id={$cat_id}'>Delete</a></td>";
        echo "</tr>";
    }
} // End of showAllCategories Function

function insertCategory(){
    if(isset($_POST['create_category'])){
        global $connection;
        $cat_title = $_POST['cat_title'];
        if(empty($cat_title) || $cat_title == ''){
            echo "<ul class='text-danger bg-warning'><li>Field Can not be empty.</li></ul>";
        }
        else{
            $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
            $create_category = mysqli_query($connection, $query);
            confirm_query($create_category);
            header("Location: ./categories.php");
        }
    }
} // End of createCategory Function

function deleteCategory(){
    global $connection;
    if(isset($_GET['cat_delete_id'])){
        $the_cat_id = $_GET['cat_delete_id'];

        $query = "DELETE FROM categories WHERE cat_id = $the_cat_id";
        $delete_category = mysqli_query($connection, $query);
        confirm_query($delete_category);
        header("Location: categories.php");
    }
} // End of deleteCategory function



// ************************************* POSTS Functions ************************************** //

function update_post($the_edit_id, $db_post_image){
    global $connection;
    if(isset($_POST['edit_post'])){
        $post_title         = $_POST['post_title'];
        $post_author        = $_POST['post_author'];
        $post_cat_id        = $_POST['post_category'];
        $post_tags          = $_POST['post_tags'];
        $post_status        = $_POST['post_status'];
        $post_image         = $_FILES['post_image']['name'];
        $post_tmp_image     = $_FILES['post_image']['tmp_name'];
        $post_content       = mysqli_real_escape_string($connection, $_POST['post_content']);
        $post_date          = date('d-m-y');

        if(empty($post_image) || $post_image == ''){
            $post_image = $db_post_image;
        }
        else{
            unlink("../images/$db_post_image");
        }

        move_uploaded_file($post_tmp_image, "../images/$post_image");

        $edit_query = "UPDATE posts SET post_title='{$post_title}', post_author='{$post_author}', post_category_id={$post_cat_id}, post_tags='{$post_tags}', post_status='{$post_status}', post_image='{$post_image}', post_content='{$post_content}', post_date=now() WHERE post_id=$the_edit_id";

        $edit_post_result = mysqli_query($connection, $edit_query);
        confirm_query($edit_post_result);
        //$_SESSION['update_post'] = "The post has been updated";
        header("Location: posts.php?source=edit_post&edit_id=$the_edit_id");
    } // End of edit post code
} // End of update post class


?>