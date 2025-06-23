<?php
class User {
    private $id;
    private $firstName;
    private $name;
    private $birthDate;
    private $email;

    public function __construct($id = null, $firstName, $name, $birthDate, $email) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->name = $name;
        $this->birthDate = $birthDate;
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

    public function getBirthDate() {
        return $this->birthDate;
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

    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
}
?>