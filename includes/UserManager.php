<?php
require_once 'User.php';
require_once 'database.php';

class UserManager {
    private $db;

    public function __construct() {
        $database = Database::getInstance();
        $this->db = $database->getConnection();
    }

    public function create(User $user) {
        $stmt = $this->db->prepare("INSERT INTO users (firstName, name, birthDate, email, username, password) VALUES (:firstName, :name, :birthDate, :email, :username, :password)");
        $stmt->bindValue(':firstName', $user->getFirstName());
        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':birthDate', $user->getBirthDate());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function read($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new User(
                $data['id'],  
                $data['name'], 
                $data['email'], 
                $data['firstName'],
                $data['birthDate'], 
                $data['username'],  
                null, 
                $data['created_at']);
        }

        return null;
    }

    public function readAll() {
        $stmt = $this->db->query("SELECT * FROM users");
        $users = [];

        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User(
                $data['id'], 
                $data['name'], 
                $data['email'],
                $data['firstName'], 
                $data['birthDate'], 
                $data['username'], 
                null,
                $data['created_at']
            );
        }

        return $users;
    }

    public function update(User $user) {
        $stmt = $this->db->prepare("UPDATE users SET firstName = :firstName, name = :name, birthDate = :birthDate, email = :email WHERE id = :id");
        $stmt->bindValue(':firstName', $user->getFirstName());
        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':birthDate', $user->getBirthDate());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':id', $user->getId());
        $stmt->bindValue(':name', $user->getUsername());

        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}
?>