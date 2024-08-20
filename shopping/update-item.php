<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

    if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_NAME'])){
        header('HTTP/1.0 403 Forbidden', True, 403);

        die(header('location: '.APPURL.''));
    }

    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $pro_quantity = $_POST['pro_quantity'];

        $update = $conn->prepare("UPDATE cart SET pro_quantity = '$pro_quantity' WHERE id='$id'");
        $update->execute();
    }

?>

<?php require "../includes/footer.php"; ?>