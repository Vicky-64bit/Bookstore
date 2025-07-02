<?php 
// define("APPURL", "http://localhost/bookstore");

// To prevent direct entering of url
// if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {

//     header('HTTP/1.0 403 Forbiden', TRUE, 403);

//     die(header( 'location: '.APPURL.'' ));
// }

// if(!isset($_SESSION['username'])){
//     header("location: ".APPURL."");
// }

session_start();



// Get order details from session
$order_id = $_SESSION['order_id'];
$amount = $_SESSION['amount']; // in paise
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

// Razorpay test key
$key_id = 'rzp_test_EWFsY1toWTNwbz';  // Replace with your Razorpay test key ID
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pay with Razorpay</title>
</head>
<body>

  <h2 style="text-align:center;">Proceed to Pay ₹<?= $amount / 100 ?></h2>

  <script src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?= $key_id ?>"
    data-amount="<?= $amount ?>"
    data-currency="INR"
    data-order_id="<?= $order_id ?>"
    data-buttontext="Pay with Razorpay"
    data-name="Bookstore"
    data-description="Payment for your order"
    data-image="https://yourdomain.com/logo.png"
    data-prefill.name="<?= htmlspecialchars($fname . ' ' . $lname) ?>"
    data-prefill.email="<?= htmlspecialchars($email) ?>"
    data-prefill.contact=""
    data-theme.color="#0d6efd">
  </script>

  <script>
    var options = {
        "key": "<?= $key_id ?>",
        "amount": "<?= $amount ?>",
        "currency": "INR",
        "name": "Bookstore",
        "description": "Payment for your order",
        "order_id": "<?= $order_id ?>",
        "handler": function (response){
            window.location.href = "payment_success.php?payment_id=" + response.razorpay_payment_id;
        },
        "prefill": {
            "name": "<?= htmlspecialchars($fname . ' ' . $lname) ?>",
            "email": "<?= htmlspecialchars($email) ?>"
        },
        "theme": {
            "color": "#0d6efd"
        }
    };
    var rzp = new Razorpay(options);
    rzp.open();
</script>


  <p style="text-align:center;">Please wait after clicking the button. You'll be redirected after payment.</p>

<?php echo "ORDER ID ". $order_id; ?>


  <!-- <script>
  var options = {
    "handler": function (response){
      // Handle success (send to success.php or show success message)
      window.location.href = "payment_success.php?payment_id=" + response.razorpay_payment_id;
    }
  };
</script> -->
</body>


</html>
