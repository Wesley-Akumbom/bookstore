<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>

<?php 

  $select = $conn->query("SELECT products.*, categories.name AS category_name 
                          FROM products 
                          LEFT JOIN categories ON products.category_id = categories.id");
  $select->execute();

  $products = $select->fetchAll(PDO::FETCH_OBJ);

?>



          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Products</h5>
              <a  href="<?php echo ADMINURL; ?>/products-admins/create-products.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price in $$</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $products as $product ) : ?>
                  <tr>
                    <th scope="row"><?php echo $product->id ?></th>
                    <td><?php echo $product->name ?></td>
                    <td><?php echo $product->price ?></td>
                    <td><?php echo $product->category_name ?></td>
                    <?php if($product->status == 1)  : ?>
                     <td><a href="<?php echo ADMINURL ?>/products-admins/status.php?id=<?php echo $product->id; ?> & status=<?php echo $product->status; ?>" class="btn btn-danger  text-center ">Unverify</a></td>
                    <?php else : ?>
                      <td><a href="<?php echo ADMINURL ?>/products-admins/status.php?id=<?php echo $product->id; ?> & status=<?php echo $product->status; ?>" class="btn btn-success  text-center ">Verify</a></td>
                    <?php endif ; ?>  

                     <td><a href="<?php echo ADMINURL ?>/products-admins/delete-products.php?id=<?php echo $product->id ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "../layouts/footer.php" ?>