<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form> <!-- Form Search -->
        <!-- /.input-group -->
    </div>

    <!-- Login Form -->
        <?php 
            if(!isset($_SESSION['user_token'])) {
                ?> 
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="Enter Username">
                        </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">Login</button>
                        </span>
                    </div>
                </div>
        <?php } ?> 
        </form> <!-- Form Search -->
        <!-- /.input-group -->

    <!-- FEEDBACK Form -->
    <div class="well">
        <h4>Give Us Your Feedback</h4>
        <form action="includes/send_feedback.php" method="post">
            <div class="form-group">
                <input name="message_author_email" type="email" class="form-control" placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="message_content" id="" cols="30" rows="10" placeholder="Enter Your Feedback" required></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" name="feedback" type="submit">Send</button>
            </div>
        </form> <!-- Form Search -->
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <?php 
            $query = "SELECT * FROM categories";
            $select_categories_sidebar = mysqli_query($connection, $query);
        ?>

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php 
                        while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <?php include "widget.php" ?>
    </div>

</div>