<table class="table table-bordered table-hover table-striped table-responsive">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>Comment</th>
			<th>Email</th>
			<th>Status</th>
			<th>In Response to</th>
			<th>Date</th>
			<th>Approve</th>
			<th>Unapprove</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		
		<?php

		$query = "SELECT * FROM comments";
		$comments_query_result = mysqli_query($connection, $query);

		confirmQuery($comments_query_result);

		while($row = mysqli_fetch_assoc($comments_query_result)){
			$comment_id = $row['comment_id'];
			$comment_post_id = $row['comment_post_id'];
			$comment_author = $row['comment_author'];
			$comment_email = $row['comment_email'];
			$commnet_content = $row['comment_content'];
			$comment_status = $row['comment_status'];
			$comment_date = $row['comment_date'];


			echo "<tr>";

				echo "<td> {$comment_id} </td>";
				echo "<td> {$comment_author} </td>";
				echo "<td> {$commnet_content} </td>";
				echo "<td> {$comment_email} </td>";





				// comment approve query
				if(isset($_GET['approve'])){
					$comment_approve_id = $_GET['approve'];

					$query = "UPDATE comments SET comment_status='approved' WHERE comment_id=$comment_approve_id";
					$comment_approve_query = mysqli_query($connection, $query);
					confirmQuery($comment_approve_query);
					header("Location: comments.php");
				}

				//commment upapprove query
				if(isset($_GET['unapprove'])){
					$comment_unapprove_id = $_GET['unapprove'];

					$query = "UPDATE comments SET comment_status='unapproved' WHERE comment_id=$comment_unapprove_id";
					$comment_unapprove_query = mysqli_query($connection, $query);
					confirmQuery($comment_unapprove_query);
					header("Location: comments.php");
				}

				echo "<td> {$comment_status} </td>";






				// Bring the post title from the post table using post_comment_id of comment table..
				$query = "SELECT * FROM posts WHERE post_id={$comment_post_id}";
				$select_post_id_query = mysqli_query($connection, $query);
				confirmQuery($select_post_id_query);
				while ($row = mysqli_fetch_assoc($select_post_id_query)) {
					$post_id = $row['post_id'];
					$post_title = $row['post_title'];
				}

				echo "<td><a href='../post.php?p_id={$post_id}'> {$post_title} </a></td>";
				




				echo "<td> {$comment_date} </td>";
				echo "<td><a href='comments.php?approve={$comment_id}'> Approve </a></td>";
				echo "<td><a href='comments.php?unapprove={$comment_id}'> Unapprove </a></td>";




				// Delete comment function
				if(isset($_GET['delete'])){
					$delete_comment_id = $_GET['delete'];
					$query = "DELETE FROM comments WHERE comment_id={$delete_comment_id}";
					$delete_comment_query = mysqli_query($connection, $query);
					confirmQuery($delete_comment_query);
					header("Location: comments.php");
				}
				
				echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete this.') \" href='comments.php?delete={$comment_id}'> Delete </a></td>";




			echo "</tr>";

		}


		?>

	</tbody>
</table>