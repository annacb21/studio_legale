<?php

class Post {

    private $titolo;
    private $data;
    private $cat;
    private $testo;

    // constructor
    public function __construct($titolo, $data, $cat, $testo, $cv, $aree) {
        $this->titolo = $titolo;
        $this->data = $data;
        $this->cat = $cat;
        $this->testo = $testo;
    }

    // get the title
    public function get_title() {
        return $this->titolo;
    }

    // get the data
    public function get_data() {
        return $this->data;
    }
    
    // get the category
    public function get_cat() {
        return $this->cat;
    }

    // get the text
    public function get_text() {
        return $this->testo;
    }

}

?>