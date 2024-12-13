<?php
namespace App\Models

class User {
    private $id;
    private $firstName;
    private $lastName;
    private $emailAddress;
    private $password;
    private $image;

    public function __construct($_id, $_firstName, $_lastName, $_emailAddress, $_password, $_image) {
        $this->id = $_id;
        $this->firstName = $_firstName;
        $this->lastName = $_lastName;
        $this->emailAddress = $_emailAddress;
        $this->password = $_password;
        $this->image = $_image;
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmailAddress() {
        return $this->emailAddress;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getImage() {
        return $this->image;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setImage($image) {
        $this->image = $image;
    }
}
?>