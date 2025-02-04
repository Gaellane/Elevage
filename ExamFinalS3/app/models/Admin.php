<?php

namespace app\models;

class Admin
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        try {
            $stmt = $this->db->prepare("
                SELECT id, name, password
                FROM Administrator 
                WHERE name = ? AND password = ?
            ");
            
            $stmt->execute([$username, $password]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if($user){
                session_start();
                $_SESSION['id_admin'] = $user['id'];
                $_SESSION['name'] = $user['name'];    
            }
            return [
                'success' => true,
                'message' => 'Login successful',
                'user' => [
                    'id' => $user['id'],
                    'username' => $user['name']
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
?>
