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
    public function __construct() {}

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

    // get the text
    public function get_text() {
        return $this->testo;
    }

    // getter 
    public function get_posts() {
        $posts = null;
        $query = query("SELECT * FROM post");
        confirm($query);
        while($row = fetch_array($query)) {
            $posts[] = $row;
        }
        return $posts;
    }

}


?>