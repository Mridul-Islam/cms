<h2 class="text-center bg-info" style="padding-top: 0; margin-top: 0;">Update User</h2>
<hr>

<?php

global $connection;
if(isset($_GET['e_user_id'])){
    $the_user_id = $_GET['e_user_id'];

    // Bring the information about edit user and show them to the form
    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $query_result = mysqli_query($connection, $query);
    confirm_query($query_result);
    while($row = mysqli_fetch_assoc($query_result)){
        $db_username         = $row['username'];
        $db_user_password    = $row['user_password'];
        $db_user_email       = $row['user_email'];
        $db_user_firstname   = $row['user_firstname'];
        $db_user_lastname    = $row['user_lastname'];
        $db_user_image       = $row['user_image'];
        $db_user_role        = $row['user_role'];
        $db_user_description = $row['user_description'];

?>

<?php

// Update User code
update_user($the_user_id, $db_user_image);

?>


        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input value="<?php echo $db_username; ?>" type="text" name="username" id="username" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input value="<?php echo $db_user_firstname; ?>" type="text" name="user_firstname" id="firstname" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name: </label>
                    <input value="<?php echo $db_user_lastname; ?>" type="text" name="user_lastname" id="lastname" class="form-control" />
                </div><hr/>
                <div class="form-group">
                    <label for="image">User Image:</label>
                    <img src="../images/<?php echo $db_user_image ?>" alt="This user have no image.." width="200px" height="120px"/>
                    <input type="file" name="user_image" id="image" class="form-control" />
                </div><hr/>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">User Email:</label>
                    <input value="<?php echo $db_user_email; ?>" type="email" name="user_email" id="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label>User Role:</label>
                    <select name="user_role" class="form-control">
                        <option value="<?php echo $db_user_role?>"><?php echo $db_user_role; ?></option>
                        <?php

                        if($db_user_role == 'Admin'){
                            echo "<option value='Subscriber'> Subscriber </option>";
                        }
                        else{
                            echo "<option value='Admin'> Admin </option>";
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">User Password:</label>
                    <input value="<?php echo $db_user_password; ?>" type="password" name="user_password" id="password" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Description about user:</label>
                    <textarea name="user_description" rows="7" class="form-control" ><?php echo $db_user_description; ?>
                    </textarea>
                </div><hr>
                <div class="form-group">
                    <input type="submit" name="update_user" class="btn btn-primary" value="Update User" />
                    <a href="users.php" class="btn btn-primary"> Cancel </a>
                </div>
            </div>


        </form>

<?php

    }
}

?>


