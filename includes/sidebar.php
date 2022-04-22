
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <!-- <form action="/cms/search.php" method="post"> -->
        <form action="/cms/search" method="post">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>


    <!-- Log In -->
    <div class="well">

        <?php

        if(isset($_SESSION['user_role'])){
            $username = $_SESSION['username'];
            echo "<h4> Logged In as {$username} </h4>";

            echo "<a href='/cms/includes/logout.php' class='btn btn-primary'> Logout </a>";
        }
        else{


        ?>

        <h4>Log In</h4>
        <form action="/cms/includes/login.php" method="post">
            <span class="text-danger"> <?php //echo isset($error['both'])? $error['both']: ''; ?> </span>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Enter username here">
                <span class="text-danger"> <?php //echo isset($error['username'])? $error['username']: ''; ?> </span>
            </div>
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Enter password here">
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">
                        Log In
                    </button>
                </span>
                <span class="text-danger"> <?php //echo isset($error['password'])? $error['password']: ''; ?> </span>
            </div>
        </form>

        <?php

        }


        ?>


        <!-- /.input-group -->
    </div>






    <!-- Blog Categories Well -->
    <div class="well">

        <?php

        $query = "SELECT * FROM categories";
        $query_result = mysqli_query($connection, $query);

        if(!$query_result){
            die("Qeury Failed" . mysqli_error($connection));
        }


        ?>

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php

                    while($row = mysqli_fetch_assoc($query_result)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        // echo "<li><a href='/cms/category.php?category={$cat_id}'> {$cat_title} </a>
                        // </li>";
                        echo "<li><a href='/cms/category/{$cat_id}'> {$cat_title} </a>
                        </li>";
                    }

                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php //include "widget.php"; ?>

</div>