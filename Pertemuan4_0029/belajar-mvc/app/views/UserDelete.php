<?php 
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../controller/UserController.php';

$dbConnection = getDBConnection();
$controller = new UserController($dbConnection);

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id) {
    $controller->delete($id);
}

header("Location: http://localhost/pemprog%20web%202/pertemuan%204/belajar-mvc/"); // Redirect back to user list
exit;
?>
