<?php

//*************************** CLASS SEDE ****************************

// classe per le sedi legali
class Sede {
    // Campi dati
    public $id;
    public $city;
    public $adress;
    public $cap;
    public $phone;

    // Metodi

    // costruttore
    function __construct($i, $c, $a, $ca, $p) {
        $this->id = $i; 
        $this->city = $c;
        $this->adress = $a;
        $this->cap = $ca;
        $this->phone = $p;
    }

    // metodi get
    function get_id() {
        return $this->id;
    }

    function get_city() {
        return $this->city;
    }

    function get_adress() {
        return $this->adress;
    }

    function get_cap() {
        return $this->cap;
    }

    function get_phone() {
        return $this->phone;
    }
}

?>
