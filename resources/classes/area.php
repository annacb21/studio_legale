<?php

// class def

class Caso {

    private $nome;
    private $desc;

    // constructor
    public function __construct($nome, $desc) {
        $this->nome = $nome;
        $this->desc = $desc;
    }

    // get the case name
    public function get_name() {
        return $this->nome;
    }

    // get the case desc
    public function get_desc() {
        return $this->desc;
    }

}

class Area {

    private $id;
    private $nome;
    private $desc;
    private $aree;

    // constructor
    public function __construct($id, $nome, $desc, $aree) {
        $this->id = $id;
        $this->nome = $nome;
        $this->desc = $desc;
        $this->aree = $aree;
    }

    // get the area id
    public function get_id() {
        return $this->id;
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

// class obj
// $c... indica la lista delle aree tematiche specifiche di ciascuna area di attività
// $a... indica l'area di attività
$c1 = array(new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."));
$a1 = new Area("1", "Diritti della persona, tutela, amministrazione di sostegno e trust", "ccc", $c1);

$c2 = array(new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."));
$a2 = new Area("2","Affidamento figli e protezione dei minori a rischio", "ccc", $c2);

$c3 = array(new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."));
$a3 = new Area("3","Separazioni, divorzi, scioglimento unioni tra persone dello stesso sesso e convivenze", "ccc", $c3);

$c4 = array(new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."));
$a4 = new Area("4","Successioni ed eredità", "ccc", $c4);

$c5 = array(new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."));
$a5 = new Area("5","Adozioni e procreazione medicalmente assistita", "ccc", $c5);

$c6 = array(new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."));
$a6 = new Area("6","Incidenti e omicidi stradali", "ccc", $c6);

$c7 = array(new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."));
$a7 = new Area("7","Diritto penale della persona, dei minori e della famiglia", "ccc", $c7);

$c8 = array(new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."));
$a8 = new Area("8","Violenza alle donne, stalking, strumenti di tutela e ordini di protezione a favore del soggetto vulnerabile", "ccc", $c8);

$c9 = array(new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."));
$a9 = new Area("9","Locazioni, recupero crediti, vendita di beni dei debitori e piani di rientro", "ccc", $c9);

$c10 = array(new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."), new Caso("Lorem ipsum dolor sit amet, consectetur adipiscing elit", "È quello scritto, datato e sottoscritto per intero e di pugno dal testatore."));
$a10 = new Area("10","Diritto della navigazione", "ccc", $c10);

// areas list
$aree = array($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10);

?>