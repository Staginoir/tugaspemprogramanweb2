<?php
    class User{
        private $db;
        public function __construct($dbConnection)
        {
            $this-> db =$dbConnection;
        }
        public function getAllUsers() {
            $stmt = $this->db->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getUserById($id) {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function addUser($id, $name, $email) {
            $stmt = $this->db->prepare("INSERT INTO users (id, name, email) VALUES (:id, :name, :email)");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            return $stmt->execute();
        }
    
        
        public function updateUser($id, $name, $email) {
            $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
    
        
        public function deleteUser($id) {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        
        
    }


?>