<?php

function confirm_query($result){
    global $connection;
    if(!$result){
        die("Query Failed " . mysqli_error($connection));
    }
}


// Categories functions

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




// Posts functions







?>