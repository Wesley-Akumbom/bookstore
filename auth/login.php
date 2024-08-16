<?php require '../config/config.php'; ?>
<?php require '../includes/header.php'; ?>

<?php 

if (isset($_POST['submit'])){
    if(empty($_POST['email']) OR empty($_POST['password'])){
        echo "<script>alert('One or more fields are empty');</script>";
    } else {
        $email = $_POST["email"];
        $password = $_POST['password'];
        
        //check if email exists
        $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
        $login->execute();

        $fetch = $login->fetch(PDO::FETCH_ASSOC);

        if($login->rowcount() > 0){
            if(password_verify($password, $fetch['mypassword'])){
                echo "LOGGED IN";
            } else {
                echo "<script>alert('Password or email is wrong');</script>";
            }
        } else {
            echo "<script>alert('Password or email is wrong');</script>";
        }
    } 
}

?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-control mt-5" method="POST" action="login.php">
                    <h4 class="text-center mt-3"> Login </h4>
                   
                    <div class="">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="">
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4 mb-4" name="submit" type="submit">Login</button>

                </form>
            </div>
        </div>
 
   
<?php require "../includes/footer.php"; ?>