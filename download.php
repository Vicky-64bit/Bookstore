<?php
require "includes/header.php";
require "config/config.php";
//session_start();

// Optional: Block direct access if needed
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: index.php");
    exit;
}

// Fetch all products from cart
$select = $conn->query("SELECT * FROM cart WHERE user_id='{$_SESSION['user_id']}'");
$select->execute();
$allProducts = $select->fetchAll(PDO::FETCH_OBJ);

// Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Create PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'vickyswami9460@gmail.com';
    $mail->Password   = 'rodg drhr ifxi gzpl'; // Make sure no space
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Sender and recipient
    $mail->setFrom('vickyswami9460@gmail.com', 'Bookstore');
    $mail->addAddress($_SESSION['email'], 'USER');

    // Attach each book in cart
    $path = __DIR__ . '/admin-panel/products-admins/books/';
    $attachedCount = 0;
    foreach ($allProducts as $product) {
        $file = $path . $product->pro_file;
        if (file_exists($file)) {
            $mail->addAttachment($file);
            $attachedCount++;
        } else {
            echo "❌ Missing file: $file<br>";
        }
    }

    if ($attachedCount === 0) {
        die("❌ No files were attached. Aborting email.");
    }

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'The books you bought';
    $mail->Body    = 'Here are your books. You paid ₹' . $_SESSION['price'] . '.<br><b>Thanks for buying from Bookstore!</b>';

    // Send email
    $mail->send();
    echo "✅ Email sent successfully with $attachedCount attachment(s).<br>";

    // Delete cart only after successful email
    $delete = $conn->query("DELETE FROM cart WHERE user_id='{$_SESSION['user_id']}'");
    $delete->execute();

    // Optional redirect (only after email + cart delete)
    header("Location: index.php");
    exit;

} catch (Exception $e) {
    echo "❌ Email could not be sent. Error: {$mail->ErrorInfo}";
}
?>
