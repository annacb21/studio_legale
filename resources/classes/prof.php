<?php

class Professionista {

    private $nome;
    private $ruolo;
    private $foto;
    private $desc;
    private $cv;
    private $aree;

    // constructor
    public function __construct($nome, $ruolo, $foto, $desc, $cv, $aree) {
        $this->nome = $nome;
        $this->ruolo = $ruolo;
        $this->foto = $foto;
        $this->desc = $desc;
        $this->cv = $cv;
        $this->aree = $aree;
    }

    // get the name
    public function get_name() {
        return $this->nome;
    }

    // get the role
    public function get_role() {
        return $this->ruolo;
    }
    
    // get the foto
    public function get_foto() {
        return $this->foto;
    }

    // get the profile desc
    public function get_desc() {
        return $this->desc;
    }

    // get the cv
    public function get_cv() {
        return $this->cv;
    }

    // get the area list
    public function get_aree() {
        return $this->aree;
    }

}

?>