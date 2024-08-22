<?php 

    session_start();
    session_unset();
    session_destroy();

    header("Location: http://localhost/bookstore/admin-panel/admins/login-admins.php");

?>