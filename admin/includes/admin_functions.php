<?php

function confirm_query($result){
    global $connection;
    if(!$result){
        die("Query Failed " . mysqli_error($connection));
    }
}


//*********************************** Start of Categories Functions ***************************** //
function showAllCategories(){
    global $connection;
    $query = "SELECT * FROM categories ORDER BY cat_id DESC";
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

//*********************************** End of Categories Functions ***************************** //







// ************************************* Start of POSTS Functions ************************************** //

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


        // Form Validation
        if ($post_title == '' || empty($post_title)) {
            $validates[] = 'Post Title field can not be empty';
        }
        if ($post_author == '' || empty($post_author)) {
            $validates[] = 'Post Author field can not be empty';
        }
        if ($post_cat_id == '' || empty($post_cat_id)) {
            $validates[] = 'Post Category field can not be empty';
        }
        if ($post_tags == '' || empty($post_tags)) {
            $validates[] = 'Post tags field can not be empty';
        }
        if ($post_status == '' || empty($post_status)) {
            $validates[] = 'Post status field can not be empty';
        }
        if ($post_content == '' || empty($post_content)) {
            $validates[] = 'Post content field can not be empty';
        }
        else {
            $validates[] = '';
        }
        // End form validation
        $count_validates = count($validates);
        if ($count_validates > 1) {
            echo "<ul class='bg-warning well'>";
            foreach ($validates as $validate) {
                echo "<li class='text-danger'> $validate </li>";
            }
            echo "</ul>";
        }
        else{
            if(empty($post_image) || $post_image == ''){
                $post_image = $db_post_image;
            }
            else{
                unlink("../images/$db_post_image");
                move_uploaded_file($post_tmp_image, "../images/$post_image");
            }
             // Edit post query
            $edit_query = "UPDATE posts SET post_title='{$post_title}', post_author='{$post_author}', post_category_id={$post_cat_id}, post_tags='{$post_tags}', post_status='{$post_status}', post_image='{$post_image}', post_content='{$post_content}', post_date=now() WHERE post_id=$the_edit_id";

            $edit_post_result = mysqli_query($connection, $edit_query);
            confirm_query($edit_post_result);
            //$_SESSION['update_post'] = "The post has been updated";
            header("Location: posts.php?source=edit_post&edit_id=$the_edit_id");
        }

    } // End of edit post code
} // End of update post class

// ************************************* End of POSTS Functions ************************************** //








// ********************************** Starting of Comments Functions ******************************************//

function delete_comment($comment_post_id){
    global $connection;
    if(isset($_GET['c_delete_id'])){
        $the_comment_id = $_GET['c_delete_id'];

        $delete_query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
        $query_result = mysqli_query($connection, $delete_query);
        confirm_query($query_result);

        $comment_count_query = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE post_id = $comment_post_id";
        $comment_count_query_result = mysqli_query($connection, $comment_count_query);
        confirm_query($comment_count_query_result);

        header("Location:comments.php");
    }
} // End of delete comment function

function comment_approve(){
    global $connection;
    if(isset($_GET['c_approve_id'])){
        $the_comment_id = $_GET['c_approve_id'];
        $approve_query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
        $approve_query_result = mysqli_query($connection, $approve_query);
        confirm_query($approve_query_result);
        header("Location: comments.php");
    }
} // End of comment_approve function

function comment_unapprove(){
    global $connection;
    if(isset($_GET['c_unapprove_id'])){
        $the_comment_id = $_GET['c_unapprove_id'];
        $un_approve_query = "UPDATE comments SET comment_status = 'un-approved' WHERE comment_id = $the_comment_id";
        $un_approve_query_result = mysqli_query($connection, $un_approve_query);
        confirm_query($un_approve_query_result);
        header("Location: comments.php");
    }
}// End of comment un-approve function

function showPostTitle($comment_post_id){
    global $connection;
    $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
    $comment_post = mysqli_query($connection, $query);
    confirm_query($comment_post);
    while($row = mysqli_fetch_assoc($comment_post)){
        $the_post_id        = $row['post_id'];
        $comment_post_title = $row['post_title'];
        echo "<td><a href='../post.php?p_id={$the_post_id}'> {$comment_post_title} </a></td>";
    }
}// End of showPostTitle function

// *************************************** End of Comments Functions ******************************************//








// *************************************** Start of Users Functions *************************************************//

