<?php

class Area {

    private $nome;
    private $desc;
    private $areeTitle;
    private $areeDesc;

    // constructor
    public function __construct($nome, $desc, $areeTitle, $areeDesc) {
        $this->nome = $nome;
        $this->desc = $desc;
        $this->areeTitle = $areeTitle;
        $this->areeDesc = $areeDesc;
    }

    // get the area name
    public function get_name() {
        return $this->nome;
    }

    // get the area desc
    public function get_desc() {
        return $this->desc;
    }
    

}

?>