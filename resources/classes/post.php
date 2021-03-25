<?php

require_once("resources/database.php");

// class def
class Post {

    private $id;
    private $titolo;
    private $data;
    private $cat;
    private $testo;

    // constructor
    public function __construct($id, $titolo, $data, $cat, $testo) {
        $this->id = $id;
        $this->titolo = $titolo;
        $this->data = $data;
        $this->cat = $cat;
        $this->testo = $testo;
    }

    // get the id
    public function get_id() {
        return $this->id;
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

    // get the category string
    public function get_cat_name() {
        $c = $this->cat;
        $tmp = "";
        switch($c) {
            case 1:
                $tmp = "News";
                break;
            case 2:
                $tmp = "Eventi";
                break;
            case 3:
                $tmp = "Pubblicazioni";
                break;
        }
        return $tmp;
    }

    // get the text
    public function get_text() {
        return $this->testo;
    }

    // get text ant 
    public function get_text_ant() {
        $t = $this->testo;
        return (count($words = explode(' ', $t)) > 150) ? implode(' ', array_slice($words, 0, 150)) . "..." : $t;
    }

}


$tot_query = query("SELECT COUNT(*) as tot FROM post");
confirm($tot_query);
$tot_row = fetch_array($tot_query);
$tot_post = $tot_row['tot'];

$tot_pages = ceil($tot_post / 4);


?>