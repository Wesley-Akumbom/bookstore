<?php require "includes/header.php"; ?>
<?php header("refresh:5; url=index.php");?>

<?php
    if (!isset($_SERVER["HTTP_REFERER"])){
            header("location: index.php");
            exit;
        }

?>

        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">Payment Succesful</h1>
                <p class="lead">
                    Your payment has been a success. Check your email for the books.
                    <p>
                        You will be redirected to home page shortly.
                    </p>
                  </p>
                <a href="index.php" class="btn btn-primary">Go Home</a>
            </div>
        </div>
<?php require "includes/footer.php"; ?>
