<?php
class User {
    private $id;
    private $firstName;
    private $name;
    private $email;

    public function __construct($id = null, $firstName, $name, $email) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->name = $name;
        $this->email = $email;
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

    public function getEmail() {
        return $this->email;
    }

    // Setters
    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
}
?>