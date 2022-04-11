<?php

class AdminModel {
    private $id;
    private $username;
    private $password;
    private $name;
    private $dni;
    private $email;
    private $phone;
    private $address;
    private $social_network;
    private $profile_type;
    private $rol_id;
    private $rol_name;
    private $rol_description;
    private $status;

    public function __construct($id, $username, $password, $name, $dni, $email, $phone, $address, $social_network, $profile_type, $rol_id, $rol_name, $rol_description, $status) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->dni = $dni;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->social_network = $social_network;
        $this->profile_type = $profile_type;
        $this->rol_id = $rol_id;
        $this->rol_name = $rol_name;
        $this->rol_description = $rol_description;
        $this->status = $status;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getSocialNetwork() {
        return $this->social_network;
    }

    public function getProfileType() {
        return $this->profile_type;
    }

    public function getRolId() {
        return $this->rol_id;
    }

    public function getRolName() {
        return $this->rol_name;
    }

    public function getRolDescription() {
        return $this->rol_description;
    }

    public function getStatus() {
        return $this->status;
    }
}