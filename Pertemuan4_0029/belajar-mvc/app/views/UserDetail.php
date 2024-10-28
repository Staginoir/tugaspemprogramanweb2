<?php 
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../controller/UserController.php';

$dbConnection = getDBConnection();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$controller = new UserController($dbConnection);
$user = $controller->show($id); // Retrieve data into $user

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($user): ?>
                    <div class="card shadow-sm">
                        <div class="card-header text-white" style="background-color: #449dd1;">
                            <h3 class="mb-0">User Detail</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>ID:</strong> <?= htmlspecialchars($user['id']) ?></p>
                            <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                            <a href="UserEdit.php?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="UserDelete.php?id=<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">Delete</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning text-center" role="alert">
                        User not found.
                    </div>
                    <div class="text-center">
                        <a href="javascript:history.back()" class="btn btn-secondary mt-3">Back</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
