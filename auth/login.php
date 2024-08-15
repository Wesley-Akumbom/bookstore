<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

if (isset($_POST['submit'])) {
    // Retrieve form data
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate input
    if (empty($email) || empty($password)) {
        $error = "One or more fields are empty";
    } else {
        // Prepare and execute query
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        // Fetch the result
        $fetch = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a user was found
        if ($fetch) {
            // Verify the password
            if (password_verify($password, $fetch['mypassword'])) {
                echo "LOGGED IN";
            } else {
                $error = "Password or email is incorrect";
            }
        } else {
            $error = "Password or email is incorrect";
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
                            <input type="email"  class="form-control" name="email">
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