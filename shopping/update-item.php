<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $pro_quantity = $_POST['pro_quantity'];

        $update = $conn->prepare("UPDATE cart SET pro_quantity = '$pro_quantity' WHERE id='$id'");
        $update->execute();
    }

?>

<?php require "../includes/footer.php"; ?>