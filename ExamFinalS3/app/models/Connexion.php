<?php

namespace app\models;

class Connexion {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Register a new user
     * @param string $username
     * @param string $name
     * @param string $password
     * @param string $phone_number
     * @return array
     */
    public function signup() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
    
        if (!$username || !$password  || !$name) {
            return ['success' => false, 'message' => 'All fields are required'];
        }
        try {
            $stmt = $this->db->prepare("SELECT id FROM Client WHERE username = ?");
            $stmt->execute([$username]);
            
            if ($stmt->rowCount() > 0) {
                return ['success' => false, 'message' => 'Username already exists'];
            }
            
            $stmt = $this->db->prepare("INSERT INTO Client (username, name, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $name, $password]);
    
            return [
                'success' => true,
                'message' => 'User registered successfully',
                // 'userId' => $this->db->lastInsertId()
            ];
    
        } catch (\PDOException $e) {
            return ['success' => false, 'message' => 'Registration failed: ' . $e->getMessage()];
        }
    }

    /**
     * Login user
     * @param string $username
     * @param string $password
     * @return array
     */
    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        try {
            $stmt = $this->db->prepare("
                SELECT id, username, name, password
                FROM Client 
                WHERE username = ? AND password = ?
            ");
            
            $stmt->execute([$username, $password]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if($user){
                session_start();
                $_SESSION['id_client'] = $user['id'];
                $_SESSION['name'] = $user['name'];    
            }
            return [
                'success' => true,
                'message' => 'Login successful',
                'user' => [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'username' => $user['username']
                ]
            ];
    
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Login failed: ' . $e->getMessage()
            ];
        }
    }
}