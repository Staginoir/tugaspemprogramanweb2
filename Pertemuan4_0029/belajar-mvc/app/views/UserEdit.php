<?php 
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../controller/UserController.php';

$dbConnection = getDBConnection();
$controller = new UserController($dbConnection);

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$user = $controller->show($id);

if (!$user) {
    echo "User not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $controller->update($id, $name, $email);
    header("Location: http://localhost/pemprog%20web%202/pertemuan%204/belajar-mvc/"); // Redirect back to user list
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit User</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
                <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
