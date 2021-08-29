<?php

if(isset($_POST['create_user'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$user_email = $_POST['email'];

	// $user_image = $_FILES['image']['name'];
	// $user_temp_image = $_FILES['image']['tmp_name'];

	$user_role = $_POST['role'];

	//move_uploaded_file($user_temp_image, "../images/$user_image");

	$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

	if(!empty($username) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($user_email)){

		$query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email,  user_role) ";
		$query .= "VALUES ('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$user_email}', '{$user_role}')";
		$create_user_query = mysqli_query($connection, $query);
		confirmQuery($create_user_query);

		echo "<div class='text-center bg-success'>User Created Successfully:" . " " . "<a href='users.php'> View Users</a>" . "<br> </div>";
		echo "<br>";
	}
	else{
		echo "<p class='text-center text-danger'> Fields can not be empty... </p>";
	}


	
}



?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="firstname">FirstName</label>
		<input type="text" name="firstname" id="firstname" class="form-control">
	</div>
	<div class="form-group">
		<label for="lastname">LastName</label>
		<input type="text" name="lastname" id="lastname" class="form-control">
	</div>
	<div class="form-group">
		<label>Select Role</label>
		<select name="role" class="form-control">
			<option value="">Select Options</option>
			<option value="Admin">Admin</option>
			<option value="Subscriber">Subscriber</option>
		</select>	
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" class="form-control">
	</div>
	<div class="form-group">
		<label for="username">User Name</label>
		<input type="text" name="username" id="username" class="form-control">
	</div>
	<div class="form-group">
		<label for="password">New Password</label>
		<input type="password" name="password" id="password" class="form-control">
	</div>
	<!-- <div class="form-group">
		<label>Image</label>
		<input type="file" name="image" class="form-control">
	</div> -->
	<div class="form-group">
		<input type="submit" name="create_user" value="Add User" class="btn btn-primary">
		<a href="./users.php" type="button" class="btn btn-primary"> Cancel </a>
	</div>
</form>