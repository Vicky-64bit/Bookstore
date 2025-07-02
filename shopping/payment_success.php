<html>
    <head>
        <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f7fa;
        padding: 30px;
        color: #333;
    }

    .receipt-container {
        max-width: 600px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        text-align: center;
    }

    h2 {
        color: #007bff;
        margin-bottom: 20px;
    }

    .receipt-info {
        text-align: left;
        margin-top: 20px;
    }

    .btn-download {
        display: inline-block;
        margin-top: 25px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .btn-download:hover {
        background-color: #0056b3;
    }

</style>
    </head>


<?php
require "../config/config.php";
require "../vendor/autoload.php";

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: index.php");
    exit;
}
session_start();

// Razorpay credentials
$key_id = 'rzp_test_EWFsY1toWTNwbz';
$key_secret = '8VMxknxj2jAuyCfVdBQnJhLX';

$api = new Api($key_id, $key_secret);

// Get payment ID from URL
if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    try {
        // Fetch the payment from Razorpay
        $payment = $api->payment->fetch($payment_id);

        if ($payment->status === 'captured') {
            // ✅ Payment successful

            // You can now store transaction in DB
            $user_id = $_SESSION['user_id'];
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];
            $amount = $payment->amount;
            $status = $payment->status;

            $stmt = $conn->prepare("INSERT INTO orders (user_id, first_name, last_name, user_name, email, payment_id, amount, status)
VALUES (:user_id, :first_name, :last_name, :user_name, :email, :payment_id, :amount, :status)");

            $stmt->execute([
                ':user_id' => $user_id,
                ':first_name' => $fname,
                ':last_name' => $lname,
                ':user_name' => $username,
                ':email' => $email,
                ':payment_id' => $payment_id,
                ':amount' => ($amount/100),
                ':status' => $status
            ]);

            echo "<h2>✅ Payment Successful & Order Saved!</h2>";
            echo "<p>Customer: $fname $lname</p>";
            echo "<p>Payment ID: $payment_id</p>";
            echo "<p>Amount: ₹" . ($amount / 100) . "</p>";


            // ✅ Show Receipt
               echo "
            <div style='max-width: 600px; margin: 50px auto; font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px #eee;'>
                <h2 style='text-align:center;'>🧾 Payment Receipt</h2>
                <hr>
                <p><strong>Name:</strong> $fname $lname</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Payment ID:</strong> $payment_id</p>
                <p><strong>Amount Paid:</strong> ₹" . number_format(($amount/100), 2) . "</p>
                <p><strong>Status:</strong> $status</p>
                <p><strong>Date:</strong> " . date("d M Y, h:i A") . "</p>
                <hr>
                <p style='text-align:center;'>Thank you for your payment!</p>
            </div>
            ";
            
            echo "You will be redirected to homepage after clicking on link below:>";
            echo "<a href='http://localhost/bookstore/download.php'>Get your books on email</a>";

        } else {
            // ❌ Payment failed
            echo "<h2 style='text-align:center;'>Payment Failed or Not Captured</h2>";
        }
    } catch (Exception $e) {
        echo "<h3 style='color:red;text-align:center;'>Error: " . $e->getMessage() . "</h3>";
    }
} else {
    echo "<h3 style='color:red;text-align:center;'>No Payment ID Provided</h3>";
}
?>
</html>