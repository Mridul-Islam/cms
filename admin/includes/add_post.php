<?php

if(isset($_POST['create_post'])){
	$post_title = $_POST['title'];
	$post_category_id = $_POST['post_category_id'];
	$post_author = $_POST['author'];
	$post_status = $_POST['post_status'];
 
 	$post_image = $_FILES['image']['name'];
 	$post_img_temp = $_FILES['image']['tmp_name'];

	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_date = date('d-m-y');
	$post_comment_count = 4;

	move_uploaded_file($post_img_temp, "../images/$post_image");

	$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_status, post_image, post_tags, post_content, post_date, post_comment_count) VALUES({$post_category_id}, '{$post_title}', '{$post_author}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now(), '{$post_comment_count}' ) ";
	$add_post_query_result = mysqli_query($connection, $query);

	confirmQuery($add_post_query_result);



}



?>



<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" name="title" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_category">Post Category Id</label>
		<input type="text" name="post_category_id" class="form-control">
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input type="text" name="author" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" name="post_status" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="image" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" name="post_tags" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">
	</div>

</form>