function create_user(){
    global $connection;
    if(isset($_POST['create_user'])){
        $user_firstname   = $_POST['user_firstname'];
        $user_lastname    = $_POST['user_lastname'];
        $username         = $_POST['username'];
        $user_email       = $_POST['user_email'];
        $user_password    = $_POST['user_password'];
        $user_role        = $_POST['user_role'];
        $user_image       = $_FILES['user_image']['name'];
        $user_tmp_image   = $_FILES['user_image']['tmp_name'];
        $user_description = $_POST['user_description'];

        // Validation work for add user
        $username_query = "SELECT * FROM users";
        $username_query_result = mysqli_query($connection, $username_query);
        confirm_query($username_query_result);
        while($row = mysqli_fetch_assoc($username_query_result)){
            $all_db_username = $row['username'];
            if($username == $all_db_username){
                $validates[] = 'This username field has already been taken';
            }
        }
        if($user_firstname == '' || empty($user_firstname)){
            $validates[] = 'Firstname field can not be empty';
        }
        if($user_lastname == '' || empty($user_lastname)){
            $validates[] = 'Lastname field can not be empty';
        }
        if($username == '' || empty($username)){
            $validates[] = 'Username field can not be empty';
        }
        if($user_email == '' || empty($user_email)){
            $validates[] = 'Email field can not be empty';
        }
        if($user_password == '' || empty($user_password)){
            $validates[] = 'Password field can not be empty';
        }
        if($user_role == '' || empty($user_role)){
            $validates[] = 'User Role field can not be empty';
        }
        if($user_image == '' || empty($user_image)){
            $validates[] = 'User image field can not be empty';
        }
        if($user_description == '' || empty($user_description)){
            $validates[] = 'User description field can not be empty';
        }
        else{
            $validates[] = "";
        }

        $validates_count = count($validates);
        if($validates_count > 1){
            echo "<ul class='bg-warning well'>";
            foreach ($validates as $validate){
                echo "<li class='text-danger'> $validate </li>";
            }
            echo "</ul>";
        }
        else{
            // save image to the server
            move_uploaded_file($user_tmp_image, "../images/{$user_image}");

            // create user query
            $query = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_password, user_role, user_image) ";
            $query .= " VALUES ( '{$user_firstname}', '{$user_lastname}', '{$username}', '{$user_email}', '{$user_password}', '{$user_role}', '{$user_image}' ) ";
            $query_result = mysqli_query($connection, $query);
            confirm_query($query_result);
            header("Location: users.php?source=add_user");

        }
        // End of Validation work for add user

    }
}// End of create user function

function delete_user(){
    global $connection;
    if(isset($_GET['d_user_id'])){
        $delete_user_id = $_GET['d_user_id'];
        $delete_user_query = "DELETE FROM users WHERE user_id = $delete_user_id";
        $delete_user_query_result = mysqli_query($connection, $delete_user_query);
        confirm_query($delete_user_query_result);
        header("Location: users.php");
    }
}// End of delete user function

function update_user($the_user_id, $db_user_image){
    global $connection;
    if(isset($_POST['update_user'])){
        $user_firstname   = $_POST['user_firstname'];
        $user_lastname    = $_POST['user_lastname'];
        $username         = $_POST['username'];
        $user_email       = $_POST['user_email'];
        $user_password    = $_POST['user_password'];
        $user_role        = $_POST['user_role'];
        $user_description = $_POST['user_description'];

        $user_image = $_FILES['user_image']['name'];
        $user_tmp_image = $_FILES['user_image']['tmp_name'];

        // Validation work for edit user
        if($user_firstname == '' || empty($user_firstname)){
            $validates[] = 'Firstname field can not be empty';
        }
        if($user_lastname == '' || empty($user_lastname)){
            $validates[] = 'Lastname field can not be empty';
        }
        if($username == '' || empty($username)){
            $validates[] = 'Username field can not be empty';
        }
        if($user_email == '' || empty($user_email)){
            $validates[] = 'Email field can not be empty';
        }
        if($user_password == '' || empty($user_password)){
            $validates[] = 'Password field can not be empty';
        }
        if($user_role == '' || empty($user_role)){
            $validates[] = 'User Role field can not be empty';
        }
        if($user_description == '' || empty($user_description)){
            $validates[] = 'User description field can not be empty';
        }
        else{
            $validates[] = "";
        }

        $validates_count = count($validates);
        if($validates_count > 1){
            echo "<ul class='bg-warning well'>";
            foreach ($validates as $validate){
                echo "<li class='text-danger'> $validate </li>";
            }
            echo "</ul>";
        }
        else{
            // edit image using condition
            if($user_image == '' || empty($user_image)){
                $user_image = $db_user_image ;
            }
            else{
                unlink("../images/$db_user_image");
                move_uploaded_file($user_tmp_image, "../images/{$user_image}");
            }

            // Update user query
            $query = "UPDATE users SET user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', username='{$username}', ";
            $query .= "user_email='{$user_email}', user_password='{$user_password}', user_role='{$user_role}', user_image='{$user_image}', user_description='{$user_description}' ";
            $query .= "WHERE user_id=$the_user_id";
            $query_result = mysqli_query($connection, $query);
            confirm_query($query_result);
            header("Location: users.php?source=edit_user&e_user_id={$the_user_id}");

        }
        // End of Validation work for edit user
    }
}// End of update user class




// *************************************** End of Users Functions *************************************************//



?>