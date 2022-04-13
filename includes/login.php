<?php include "db.php"; ?>
<?php session_start(); ?>
<?php include "functions.php"; ?>

<?php

global $connection;
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    if($username == '' && $password == ''){
        header("Location: ../index.php");
    }
    else{
        // check the user in database
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $query_result = mysqli_query($connection, $query);
        confirm_query($query_result);
        while($row = mysqli_fetch_assoc($query_result)){
            $db_user_id        = $row['user_id'];
            $db_username       = $row['username'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname  = $row['user_lastname'];
            $db_user_password  = $row['user_password'];
            $db_user_role      = $row['user_role'];
        }

        if($username === $db_username && $password === $db_user_password){
            header("Location: ../admin");

            $_SESSION['username']       = $db_username;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname']  = $db_user_lastname;
            $_SESSION['user_role']      = $db_user_role;

        }
        else{
            header("Location: ../index.php");
        }
    }



}

?>