<?php
require "../includes/header.php";


// To prevent direct entering of url
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {

    header('HTTP/1.0 403 Forbiden', TRUE, 403);

    die(header( 'location: '.APPURL.'' ));
}