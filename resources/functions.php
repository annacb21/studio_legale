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

// mostra il nome della sede
function show_sede_loc() {

    $page_title = " ";

    if(isset($_GET['id'])) {
        if($_GET['id'] == 1) {
            $page_title = "Padova";
        }
        else {
            $page_title = "Roma";
        }
    }

    return $page_title;

}

// ritorna l'indirizzo delle sedi in formato html per la pagina Sedi
function get_sede(){

$query = query("SELECT * FROM studies WHERE study_id =" . escape_string($_GET['id']) . " ");
confirm($query);

while($row = fetch_array($query)) {

$sede = <<<DELIMETER
<h2>{$row['study_city']}</h2>
<p>{$row['study_adress']}</p>
<p>{$row['study_cap']}</p>
<p>tel. e fax {$row['study_phone']}</p>
DELIMETER;

echo $sede;

}

}
    



 ?>