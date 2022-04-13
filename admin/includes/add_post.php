<?php
global $connection;
if(isset($_POST['create_post'])) {
    $post_title         = $_POST['post_title'];
    $post_author        = $_SESSION['username'];
    $post_cat_id        = $_POST['post_category'];
    $post_tags          = $_POST['post_tags'];
    $post_status        = $_POST['post_status'];
    $post_image         = $_FILES['post_image']['name'];
    $post_tmp_image     = $_FILES['post_image']['tmp_name'];
    $post_content       = mysqli_real_escape_string($connection, $_POST['post_content']);
    $post_date          = date('d-m-y');
    $post_comment_count = 0;

    // Form Validation
    if ($post_title == '' || empty($post_title)) {
        $validates[] = 'Post Title field can not be empty';
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
        confirmQuery($create_post_result);
        echo "<p class='bg-success text-center'> The post has been created successfully. <a href='./posts.php'> View Posts </a> </p>";
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" name="post_title" class="form-control">
	</div>
	<div class="form-group">
		<label for="post_category">Post Category</label>
		<select class="form-control" name="post_category">
            <option value="">Choose Option..</option>
			
			<?php

			$query = "SELECT * FROM categories";
			$select_categories_query_result = mysqli_query($connection, $query);
			confirmQuery($select_categories_query_result);
			while ($row = mysqli_fetch_assoc($select_categories_query_result)) {
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
				echo "<option value='{$cat_id}'> {$cat_title} </option>";
			}

			?>

		</select>
	</div>
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select name="post_status" class="form-control">
			<option value="draft">Select option..</option>
			<option value="published">Publish</option>
			<option value="draft">Draft</option>
		</select>
	</div>
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="post_image" class="form-control">
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" name="post_tags" class="form-control">
	</div>
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="body"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">
		<a href="./posts.php" type="button" class="btn btn-primary">Back</a>
	</div>
</form>