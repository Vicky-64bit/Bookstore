  <?php require "layouts/header.php"; ?>
  <?php require "../config/config.php"; ?>

  <?php 
   if(!isset($_SESSION['adminname'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
}


  $products = $conn->query("SELECT COUNT(*) as products_num From products");
  $products->execute();
  $allProducts = $products->fetch(PDO::FETCH_OBJ);

  $categories = $conn->query("SELECT COUNT(*) as categories_num From categories");
  $categories->execute();
  $allCategories = $categories->fetch(PDO::FETCH_OBJ);

  $admins = $conn->query("SELECT COUNT(*) as admins_num From admins");
  $admins->execute();
  $allAdmins = $admins->fetch(PDO::FETCH_OBJ);
  
  ?>
    <div class="container-fluid">
            
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of products: <?php echo   $allProducts->products_num ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo   $allCategories->categories_num ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo   $allAdmins->admins_num ?></p>
              
            </div>
          </div>
        </div>
      </div>
  
          
    </div>
  </div>

  <?php require "layouts/footer.php"; ?>
