<?php

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
function show_sede() {

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



 ?>