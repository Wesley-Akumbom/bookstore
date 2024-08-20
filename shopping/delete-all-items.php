<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

    $delete=$conn->prepare("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'"); 
    
    $delete->execute();

?>

<? require "../includes/footer.php"; ?>