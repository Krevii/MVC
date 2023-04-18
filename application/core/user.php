<?php
class User {
    private $id;
    private $username;
    private $role;
    private $email;
    private $password;
    //private $permissions;

    public function __construct($userData) {
        $this->id = $userData["id"];
        $this->username = $userData["user_name"];
        $this->role = $userData["role"];
        $this->email = $userData["email"];
        $this->password = $userData["password"];
        //$this->permissions = $userData['permissions'];
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getRole() {
        return $this->role;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPermissions($permissions) {
        //$this->permissions = $permissions;
    }

    public function hasPermission($permission) {
        //return in_array($permission, $this->permissions);
    }
}
