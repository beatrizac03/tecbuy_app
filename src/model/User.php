<?php

namespace App\Model;

class User 
{
    private ?int $id;
    private string $name;
    private string $username;
    private string $email;
    private string $password;
    private ?string $profile_picture;

    public function __construct(?int $id, string $name, string $username, string $email, string $password, ?string $profile_picture) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->profile_picture = $profile_picture;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
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

    public function getProfilePicture() {
        return $this->profile_picture;
    }
}