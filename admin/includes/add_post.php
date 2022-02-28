<h2 class="text-center bg-info">Create new Post</h2>
<hr>

<?php

// Add post code
global $connection;
if(isset($_POST['create_post'])) {
    $post_title         = $_POST['post_title'];
    $post_author        = $_POST['post_author'];
    $post_cat_id        = $_POST['post_category'];
    $post_tags          = $_POST['post_tags'];
    $post_status        = $_POST['post_status'];
    $post_image         = $_FILES['post_image']['name'];
    $post_tmp_image     = $_FILES['post_image']['tmp_name'];
    $post_content       = $_POST['post_content'];
    $post_date          = date('d-m-y');
    $post_comment_count = 0;

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
    if ($post_image == '' || empty($post_image)) {
        $validates[] = 'Post image field can not be empty';
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
    else {
        // save image to server
        move_uploaded_file($post_tmp_image, "../images/{$post_image}");

        // create post query
        $query = "INSERT INTO posts(post_title, post_author, post_category_id, post_tags, post_status, post_image, post_content, post_date, post_comment_count) VALUES ( '{$post_title}', '{$post_author}', '{$post_cat_id}', '{$post_tags}', '{$post_status}', '{$post_image}', '{$post_content}', now(), '{$post_comment_count}' ) ";
        $create_post_result = mysqli_query($connection, $query);
        confirm_query($create_post_result);
    }
}


?>

<form action="" method="post" enctype="multipart/form-data">
    <!-- Left col-lg-6 -->
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" name="post_title" id="post_title" class="form-control" />
        </div>
        <div class="form-group">
            <label for="post_author">Post Author</label>
            <input type="text" name="post_author" id="post_author" class="form-control" />
        </div>
        <div class="form-group">
            <label for="post_title">Select Category</label>
            <select name="post_category" class="form-control">
                <option value=""> Choose Option.. </option>
                <?php

                // Bring all categories to show in the options
                global $connection;
                $query = "SELECT * FROM categories";
                $all_categories = mysqli_query($connection, $query);
                confirm_query($all_categories);
                while($row = mysqli_fetch_assoc($all_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<option value='{$cat_id}'> {$cat_title} </option>";
                }

                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" name="post_tags" id="post_tags" class="form-control" />
        </div>
    </div>
    <!-- ./Left col-lg-6 -->

    <!-- Right col-lg-6 -->
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <select name="post_status" class="form-control">
                <option value=""> Choose Option.. </option>
                <option value="published"> publish </option>
                <option value="draft"> draft </option>
            </select>
        </div>
        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="post_image" id="post_image" class="form-control">
        </div>
        <div class="form-group">
            <label>Post Content</label>
            <textarea name="post_content" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="create_post" value="Publish" class="btn btn-primary" />
            <a href="./posts.php" class="btn btn-primary"> Cancel </a>
        </div>
    </div>
    <!-- ./ Right col-lg-6 -->
</form>