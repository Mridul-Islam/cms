<?php

if(isset($_GET['u_id'])){
	// bring user information from database and show to the edit page query...
	$the_user_id = $_GET['u_id'];

	$query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
	$selected_user_query = mysqli_query($connection, $query);
	confirmQuery($selected_user_query);

	while($row = mysqli_fetch_assoc($selected_user_query)){
		$user_firstname = $row['user_firstname'];
		$user_lastname = $row['user_lastname'];
		$username = $row['username'];
		$user_password = $row['user_password'];
		$user_email = $row['user_email'];
		$user_role = $row['user_role'];
	}


	// user update query......
	if(isset($_POST['update_user'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$user_email = $_POST['email'];

		// $user_image = $_FILES['image']['name'];
		// $user_temp_image = $_FILES['image']['tmp_name'];

		$user_role = $_POST['role'];

		//move_uploaded_file($user_temp_image, "../images/$user_image");


		$query = "SELECT randSalt FROM users";
		$select_randSalt_query = mysqli_query($connection, $query);
		confirmQuery($select_randSalt_query);

		$row = mysqli_fetch_assoc($select_randSalt_query);
		$salt = $row['randSalt'];

		$crypted_password = crypt($password, $salt);


		$query = "UPDATE users SET username ='{$username}', user_password='{$crypted_password}', user_firstname='{$firstname}', user_lastname='{$lastname}', user_email='{$user_email}', user_role='{$user_role}' WHERE user_id=$the_user_id ";
		
		$update_user_query = mysqli_query($connection, $query);
		confirmQuery($update_user_query);


		echo "<p class='bg-success text-center'>User Updated Successfully: <a href='./users.php'> View Users </a> </p>";
		echo "<br>";

	}

}


?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="firstname">FirstName</label>
		<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $user_firstname;?>">
	</div>
	<div class="form-group">
		<label for="lastname">LastName</label>
		<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $user_lastname;?>">
	</div>
	<div class="form-group">
		<label for="username">User Name</label>
		<input type="text" name="username" id="username" class="form-control" value="<?php echo $username;?>">
	</div>
	<div class="form-group">
		<label for="password">New Password</label>
		<input type="password" name="password" id="password" class="form-control" value="<?php echo $user_password;?>">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" class="form-control" value="<?php echo $user_email;?>">
	</div>
	<!-- <div class="form-group">
		<label>Image</label>
		<input type="file" name="image" class="form-control">
	</div> -->
	<div class="form-group">
		<label>Select Role</label>
		<select name="role" class="form-control">
			<option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>
			
			<?php

			if($user_role == 'Admin'){
				echo "<option value='Subscriber'> Subscriber </option>";
			}else{
				echo "<option value='Admin'> Admin </option>";
			}

			?>
		</select>	
	</div>
	<div class="form-group">
		<input type="submit" name="update_user" value="Update User" class="btn btn-primary">
		<a href="./users.php" type="button" class="btn btn-primary"> Cancel </a>
	</div>
</form>