<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new User($dbConnection);
    }

    public function index() {
        $users = $this->userModel->getAllUsers(); 
        require_once __DIR__ . '/../views/UserView.php'; 
    }

    public function show($id) {
        $user = $this->userModel->getUserById($id);
        // require_once __DIR__ . '/../views/UserDetail.php';
        return $user;
        
    }
    public function create($id, $name, $email) {
        return $this->userModel->addUser($id, $name, $email);
        require_once __DIR__ . '/../views/UserAdd.php';
        header("Location: http://localhost/pemprog%20web%202/pertemuan%204/belajar-mvc/");
        exit;
    }

    
    public function update($id, $name, $email) {
        return $this->userModel->updateUser($id, $name, $email);
        require_once __DIR__ . '/../views/UserEdit.php';
        header("Location: http://localhost/pemprog%20web%202/pertemuan%204/belajar-mvc/");
        exit;
    }

    
    public function delete($id) {
        return $this->userModel->deleteUser($id);
        require_once __DIR__ . '/../views/UserDelete.php';
        header("Location: http://localhost/pemprog%20web%202/pertemuan%204/belajar-mvc/");
        exit;
    }
}
?>
