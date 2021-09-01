<?php

if(isset($_GET['u_id'])){
	// bring user information from database and show to the edit page query...
	$the_user_id = $_GET['u_id'];

	$query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
	$selected_user_query = mysqli_query($connection, $query);
	confirmQuery($selected_user_query);

	while($row = mysqli_fetch_assoc($selected_user_query)){
		$user_firstname = $row['user_firstname'];
		$user_lastname  = $row['user_lastname'];
		$username       = $row['username'];
		$user_password  = $row['user_password'];
		$user_email     = $row['user_email'];
		$user_role      = $row['user_role'];
	}


	// user update query......
	if(isset($_POST['update_user'])){
		$username     = $_POST['username'];
		$old_password = $_POST['old_password'];
		$password     = $_POST['password'];
		$firstname    = $_POST['firstname'];
		$lastname     = $_POST['lastname'];
		$user_email   = $_POST['email'];
		$user_role    = $_POST['role'];


		if(!empty($old_password) && !empty($password) && !empty($username) && !empty($firstname) && !empty($lastname) && !empty($user_email) && !empty($user_role)){
			$query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
			$get_user_query = mysqli_query($connection, $query_password);
			confirmQuery($get_user_query);

			$row = mysqli_fetch_assoc($get_user_query);
			$db_user_password = $row['user_password'];
			if(password_verify($old_password, $db_user_password)){
				if($db_user_password != $password){
					$hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
				}
				$query = "UPDATE users SET username ='{$username}', user_password='{$hashed_password}', user_firstname='{$firstname}', user_lastname='{$lastname}', user_email='{$user_email}', user_role='{$user_role}' WHERE user_id=$the_user_id ";
	
				$update_user_query = mysqli_query($connection, $query);
				confirmQuery($update_user_query);

				echo "<p class='bg-success text-center'>User Updated Successfully: <a href='./users.php'> View Users </a> </p>";
				echo "<br>";
				
			}
			else{
				echo "<p class='text-center text-danger'> Old password did not match with the original password.. </p>";
			}

		}
		else{
			echo "<p class='text-center text-danger'> Fields can not be empty.. </p>";
		}


		// if(!empty($password)){
		// 	$query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
		// 	$get_user_query = mysqli_query($connection, $query);
		// 	confirmQuery($get_user_query);

		// 	$row = mysqli_fetch_assoc($get_user_query);
		// 	$db_user_password = $row['user_password'];

		// 	if($db_user_password != $password){
		// 		$hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
		// 	}

		// 	$query = "UPDATE users SET username ='{$username}', user_password='{$hashed_password}', user_firstname='{$firstname}', user_lastname='{$lastname}', user_email='{$user_email}', user_role='{$user_role}' WHERE user_id=$the_user_id ";
		
		// 	$update_user_query = mysqli_query($connection, $query);
		// 	confirmQuery($update_user_query);

		// 	echo "<p class='bg-success text-center'>User Updated Successfully: <a href='./users.php'> View Users </a> </p>";
		// 	echo "<br>";

		// }else{
		// 	echo "<p class='text-danger text-center'>Fields can not be empty.</p>";
		// }

	}
}
else{
	header("Location: index.php");
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
		<label for="email">Email</label>
		<input type="email" name="email" id="email" class="form-control" value="<?php echo $user_email;?>">
	</div>
	<div class="form-group">
		<label for="username">User Name</label>
		<input type="text" name="username" id="username" class="form-control" value="<?php echo $username;?>">
	</div>
	<div class="form-group">
		<label for="old_password">Old Password</label>
		<input autocomplete="off" type="password" name="old_password" id="old_password" class="form-control">
	</div>
	<div class="form-group">
		<label for="password">New Password</label>
		<input autocomplete="off" type="password" name="password" id="password" class="form-control">
	</div>
	<!-- <div class="form-group">
		<label>Image</label>
		<input type="file" name="image" class="form-control">
	</div> -->
	
	<div class="form-group">
		<input type="submit" name="update_user" value="Update User" class="btn btn-primary">
		<a href="./users.php" type="button" class="btn btn-primary"> Cancel </a>
	</div>
</form>