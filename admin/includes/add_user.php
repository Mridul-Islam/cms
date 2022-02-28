<h2 class="text-center bg-info">Create new User</h2>
<hr>

<?php

// Create User code
create_user();


?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" name="user_firstname" id="firstname" class="form-control" />
    </div>
    <div class="form-group">
        <label for="lastname">Last Name: </label>
        <input type="text" name="user_lastname" id="lastname" class="form-control" />
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="form-control" />
    </div>
    <div class="form-group">
        <label for="email">User Email:</label>
        <input type="email" name="user_email" id="email" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">User Password:</label>
        <input type="password" name="user_password" id="password" class="form-control" />
    </div>
    <div class="form-group">
        <label>User Role:</label>
        <select name="user_role" class="form-control">
            <option value="">Choose Role..</option>
            <option value="admin"> Admin </option>
            <option value="subscriber"> Subscriber </option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">User Image:</label>
        <input type="file" name="user_image" id="image" class="form-control" />
    </div>
    <hr/>
    <div class="form-group">
        <input type="submit" name="create_user" class="btn btn-primary" value="Create User" />
        <a href="users.php" class="btn btn-primary"> Cancel </a>
    </div>
</form>
