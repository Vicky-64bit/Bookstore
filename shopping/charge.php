<?php
require "../config/config.php";
require "../vendor/autoload.php"; // Composer autoload for Razorpay SDK
session_start();

use Razorpay\Api\Api;

// To prevent direct entering of url
// if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {

//     header('HTTP/1.0 403 Forbiden', TRUE, 403);

//     die(header( 'location: '.APPURL.'' ));
// }

// if(!isset($_SESSION['username'])){
//     header("location: ".APPURL."");
// }

if (isset($_POST['submit'])) {
    // Razorpay credentials (replace with your own)
    $key_id = 'rzp_test_EWFsY1toWTNwbz';
    $key_secret = '8VMxknxj2jAuyCfVdBQnJhLX';

    $api = new Api($key_id, $key_secret);

    // Get total price from session (in rupees)
    $price = $_SESSION['price'];  // e.g. 250
    $amount_in_paise = (float)$price * 100; // Razorpay expects paise (e.g. 25000)

    // Create order in Razorpay
    $order = $api->order->create([
        'receipt' => 'order_rcptid_' . uniqid(),
        'amount' => $amount_in_paise,
        'currency' => 'INR'
    ]);

    // Store order ID and amount in session
    $_SESSION['order_id'] = $order['id'];
    $_SESSION['amount'] = $amount_in_paise;

    // (Optional) Store user form data
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];

    // Redirect to payment page
    header("Location: payment_page.php");
    exit;
} else {
    echo "Form not submitted.";
}
?>
