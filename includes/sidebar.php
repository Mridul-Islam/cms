<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="search_submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>
    <!-- ./ Blog Search -->

    <!-- Log in Form -->
    <div class="well">
        <h4>LogIn</h4>
        <form action="./includes/login.php" method="post">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Enter Username" >
            </div>
            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Enter password here">
                <span class="input-group-btn">
                <button name="login" class="btn btn-primary" type="submit">
                    Submit
                </button>
            </span>
            </div>
        </form>
    </div>
    <!-- ./ Log in Form -->


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-10">
                <ul class="list-unstyled">
                    <?php

                        showAllCategories();

                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
<!--    <div class="well">-->
<!--        <h4>Side Widget Well</h4>-->
<!--        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>-->
<!--    </div>-->

</div>