<?php

//*************************** CLASS ACTIVITY ****************************

class Activity {
    // Campi dati
    public $id;
    public $name;
    public $short_desc;
    public $long_desc;

    // Metodi

    // costruttore
    function __construct($i, $n, $sd, $ld) {
        $this->id = $i; 
        $this->name = $n;
        $this->short_desc = $sd;
        $this->long_desc = $ld;
    }

    // metodi get
    function get_id() {
        return $this->id;
    }

    function get_name() {
        return $this->name;
    }

    function get_short_desc() {
        return $this->short_desc;
    }

    function get_long_desc() {
        return $this->long_desc;
    }

}

?>