<?php include("db.php"); ?>
<?php session_start(); ?>

<?php

if(isset($_POST['login'])){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

    // $error = [
    //     'both'=>'',
    //     'username'=>'',
    //     'password'=>''
    // ];

    // if($username == ''){
    //     $error['username'] = 'Username can not be empty';
    // }

    // if($password == ''){
    //     $error['password'] = 'Password can not be empty';
    // }  

	$escaped_username = mysqli_real_escape_string($connection, $username);
    $escaped_password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username='{$escaped_username}' ";
    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query){
        die("Qeury Failed" . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_user_query)){
        $db_user_id        = $row['user_id'];
        $db_username       = $row['username'];
        $db_user_password  = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname  = $row['user_lastname'];
        $db_user_role      = $row['user_role'];
    }

    if(password_verify($escaped_password, $db_user_password)){
        $_SESSION['username']  = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname']  = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;

        header("Location: ../admin");
    }
    else{
        header("Location: ../index.php");

        //$error['both'] = "Username and Password didn't match";
    }


}



?>