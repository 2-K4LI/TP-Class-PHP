<?php
class User {
    private $id;
    private $firstName;
    private $name;
    private $birthDate;
    private $email;
    private $username;
    private $password;
    private $createdAt;

    public function __construct($id = null, $name, $email, $firstName, $birthDate = null, $username, $password = null, $createdAt = null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->birthDate = $birthDate;
        $this->username = $username;
        $this->password = $password;
        $this->createdAt = $createdAt ?: date('Y-m-d H:i:s');
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getName() {
        return $this->name;
    }

    public function getBirthDate() {
        return $this->birthDate;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    // Setters
    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    //Methode
    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }
}
?>