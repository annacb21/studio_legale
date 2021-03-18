<?php

// class def
class Studio {

    private $id;
    private $città;
    private $indirizzo;
    private $cap;
    private $telefono;
    private $map;

    // constructor
    public function __construct($id, $città, $indirizzo, $cap, $telefono, $map) {
        $this->id = $id;
        $this->città = $città;
        $this->indirizzo = $indirizzo;
        $this->cap = $cap;
        $this->telefono = $telefono;
        $this->map = $map;
    }

    // get the study id
    public function get_studio_id() {
        return $this->id;
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
        $cityCap = $this->cap . " " . $this->città;
        return $cityCap;
    }

    // get the study phone number
    public function get_phone() {
        return $this->telefono;
    }

    // get the study google map
    public function get_map() {
        return $this->map;
    }

}

// class obj
$padova = new Studio("1", "padova", "via Emanuele Filiberto 43", "35122", "+39 049 654313", "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3870.33297082638!2d11.876240043360193!3d45.4094078078921!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x93728c5548da7b6b!2sstudio%20legale%20Turlon!5e0!3m2!1sit!2sit!4v1616063396191!5m2!1sit!2sit");
$roma = new Studio("2", "roma", "via Alessandria 88", "00198", "+39 0644 4254637", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2969.121094485248!2d12.500408115686056!3d41.91175547128584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f610c15390fbf%3A0x758f88d4e25fcf98!2sVia%20Alessandria%2C%2088%2C%2000198%20Roma%20RM!5e0!3m2!1sit!2sit!4v1616063610028!5m2!1sit!2sit");

$studi = array($padova, $roma);

?>