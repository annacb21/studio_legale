<?php

require_once("resources/database.php");

// class def
class Consulenza {

    private $id;
    private $nome;
    private $cognome;
    private $email;
    private $telefono;
    private $messaggio;
    private $codice;
    private $stato;
    private $data;

    // constructor
    public function __construct($id, $nome, $cognome, $email, $telefono, $messaggio, $codice, $stato, $data) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->messaggio = $messaggio;
        $this->codice = $codice;
        $this->stato = $stato;
        $this->data = $data;
    }

    // get the id
    public function get_id() {
        return $this->id;
    }

    // get the name
    public function get_nome() {
        return $this->nome;
    }

    // get the surname
    public function get_cognome() {
        return $this->cognome;
    }

    // get the email
    public function get_email() {
        return $this->email;
    }

    // get the phone
    public function get_phone() {
        return $this->telefono;
    }

    // get the message
    public function get_msg() {
        return $this->messaggio;
    }

    // get the codex
    public function get_codex() {
        return $this->codice;
    }

    // get the state
    public function get_state() {
        return $this->stato;
    }

    // get the data
    public function get_data() {
        return $this->data;
    }

}

?>