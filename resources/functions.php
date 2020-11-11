<?php require_once("Sede.php"); ?>
<?php require_once("Activity.php"); ?>
<?php require_once("Team.php"); ?>

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

//*************************** Activity class functions ****************************

function get_activity($id) {

    $query = query("SELECT * FROM activities WHERE activity_id={$id}");
    confirm($query);
    $row = fetch_array($query);

    $name = $row['activity_name'];
    $short = $row['activity_short_desc'];
    $long = $row['activity_long_desc'];

    $activity = new Activity($id, $name, $short, $long);

    return $activity;

}

function get_activities() {

    $query = query("SELECT * FROM activities");
    confirm($query);

    $list = array();

    while($row = fetch_array($query)) {
        $a_id = $row['activity_id'];
        array_push($list, get_activity($a_id));
    }

    return $list;

}

//*************************** Team class functions ****************************

function get_team($id) {

    $query = query("SELECT * FROM members WHERE member_id={$id}");
    confirm($query);
    $row = fetch_array($query);

    $name = $row['member_name'];
    $role = $row['member_role'];
    $email1 = $row['member_email1'];
    $email2 = $row['member_email2'];
    $desc = $row['member_desc'];
    $img = $row['member_img'];
    $cv = $row['member_cv'];

    $team = new Team($id, $name, $role, $email1, $desc, $img, $cv, $email2);

    return $team;

}

function get_teams() {

    $query = query("SELECT * FROM members");
    confirm($query);

    $list = array();

    while($row = fetch_array($query)) {
        $t_id = $row['member_id'];
        array_push($list, get_team($t_id));
    }

    return $list;

}

?>