<?php 
require_once 'config/database.php';
require_once 'app/controller/UserController.php';

$dbConnection = getDBConnection();
$controller = new UserController($dbConnection);
$controller->index(); // Change this to call the index method to get all users
?>
