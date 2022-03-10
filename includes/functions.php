<?php

function confirm_query($result){
    global $connection;
    if(!$result){
        die("Query Failed " . mysqli_error($connection));
    }
}




// ********************** Categories functions ************************************//

function showAllCategories(){
    global $connection;
    $query = "SELECT * FROM categories";
    $all_categories = mysqli_query($connection, $query);
    confirm_query($all_categories);

    while($row = mysqli_fetch_assoc($all_categories)){
        $cat_id    = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li><a href='category_posts.php?c_id={$cat_id}'> {$cat_title} </a></li>";
    }

} // End of showAllCategories Function







//************************************* Comments functions ************************** //

function createComment(){
    global $connection;
    if(isset($_POST['create_comment'])){
        $comment_post_id = $_GET['p_id'];
        $comment_author  = $_POST['comment_author'];
        $comment_email   = $_POST['comment_author_email'];
        $comment_content = mysqli_real_escape_string($connection, $_POST['comment_content']);

        if($comment_author == '' || empty($comment_author)){
            $validates[] = 'Comment Author field can not be empty';
        }
        if($comment_email == '' || empty($comment_email)){
            $validates[] = 'Comment email field can not be empty';
        }
        if($comment_content == '' || empty($comment_content)){
            $validates[] = 'Comment content field can not empty';
        }
        else{
            $validates[] = '';
        }
        $count_validates = count($validates);
        if($count_validates > 1){
            echo "<ul class='bg-warning text-danger'>";
                foreach ($validates as $validate){
                    echo "<li>$validate</li>";
                }
            echo "</ul>";
        }
        else{
            $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ({$comment_post_id}, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'un-approve', now())";
            $create_comment_result = mysqli_query($connection, $query);
            confirm_query($create_comment_result);

            $comment_count_query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $comment_post_id";
            $comment_count_query_result = mysqli_query($connection, $comment_count_query);
            confirm_query($comment_count_query_result);
            echo "<p class='text-center bg-success'> The comment has been submitted  and waiting for approval. </p>";
        }

    }
}// End of createComment function







?>