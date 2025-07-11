  <?php require "../layouts/header.php"; ?>
  <?php require "../../config/config.php"; ?>

  <?php
if(isset($_SESSION['adminname'])){
    header("location: ".ADMINURL."");
}


 if(isset($_POST['submit'])) {
   if(empty($_POST['email']) || empty($_POST['password'])){
        echo "<script>alert('One or more inputs are empty');</script>";
    }else{
        $email = $_POST['email'];
        $password = $_POST['password'];

        $login = $conn->query("SELECT * FROM admins WHERE email='$email'");
        $login->execute();

        $fetch = $login->fetch(PDO::FETCH_ASSOC);

        if($login->rowCount()>0){
            if(password_verify($password, $fetch['mypassword'])){
                $_SESSION['adminname'] = $fetch['adminname'];
                $_SESSION['admin_id'] = $fetch['id'];

                header("location: ".ADMINURL.""); 

              
            }else{
                 echo "<script>alert('Password or Email are wrong');</script>";
            }
        } else{
            echo "<script>alert('Password or Email are wrong');</script>";
        }

    }
 }


?>
<div class="container-fluid"> 
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
    </div>
</div>

  <?php require "../layouts/footer.php"; ?>