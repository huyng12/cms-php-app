<?php 
    session_start();
?>

<?php 
    $_SESSION['username'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['user_role'] = null;
    $_SESSION['user_token'] = null;
    
    header("Location: ../index.php");
?>