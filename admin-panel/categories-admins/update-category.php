<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>

<?php 

   if(isset($_GET['id'])){
        $id = $_GET['id'];

        $select = $conn->query("SELECT * FROM categories WHERE id='$id'");
        $select->execute();

        $categories = $select->fetch(PDO::FETCH_OBJ);
   } else {


   }

?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="" enctype="multipart/form-data">
               <!-- Name input -->
               <div class="form-outline mb-4 mt-4">
                <label for="exampleFormControlTextarea1">Name</label>
                  <input type="text" name="name" value="<?php echo $categories->name ?>" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

                <!-- Description input -->
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                    <?php echo $categories->description ?>
                    </textarea>
                </div>

                <!-- Image input -->
                <div class="form-outline mb-4 mt-4">
                    <label>Image</label> <br>
                    <img src="images/<?php echo $categories->image ?>" alt="image" width=200 height=200 />
                    <br>
                    <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
                </div>
          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>

<?php require "../layouts/footer.php" ?>