<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>


<?php 

    if (!isset($_SERVER["HTTP_REFERR"])){
        header("location: index.php");
        exit;
    }

    $select = $conn->query("SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'");
    $select->execute();
    $allProducts = $select->fetchAll(PDO::FETCH_OBJ);

    $zipname = 'bookstore.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    foreach ($allProducts as $product) {
    $zip->addFile("admin-panel/products-admins/books/" . $product->pro_file);
    }
    $zip->close();

    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename='.$zipname);
    header('Content-Length: ' . filesize($zipname));
    readfile($zipname);

    $select = $conn->query("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'");
    $select->execute();

    header("location: index.php");