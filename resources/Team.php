<?php

//*************************** CLASS TEAM ****************************

class Team {
    // Campi dati
    public $id;
    public $name;
    public $role;
    public $email1;
    public $email2;
    public $desc;
    public $img;
    public $cv;

    // Metodi

    // costruttore
    function __construct($i, $n, $r, $e1, $d, $im, $c, $e2 =0) {
        $this->id = $i; 
        $this->name = $n;
        $this->role = $r;
        $this->email1 = $e1;
        $this->email2 = $e2;
        $this->desc = $d;
        $this->img = $im;
        $this->cv = $c;
    }

    // metodi get
    function get_id() {
        return $this->id;
    }

    function get_name() {
        return $this->name;
    }

    function get_role() {
        return $this->role;
    }

    function get_email1() {
        return $this->email1;
    }

    function get_email2() {
        return $this->email2;
    }

    function get_desc() {
        return $this->desc;
    }

    function get_img() {
        return $this->img;
    }

    function get_cv() {
        return $this->cv;
    }

}

?>