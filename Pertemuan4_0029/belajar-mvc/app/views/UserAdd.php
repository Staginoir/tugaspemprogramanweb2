<?php 
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../controller/UserController.php';

$dbConnection = getDBConnection();
$controller = new UserController($dbConnection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $controller->create($id, $name, $email);
    header("Location: http://localhost/pemprog%20web%202/pertemuan%204/belajar-mvc/");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add New User</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id">id</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="javascript:history.back()" class="btn btn-secondary ">Back</a>
        </form>
    </div>
</body>
</html>
