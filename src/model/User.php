<?php

namespace App\Model;

class User 
{
    private ?int $id;
    private string $username;
    private string $email;
    private string $password;
    private ?string $profile_picture;

    public function __construct(?int $id, string $username, string $email, string $password, ?string $profile_picture) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->profile_picture = $profile_picture;
    }

    public function getId() {
        return $this->id;
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