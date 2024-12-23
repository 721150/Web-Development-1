<?php
namespace App\Models;

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
        return 'data:image/jpeg;base64,' . base64_encode($this->image);
    }

    public function getImageString() {
        return $this->image;
    }

    public function getFullName() {
        return $this->firstName . " " . $this->lastName;
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
        if (is_array($image) && isset($image['tmp_name']) && !empty($image['tmp_name'])) {
            $imageData = file_get_contents($image['tmp_name']);
            $this->image = $imageData;
        }
    }
}
?>