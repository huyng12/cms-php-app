<?php 
    require "../vendor/autoload.php";
    include "./includes/admin_header.php"
?>

<?php 
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connection, $query);
        confirmQuery($select_user_profile_query);

        while($row = mysqli_fetch_array($select_user_profile_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }

    }
?>

<?php 
    if(isset($_POST['edit_user'])) {
        $user_firstname = santizeData($_POST['user_firstname']);
        $user_lastname = santizeData($_POST['user_lastname']);
        $user_role = santizeData($_POST['user_role']);
        
        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];

        $username = santizeData($_POST['username']);
        $user_email = trim(preg_replace('/[^A-Za-z0-9@.\-]/', '', $_POST['user_email']));
        $user_password = santizeData($_POST['user_password']);

        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE username = '{$_SESSION['username']}'";

        $edit_user_query = mysqli_query($connection, $query);
        confirmQuery($edit_user_query);

        // update session
        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $ser_lastname;
        $_SESSION['user_role'] = $user_role;
    }

?>

<div id="wrapper">
    <!-- Navigation -->
    <?php 
        include "includes/admin_nav.php"
    ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Admin
                    <small><?php echo $username ?></small>
                </h1>
                
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Firstname</label>
                    <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
                </div>
                <div class="form-group">
                    <label for="title">Lastname</label>
                    <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
                </div>
                <div class="form-group">
                    <select name="user_role" id="">
                        <option value="subscriber"><?php echo $user_role; ?></option>
                        <?php 
                            if($user_role == 'admin') {
                                echo "<option value='subscriber'>subscriber</option>";
                            } else {
                                echo "<option value='admin'>admin</option>";
                            }
                        ?>
                    </select>
                </div>

                <!-- <div class="form-group">
                    <label for="post_image">Post Image</label>
                    <input type="file" name="image">
                </div> -->
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="user_email" value="<?php echo $user_email ?>">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                </div>
            </form>
            </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php 
    include "includes/admin_footer.php";
?>