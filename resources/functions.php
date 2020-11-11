<?php require_once("Sede.php"); ?>

<?php

//*************************** SYSTEM FUNCTIONS ****************************
// fa una query al database
function query($sql){

    global $connection;

    return mysqli_query($connection, $sql);

}

// conferma la query
function confirm($result){

    global $connection;

    if(!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }

}


function escape_string($string) {

    global $connection;

    return mysqli_real_escape_string($connection, $string);

}

function fetch_array($result){

    return mysqli_fetch_array($result);

}

// ritorna il path per le immagini
function display_image($image) {

    return "images" . DS . $image;

}

//*************************** FRONT FUNCTIONS ****************************

// ritorna il body della pagina di admin
function show_main_content() {

    if($_SERVER['REQUEST_URI'] == "/legale/public/" || $_SERVER['REQUEST_URI'] == "/legale/public/index.php" ) {
        include(TEMPLATE_FRONT . "/main.php");
    }

    if(isset($_GET['sedi'])) {
        include(TEMPLATE_FRONT . "/sedi.php");
    }

    if(isset($_GET['activities'])) {
        include(TEMPLATE_FRONT . "/activities.php");
    }

    if(isset($_GET['team'])) {
        include(TEMPLATE_FRONT . "/team.php");
    }

    if(isset($_GET['pub'])) {
        include(TEMPLATE_FRONT . "/pub.php");
    }

    if(isset($_GET['contacts'])) {
        include(TEMPLATE_FRONT . "/contacts.php");
    }

}

//*************************** Sede class functions ****************************
// crea la sede dal database
function get_sede($id) {

    $query = query("SELECT * FROM studies WHERE study_id={$id}");
    confirm($query);
    $row = fetch_array($query);

    $s_city = $row['study_city'];
    $s_adress = $row['study_adress'];
    $s_cap = $row['study_cap'];
    $s_phone = $row['study_phone'];

    $sede = new Sede($id, $s_city, $s_adress, $s_cap, $s_phone);

    return $sede;

}

// ritorna la lista con le sedi
function get_sedi() {

    $query = query("SELECT * FROM studies");
    confirm($query);

    $list = array();

    while($row = fetch_array($query)) {
        $s_id = $row['study_id'];
        array_push($list, get_sede($s_id));
    }

    return $list;

}

//*************************** FRONT FUNCTIONS ****************************
    
// ritorna la lista delle aree di attività
function get_activities_list(){

$query = query("SELECT * FROM activities");
confirm($query);

while($row = fetch_array($query)) {

$activities = <<<DELIMETER
<li><a href="../public/index.php?activities&id={$row['activity_id']}'">{$row['activity_name']}</a><i class="fa fa-caret-right"></i></li>
DELIMETER;

echo $activities;

}

}

// ritorna le card delle attività
function get_activities_card(){

$query = query("SELECT * FROM activities");
confirm($query);

while($row = fetch_array($query)) {

$activities = <<<DELIMETER
<div class="card">
    <div class="card_title">
        <p>{$row['activity_name']}</p>
    </div>
    <div class="card_desc">
        <p>{$row['activity_short_desc']}</p>
    </div>
    <a href="../public/index.php?activities&id={$row['activity_id']}'">Approfondisci</a>
</div>
DELIMETER;

echo $activities;

}

}

// ritorna le card del team 
function get_team_card(){

$query = query("SELECT * FROM members");
confirm($query);

while($row = fetch_array($query)) {

$img = display_image($row['member_img']); 

$team = <<<DELIMETER
<div class="card">
    <img src="../public/{$img}" alt="Foto team">
    <div class="card_title">
        <h2>{$row['member_name']}</h2>
    </div>
    <div class="card_desc">
        <p>{$row['member_role']}</p>
        <p>{$row['member_email1']}</p>
        <p>{$row['member_email2']}</p>
        <p>{$row['member_desc']}</p> 
    </div>
    <a href="../public/index.php?team&id={$row['member_id']}'">Vedi curriculum</a>
</div>
DELIMETER;

echo $team;

}

}


?>