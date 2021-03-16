<?php

class Studio {

    public $città;
    public $indirizzo;
    public $cap;
    public $telefono;

    // constructor
    function __construct($città, $indirizzo, $cap, $telefono) {
        $this->città = $città;
        $this->indirizzo = $indirizzo;
        $this->cap = $cap;
        $this->telefono = $telefono;
    }

    // get the study city
    function get_city() {
        return $this->città;
    }

    // get the study adress
    function get_adress() {
        return $this->indirizzo;
    }
    
    // get the study cap
    function get_cap() {
        $cityCap = $this->cap . $this->city;
        return $cityCap;
    }

    // get the study phone number
    function get_phone() {
        return $this->telefono;
    }

}

?>