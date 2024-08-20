<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

  $products = $conn->query("SELECT * FROM cart WHERE user_id = '$_SESSION[user_id]'");
  $products->execute();

  $allProducts = $products->fetchAll(PDO::FETCH_OBJ);

?>

    <div class="row d-flex justify-content-center align-items-center h-100 mt-5 mt-5">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                  </div>


                  <table class="table" height="190" >
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Update</th>
                        <th scope="col"><button class="delete-all btn btn-danger text-white">Clear</></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($allProducts as $product) : ?>
                      <tr class="mb-4">
                        <th scope="row"><?php echo $product->id?></th>
                        <td><img width="100" height="100"
                        src="../images/<?php echo $product->pro_image ?>"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                        </td>
                        <td><?php echo $product->pro_name ?></td>
                        <td class="pro_price"><?php echo $product->pro_price ?></td>
                        <td><input id="form1" min="1" name="quantity" value="<?php echo $product->pro_quantity ?>" type="number"
                        class="form-control form-control-sm pro_quantity" /></td>
                        <td class="total_price"><?php echo $product->pro_price * $product->pro_quantity ?></td> 
                        
                        <td><button value="<?php echo $product->id; ?>" class="btn-update btn btn-warning text-white"><i class="fas fa-pen"></i> </button></td>

                        <td><button value="<?php echo $product->id; ?>" class="btn-delete btn btn-danger text-white"><i class="fas fa-trash-alt"></i> </button></td>
                      </tr>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                  <a href="#" class="btn btn-success text-white"><i class="fas fa-arrow-left"></i>  Continue Shopping</a>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5 class="full_price"></h5>
                  </div>

                  <button type="button" class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">Checkout</button>

                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>

    </div>
  
    <?php require "../includes/footer.php"; ?>
  
    <script>
    $(document).ready(function(){
      
      
      $(".pro_quantity").mouseup(function () {
                  
                  var $el = $(this).closest('tr');

        

                  var pro_quantity = parseInt($el.find(".pro_quantity").val(), 10);
                  var pro_price = parseFloat($el.find(".pro_price").text());

                  var total = pro_quantity * pro_price;
                  $el.find(".total_price").html("");        

                  $el.find(".total_price").append('$'+total);


                  //update product by id
                  $(".btn-update").on('click', function(e) {

                      var id = $(this).val();
                    

                      $.ajax({
                        type: "POST",
                        url: "update-item.php",
                        data: {
                          update: "update",
                          id: id,
                          pro_quantity: pro_quantity
                        },

                        success: function() {
                         // alert("done");
                          //reload();
                        }
                      })
                    });
                 
                
           fetch();     
      });

      //delete product by id
          $(".btn-delete").on('click', function(e) {

            var id = $(this).val();


              $.ajax({
                type: "POST",
                url: "delete-item.php",
                data: {
                  delete: "delete",
                  id: id
                },

                success: function() {
                alert("Product successfully deleted");
                  reload();
                }
              })
            });

            //delete all products
            $(".delete-all").on('click', function(e) {

                $.ajax({
                  type: "POST",
                  url: "delete-all-items.php",
                  data: {
                    delete: "delete"
                  },

                  success: function() {
                  alert("All products successfully deleted");
                    reload();
                  }
                })
              });

       fetch();

      function fetch() {

        setInterval(function () {
                  var sum = 0.0;
                  $('.total_price').each(function()
                  {
                    sum += parseFloat($(this).text().replace('$', ''));
                  });
                  $(".full_price").html("$"+sum);
        }, 4000);
      } 
      
      function reload() {

            $("body").load("cart.php")
       
      }
});
</script>