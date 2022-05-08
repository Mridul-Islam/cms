<?php

function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}


function confirmQuery($result){
    global $connection;
    if(!$result){
        die("Qeury Failed" . mysqli_error($connection));
    }
}


function redirect($location){
    header("Location: " . $location);
}




// ******************************** Index functions ********************************


//counting total posts,comments,users and categories
function recordCount($table){
    global $connection;
    $query = "SELECT * FROM $table";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    $count = mysqli_num_rows($result);

    return $count;
}


//counting total published posts, draft posts, unapproved comments, subscriber users
function subRecordCount($table, $column, $columnValue){
    global $connection;
    $query = "SELECT * FROM $table WHERE $column = '$columnValue'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    $count = mysqli_num_rows($result);

    return $count;
}




// ******************************** Users functions *********************************

function users_online(){
    if(isset($_GET['onlineusers'])){
        global $connection;
        if(!$connection){
            session_start();
            include("../includes/db.php");

            $session = session_id();
            $time = time();
            $time_out_in_seconds = 5;
            $time_out = $time - $time_out_in_seconds;

            $query = "SELECT * FROM users_online WHERE session = '$session'";
            $send_query = mysqli_query($connection, $query);
            $count = mysqli_num_rows($send_query);

            if($count == NULL){
                mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
            }
            else{
                mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
            }

            $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
            echo $count_user = mysqli_num_rows($users_online_query);
        }
    }
}

users_online();



function is_admin($username){
    global $connection;
    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    
    while($row = mysqli_fetch_array($result)){
        if($row['user_role'] == "Admin"){
            return true;
        }
        else{
            return false;
        }
    }
    

}







// ************************************* categories functions *************************************

function insert_categories(){
	global $connection;
	if(isset($_POST["submit"])){
        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){
            echo "<p class='text-danger'>This field can not be empty</p>";
        }
        else{
            //$query = "INSERT INTO categories(cat_title) ";
            //$query .= "VALUE('{$cat_title}')";
            $statement = mysqli_prepare($connection, "INSERT INTO categories(cat_title) VALUES(?)");
            //$addInto_category_query = mysqli_query($connection, $query);
            confirmQuery($statement);

            mysqli_stmt_bind_param($statement, "s", $cat_title);
            mysqli_stmt_execute($statement);
        }

        mysqli_stmt_close($statement);

    }

}



function showAllCategories(){
	global $connection;
	$query = "SELECT * FROM categories";
    $query_result = mysqli_query($connection, $query);

    if(!$query_result){
        die("Qeury Failed" . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($query_result)){
        $cat_id = $row["cat_id"];
        $cat_title = $row["cat_title"];

        echo "<tr>";
            echo "<td> {$cat_id} </td>";
            echo "<td> {$cat_title} </td>";
            echo "<td> <a href='categories.php?edit={$cat_id}'> Edit </a> </td>";

            //echo "<td> <a onClick=\" javascript: return confirm('Are you sure you want to delete this.') \" href='categories.php?delete={$cat_id}'> Delete </a> </td>";

            echo "<td><a rel='$cat_id' href='javascript:void(0)' class='delete_link'> Delete </a></td>";
        echo "</tr>";

    };
}



function deleteCategory(){
	global $connection;
	if(isset($_GET['delete'])){
        $delete_cat_id = $_GET['delete'];
        $escaped_cat_id = escape($delete_cat_id);

        if(isset($_SESSION['user_role'])){
            if(isset($_SESSION['user_role']) == "Admin"){
                $query = "DELETE FROM categories WHERE cat_id = {$escaped_cat_id} ";
                $delete_query_result = mysqli_query($connection, $query);
                redirect('categories.php');
                //header("Location: categories.php");
            }
        }
    }
}






//******************* Registration functions ****************************

function register_user($username, $user_email, $user_password){
    global $connection;
    
    $escaped_username       = escape($username);
    $escaped_user_email     = escape($user_email);
    $escaped_user_password  = escape($user_password );

    $new_password = password_hash($escaped_user_password, PASSWORD_BCRYPT, array('cost' => 12)); 

    $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
    $query .= "VALUES('{$escaped_username}', '{$escaped_user_email}', '{$new_password}', 'Admin')";
    $user_registration_query = mysqli_query($connection, $query);
    confirmQuery($user_registration_query);
    redirect("index.php");
    
}


function username_exist($username){
    global $connection;
    $query = "SELECT username FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    $count = mysqli_num_rows($result);
    if($count > 0){
        return true;
    }
    else{
        return false;
    }

}


function email_exist($user_email){
    global $connection;
    $query = "SELECT user_email FROM users WHERE user_email = '$user_email' ";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    $count = mysqli_num_rows($result);
    if($count > 0){
        return true;
    }
    else{
        return false;
    }

}












?>