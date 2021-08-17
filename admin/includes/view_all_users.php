<table class="table table-bordered table-hover table-striped table-responsive">
	<thead>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>Email</th>
			<th>Role</th>
		</tr>
	</thead>
	<tbody>
		
		<?php // show All user query

		$query = "SELECT * FROM users";
		$select_user_query = mysqli_query($connection, $query);

		confirmQuery($select_user_query);

		while($row = mysqli_fetch_assoc($select_user_query)){
			$user_id = $row['user_id'];
			$username = $row['username'];
			$firstName = $row['user_firstname'];
			$lastName = $row['user_lastname'];
			$user_email = $row['user_email'];
			$user_image = $row['user_image'];
			$user_role = $row['user_role'];

			echo "<tr>";
				echo "<td> {$user_id} </td>";
				echo "<td> {$username} </td>";
				echo "<td> {$firstName} </td>";
				echo "<td> {$lastName} </td>";
				echo "<td> {$user_email} </td>";
				echo "<td> {$user_role} </td>";
				echo "<td><a href='users.php?change_to_admin={$user_id}'> Admin </a></td>";
				echo "<td><a href='users.php?change_to_subscriber={$user_id}'> Subscriber </a></td>";
				echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'> Edit </a></td>";
				echo "<td><a href='users.php?delete={$user_id}'> Delete </a></td>";
			echo "</tr>";
		}



		?>

	</tbody>
</table>



<?php  

// delete user query
if(isset($_GET['delete'])){
	$delete_user_id = $_GET['delete'];

	$query = "DELETE FROM users WHERE user_id = $delete_user_id";
	$delete_user_query = mysqli_query($connection, $query);
	confirmQuery($delete_user_query);
	header("Location: users.php");
}


// change to admin query
if(isset($_GET['change_to_admin'])){
	$the_user_id = $_GET['change_to_admin'];

	$query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$the_user_id}";
	$change_to_admin_query = mysqli_query($connection, $query);
	confirmQuery($change_to_admin_query);
	header("Location: users.php");
}


// change to subscriber query
if(isset($_GET['change_to_subscriber'])){
	$the_user_id = $_GET['change_to_subscriber'];

	$query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = {$the_user_id}";
	$change_to_subscriber_query = mysqli_query($connection, $query);
	confirmQuery($change_to_subscriber_query);
	header("Location: users.php");
}



?>




