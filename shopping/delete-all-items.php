<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

    if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_NAME'])){
        header('HTTP/1.0 403 Forbidden', True, 403);

        die(header('location: '.APPURL.''));
    }

    $delete=$conn->prepare("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'"); 
    
    $delete->execute();

?>

<? require "../includes/footer.php"; ?>