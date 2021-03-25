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

    // get the text
    public function get_text() {
        return $this->testo;
    }

}

$posts = array();
$query = query("SELECT * FROM post");
confirm($query);
$i = 0;
while($row = fetch_array($query)) {
    $posts[$i] = new Post($row['id'], $row['titolo'], $row['post_data'], $row['cat_id'], $row['testo']);
    $i++;
}


?>