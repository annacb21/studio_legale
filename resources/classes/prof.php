<?php

require_once("area.php");

// class def
class Professionista {

    private $id;
    private $nome;
    private $ruolo;
    private $foto;
    private $desc;
    private $cv;
    private $aree;

    // constructor
    public function __construct($id, $nome, $ruolo, $foto, $desc, $cv, $aree) {
        $this->id = $id;
        $this->nome = $nome;
        $this->ruolo = $ruolo;
        $this->foto = $foto;
        $this->desc = $desc;
        $this->cv = $cv;
        $this->aree = $aree;
    }

    // get the id
    public function get_id() {
        return $this->id;
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

// class obj
$tDesc = "L’Avv. <strong>Federica Turlon</strong> si è laureata con lode in Giurisprudenza presso l’Università degli Studi di Padova. 
Ha conseguito il titolo di dottore di ricerca in 'Studi Giuridici Comparati ed Europei' presso l’Università degli Studi di Trento. 
Attualmente è professore a contratto di ‘diritto penale’ e di ‘diritto pubblico del welfare’ presso l’Università degli Studi di Padova. 
E’ autrice di diverse pubblicazioni in ambito giuridico penale, minorile e familiare.";
$tAree = array($a1, $a2, $a3);
$turlon = new Professionista("1", "Avv. Federica Turlon", "Avvocato Fondatore dello Studio", "turlon.jpg", $tDesc, "cv", $tAree);

$pDesc = "boh";
$pAree = array($a4, $a5, $a6, $a7);
$pardini = new Professionista("2", "Avv. Cristina Pardini", "Dottore di ricerca in Diritto Civile", "pardini.jpg", $pDesc, "cv", $pAree);

$bDesc = "ah boh";
$bAree = array($a8, $a9, $a10);
$barison = new Professionista("3", "Demetra Barison", "Responsabile segreteria e amministrazione", "barison.jpg", $bDesc, "cv", $bAree);

$profs = array($turlon, $pardini, $barison);

?>