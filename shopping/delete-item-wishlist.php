<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

// To prevent direct entering of url
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {

    header('HTTP/1.0 403 Forbiden', TRUE, 403);

    die(header( 'location: '.APPURL.'' ));
}

if(!isset($_SESSION['username'])){
    header("location: ".APPURL."");
}

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    
    $delete = $conn-> prepare("DELETE FROM  wishlist WHERE id='$id'");
    $delete->execute();
}

?>







<?php require "../includes/footer.php"; ?>
