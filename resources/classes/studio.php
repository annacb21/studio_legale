<?php

class Studio {

    private $città;
    private $indirizzo;
    private $cap;
    private $telefono;

    // constructor
    public function __construct($città, $indirizzo, $cap, $telefono) {
        $this->città = $città;
        $this->indirizzo = $indirizzo;
        $this->cap = $cap;
        $this->telefono = $telefono;
    }

    // get the study city
    public function get_city() {
        return $this->città;
    }

    // get the study adress
    public function get_adress() {
        return $this->indirizzo;
    }
    
    // get the study cap
    public function get_cap() {
        $cityCap = $this->cap . $this->city;
        return $cityCap;
    }

    // get the study phone number
    public function get_phone() {
        return $this->telefono;
    }

}

?>