<?php require "../includes/header.php" ?>
<?php require "../config/config.php" ?>

<?php 

  if (!isset($_SESSION['username'])){
    header("location: ".APPURL."");
  }

  if (isset($_GET['id'])){
    $id = $_GET['id'];

    if($id != $_SESSION['user_id']){
        header("location: ".APPURL."");
    } 
  }

  $select = $conn->query("SELECT * FROM orders WHERE user_id='$_SESSION[user_id]'");
  $select->execute();

  $orders = $select->fetchAll(PDO::FETCH_OBJ);

?>

    <div class="row mt-5">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
             <!-- <a  href="<?php //echo APPURL; ?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a> -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($orders as $order): ?>
                  <tr>
                    <th scope="row"><?php echo $order->id ?></th>
                    <td><?php echo $order->username ?></td>
                    <td><?php echo $order->email ?></td>
                    <td><?php echo $order->fname ?></td>
                    <td><?php echo $order->lname ?></td>
                    <td><?php echo "Delivered" ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "../includes/footer.php" ?>