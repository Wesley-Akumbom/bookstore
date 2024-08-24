<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 


    if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_NAME'])){
        header('HTTP/1.0 403 Forbidden', True, 403);

        die(header('location: '.APPURL.''));
    }


    if(isset($_POST['delete'])){

        $id = $_POST['id'];

        $delete = $conn->prepare("DELETE FROM wishlist WHERE id='$id'");
        $delete->execute();
    }


    if (!isset($_SESSION['username'])){
        header("location: ".APPURL."");
    }


?>

<?php require "../includes/footer.php"; ?>
