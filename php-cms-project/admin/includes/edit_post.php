<?php // Get post query for edit

if(isset($_GET['p_id'])){
    $post_id = $_GET['p_id'];

    $query = "SELECT * FROM posts WHERE post_id={$post_id}";
    $selected_post = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($selected_post)) {
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_content = $row['post_content'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];

    }


    // update query
	if(isset($_POST['update_post'])){
		$post_title = $_POST['title'];
		$post_category_id = $_POST['post_category'];
		$post_author = $_POST['author'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['image']['name'];
		$post_img_temp = $_FILES['image']['tmp_name'];

		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		//$post_comment_count = 2;

		move_uploaded_file($post_img_temp, "../images/$post_image");

		if(empty($post_image)){
			$query = "SELECT * FROM posts WHERE post_id={$post_id}";
			$select_image_query = mysqli_query($connection, $query);

			confirmQuery($select_image_query);

			while($row = mysqli_fetch_assoc($select_image_query)){
				$post_image = $row['post_image'];
			}

		}

		$query = "UPDATE posts SET post_title='{$post_title}', post_category_id='{$post_category_id}', post_author='{$post_author}', post_status='{$post_status}', post_image='{$post_image}', post_tags='{$post_tags}', post_content='{$post_content}', post_date=now() WHERE post_id='{$post_id}' ";
		$edit_post_query_result = mysqli_query($connection, $query);

		confirmQuery($edit_post_query_result);

		echo "<p class='bg-success text-center'>Post Updated Successfully: <a href='../post.php?p_id={$post_id}'> View Post </a> or <a href='posts.php'>View All Post</a> </p>";
		echo "<br>";


	}

?>

        <form action="" method="post" enctype="multipart/form-data">
	
			<div class="form-group">
				<label for="title">Post Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo $post_title; ?>">
			</div>

			<div class="form-group">
				<label for="post_category">Post Category</label>
				<select name="post_category" class="form-control">
					<?php 

					$query = "SELECT * FROM categories";
					$select_categories_result = mysqli_query($connection, $query);

					confirmQuery($select_categories_result);

					while($row = mysqli_fetch_assoc($select_categories_result)){
						$cat_id = $row['cat_id'];
						$cat_title = $row['cat_title'];

						echo "<option value='{$cat_id}'>$cat_title</option>";
					}

					

					?>
				</select>
			</div>

			<div class="form-group">
				<label for="title">Post Author</label>
				<input type="text" name="author" class="form-control" value="<?php echo $post_author ?>" >
			</div>

			<div class="form-group">
				<label for="post_status">Post Status</label>
				<select name="post_status" class="form-control">
					<option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
					<?php

					if($post_status == 'published'){
						echo "<option value='draft'> Draft </option>";
					}
					else{
						echo "<option value='published'> Publish </option>";
					}

					?>
				</select>
			</div>

			<div class="form-group">
				<img src="../images/<?php echo $post_image; ?>" width="200" />
				<input type="file" name="image" class="form-control">
			</div>

			<div class="form-group">
				<label for="post_tags">Post Tags</label>
				<input type="text" name="post_tags" class="form-control" value="<?php echo $post_tags ?>">
			</div>

			<div class="form-group">
				<label for="post_content">Post Content</label>
				<textarea class="form-control" name="post_content" id="body" cols="30" rows="10" ><?php echo $post_content ?>
				</textarea>
			</div>

			<div class="form-group">
				<input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
				<a href="./posts.php" type="button" class="btn btn-primary">Cancel</a>
			</div>

		</form>

<?php
    }


?>









