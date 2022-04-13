<?php include("delete_modal.php"); ?>

<table class="table table-bordered table-hover table-striped table-responsive">
	<thead>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>Email</th>
			<th>Role</th>
            <th>Change Status</th>
            <th>Edit</th>
            <th>Delete</th>
		</tr>
	</thead>
	<tbody>
		
		<?php

        global $connection;
        // show All user query
		$query = "SELECT * FROM users";
		$select_user_query = mysqli_query($connection, $query);
		confirmQuery($select_user_query);
		while($row = mysqli_fetch_assoc($select_user_query)){
			$user_id    = $row['user_id'];
			$username   = $row['username'];
			$firstName  = $row['user_firstname'];
			$lastName   = $row['user_lastname'];
			$user_email = $row['user_email'];
			$user_image = $row['user_image'];
			$user_role  = $row['user_role'];
			echo "<tr>";
				echo "<td> {$user_id} </td>";
				echo "<td> {$username} </td>";
				echo "<td> {$firstName} </td>";
				echo "<td> {$lastName} </td>";
				echo "<td> {$user_email} </td>";
				echo "<td> {$user_role} </td>";
				echo "<td>
                        <a href='users.php?change_to_admin={$user_id}'> Admin </a> || 
                        <a href='users.php?change_to_subscriber={$user_id}'> Subscriber </a>
                    </td>";
				//echo "<td><a href='users.php?change_to_subscriber={$user_id}'> Subscriber </a></td>";
				echo "<td><a href='users.php?source=edit_user&u_id={$user_id}' class='btn btn-primary'> Edit </a></td>";
				echo "<td><a rel='$user_id' href='javascript:void(0)' class='delete_link btn btn-danger'> Delete </a></td>";

				//echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete this.') \" href='users.php?delete={$user_id}'> Delete </a></td>";
			
			echo "</tr>";
		}



		?>

	</tbody>
</table>



<?php  

// delete user query
if(isset($_GET['delete'])){
	$delete_user_id = $_GET['delete'];
	$escaped_user_id = mysqli_real_escape_string($connection, $delete_user_id);
	if(isset($_SESSION['user_role'])){
        if(isset($_SESSION['user_role']) == 'Admin'){
		    $query = "DELETE FROM users WHERE user_id = $escaped_user_id";
			$delete_user_query = mysqli_query($connection, $query);
			confirmQuery($delete_user_query);
			header("Location: users.php");
    	}  
	}
}


// change to admin query
if(isset($_GET['change_to_admin'])){
	$the_user_id = escape($_GET['change_to_admin']);

	$query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$the_user_id}";
	$change_to_admin_query = mysqli_query($connection, $query);
	confirmQuery($change_to_admin_query);
	header("Location: users.php");
}


// change to subscriber query
if(isset($_GET['change_to_subscriber'])){
	$the_user_id = escape($_GET['change_to_subscriber']);

	$query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = {$the_user_id}";
	$change_to_subscriber_query = mysqli_query($connection, $query);
	confirmQuery($change_to_subscriber_query);
	header("Location: users.php");
}



?>



<script>

    $(document).ready(function(){
        
        $(".delete_link").on('click', function(){

            var id = $(this).attr("rel");

            var delete_url = "users.php?delete="+ id +" ";

            $(".modal_delete_link").attr("href", delete_url);

            $("#myModal").modal('show');

        });

    });


</script>




