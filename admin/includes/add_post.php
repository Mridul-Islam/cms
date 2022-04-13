<?php

if(isset($_POST['create_post'])){
    global $connection;
	$post_title       = escape($_POST['title']);
	$post_category_id = escape($_POST['post_category']);
	$post_user        = escape($_POST['post_user_id']);
	$post_status      = escape($_POST['post_status']);
 
 	$post_image       = escape($_FILES['image']['name']);
 	$post_img_temp    = escape($_FILES['image']['tmp_name']);

	$post_tags        = escape($_POST['post_tags']);
	$post_content     = escape($_POST['post_content']);
	$post_date        = escape(date('d-m-y'));

	move_uploaded_file($post_img_temp, "../images/$post_image");
//    move_uploaded_file($post_img_temp, )

	$query = "INSERT INTO posts(post_category_id, post_title, post_user, post_status, post_image, post_tags, post_content, post_date) VALUES({$post_category_id}, '{$post_title}', '{$post_user}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now()) ";
	$add_post_query_result = mysqli_query($connection, $query);

	confirmQuery($add_post_query_result);

	// this function will pull the last created id
	$the_post_id = mysqli_insert_id($connection);

	echo "<p class='bg-success text-center'>Post Created Successfully: <a href='../post.php?p_id={$the_post_id}'> View Post </a> or <a href='posts.php'>View All Post</a> </p>";
		echo "<br>";




}



?>



<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" name="title" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_category">Post Category</label>
		<select class="form-control" name="post_category">
			
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
		<label for="users">User</label>
		<select name="post_user_id" class="form-control">
			
			<?php

			$user_query = "SELECT * FROM users";
			$select_all_users = mysqli_query($connection, $user_query);
			confirmQuery($select_all_users);

			while($row = mysqli_fetch_assoc($select_all_users)){
				$post_user_id = $row['user_id'];
				$post_username = $row['username'];

				echo "<option value='{$post_username}'> {$post_username} </option>";
			}



			?>


		</select>
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select name="post_status" class="form-control">
			<option value="draft">Select option</option>
			<option value="published">Publish</option>
			<option value="draft">Draft</option>
		</select>
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
		<textarea class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">
		<a href="./posts.php" type="button" class="btn btn-primary">Cancel</a>
	</div>
</form>