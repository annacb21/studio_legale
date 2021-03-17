<?php

// class def
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

// class obj
$padova = new Studio("padova", "via Emanuele Filiberto 43", "35122", "+39 049 654313");
$roma = new Studio("roma", "via Alessandria 88", "00198", "+39 0644 4254637");

$studi = array($padova, $roma);

?>