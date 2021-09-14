<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php include("admin/function.php"); ?>

<?php

//if(isset($_POST['submit'])){
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username      = trim($_POST['username']);
    $user_email    = trim($_POST['email']);
    $user_password = trim($_POST['password']);

    $error = [
        'username'=>'',
        'email'=>'',
        'password'=>''
    ];

    if(strlen($username) < 4){
        $error['username'] = 'Username needs to be longer';
    }

    if($username == ''){
        $error['username'] = 'Username can not be empty';
    }

    if(username_exist($username)){
        $error['username'] = "This username already exist, please pick another one";
    }

    if($user_email == ''){
        $error['email'] = 'Email can not be empty';
    }

    if(email_exist($user_email)){
        $error['email'] = "This email is already exist, <a href='index.php'>Please login</a>";
    }

    if($user_password == ''){
        $error['password'] = 'Password field can not be empty';
    }

    foreach ($error as $key => $value) {
        if(empty($value)){
            
            unset($error[$key]);
            
            //login_user($username, $password);
        }
    }

    if(empty($error)){
        register_user($username, $user_email, $user_password);
    }



}



?>


<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1 class="text-center">Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <?php //echo $message; ?>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($username)? $username: ''; ?>" >
                            <span class="text-danger"><?php echo isset($error['username'])? $error['username']: ''; ?></span>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($user_email)? $user_email: ''; ?>">
                            <span class="text-danger"><?php echo isset($error['email'])? $error['email']: ''; ?></span>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            <span class="text-danger"><?php echo isset($error['password'])? $error['password']: ''; ?></span>
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
