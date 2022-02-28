<table class="table table-responsive table-hover table-bordered table-striped">

    <?php

    global $connection;
    $query = "SELECT * FROM users ORDER BY user_id DESC ";
    $query_result = mysqli_query($connection, $query);
    confirm_query($query_result);
    $count_user = mysqli_num_rows($query_result);
    if($count_user > 0){

    ?>

    <h2 class="text-center bg-info">All Users</h2>
    <hr>
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>User Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Role</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php
        while($row = mysqli_fetch_assoc($query_result)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_email = $row['user_email'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];

            echo "<tr>";
                echo "<td> {$user_id} </td>";
                echo "<td> {$username} </td>";
                echo "<td> {$user_email} </td>";
                echo "<td> {$user_firstname} </td>";
                echo "<td> {$user_lastname} </td>";
                echo "<td> {$user_role} </td>";

                // Show image using condition
                if($user_image == '' || empty($user_image)){
                    echo "<td><img src='../images/user-logo.png' alt='user_image' width='80px' height='50px'/></td>";
                }
                else{
                    echo "<td><img src='../images/$user_image' alt='user_image' width='80px' height='50px'/></td>";
                }


                echo "<td><a href='#'> Edit </a></td>";
                echo "<td><a href='#'> Delete </a></td>";
            echo "</tr>";

        }
    }
    else{
        echo "<h2 class='mt-50 text-center bg-info text-primary'>No User Available</h2>";
    }


    ?>
    </tbody>
</table>