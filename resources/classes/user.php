<?php

// class def

class User {

    private $id;
    private $username;
    private $password;
    private $nome;
    private $cognome;

    // constructor
    public function __construct($id, $username, $password, $nome, $cognome) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->nome = $nome;
        $this->cognome = $cognome;
    }

    // get the id
    public function get_id() {
        return $this->id;
    }

    // get the username
    public function get_username() {
        return $this->username;
    }

    // get the psw
    public function get_psw() {
        return $this->password;
    }

    // get the name
    public function get_name() {
        return $this->nome;
    }

    // get the surname
    public function get_surname() {
        return $this->cognome;
    }

}


?>