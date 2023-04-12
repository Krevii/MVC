<?php
class User {
    private $id;
    private $username;
    private $role;
    //private $permissions;

    public function __construct($userData) {
        $this->id = $userData['id'];
        $this->username = $userData['username'];
        $this->role = $userData['role'];
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

    public function setPermissions($permissions) {
        //$this->permissions = $permissions;
    }

    public function hasPermission($permission) {
        //return in_array($permission, $this->permissions);
    }
}
