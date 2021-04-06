<?php

require_once("classes/studio.php");
require_once("classes/area.php");
require_once("classes/prof.php");
require_once("classes/post.php");
require_once("database.php");

use PHPMailer\PHPMailer\PHPMailer;

//*************************** SYSTEM FUNCTIONS ****************************

// redirect to a page
function redirect($location) {

    return header("Location: $location ");

}

// create an alert message
function set_message($msg, $alert_type) {

    if(!empty($msg)) {
        $_SESSION['message'] = $msg;
        $_SESSION['alert'] = $alert_type;
    }
    else {
        $msg = "";
        $alert_type = "";
    }

}

// display an alert message
function display_message() {

if(isset($_SESSION['message']) && isset($_SESSION['alert'])) {
    
$alert = <<<DELIMETER

<div class="alert {$_SESSION['alert']} w-50 text-center mx-auto" role="alert">
    {$_SESSION['message']}
</div>

DELIMETER;

echo $alert;

unset($_SESSION['message']);
}

}

// display and image or a file
function display_file($file) {

    return "images" . DS . $file;

}

// show a part of a longer text
function anteprima($txt, $lung_max) {

    return (count($words = explode(' ', $txt)) > $lung_max) ? implode(' ', array_slice($words, 0, $lung_max)) . "..." : $txt;

}

//*************************** FRONT FUNCTIONS ****************************

// send an email from a contact form
function send_email($page) {

    date_default_timezone_set('Etc/UTC');

    require 'vendor/autoload.php';

    if(isset($_POST['sendEmail'])) {

        $name = $_POST['name'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $toEmail = "costacurta.andrea@gmail.com"; 

        $mail = new PHPMailer();
        $mail->setFrom('postmaster@andreacostacurta.it', "Andrea Costacurta");
        $mail->addReplyTo($email, $nome . " " . $cognome);
        $mail->addAddress($toEmail, 'Andrea Costacurta'); 
        $mail->Subject = 'Messaggio da ' . $name . " " . $cognome;
        $mail->Body = "Recapito telefonico: " . $phone . "\n";
        $mail->Body .= $message;

        if($mail->send()) {
            set_message("La tua email è stata inviata con successo", "alert-success");
        } 
        else {
            set_message("Oops, qualcosa è andato storto: " . $mail->ErrorInfo, "alert-danger");  
        }

        if($page == 'home') {
            redirect("index.php#prenotazioni");
        }
        elseif($page == 'contatti') {
            redirect("contatti.php#contatto");
        }
    }

}

// login the admin user
function login() {

    if(isset($_POST['login'])) {

        $username = escape_string($_POST['username']);
        $psw = escape_string($_POST['psw']);

        $query = query("SELECT * FROM users WHERE username = '{$username}' LIMIT 1");
        confirm($query);

        $row = fetch_array($query);

        if(mysqli_num_rows($query) == 0 || password_verify($psw, $row['password']) === false) {
            set_message("La tua password o il tuo username sono sbagliati", "alert-danger");
            redirect("login.php");
        }
        else {
            $_SESSION['user'] = $row['user_id'];
            redirect("admin/");
        }

    }

}

// count pages for pagination
function get_page() {

    $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
    return $page;

}

// shows articles
function show_post($start) {

    $posts = array();

    if(isset($_POST['search'])) {

        $str = escape_string($_POST['cerca']);
        $q = query("SELECT * FROM post WHERE titolo LIKE '%$str%' ORDER BY post_data DESC LIMIT 0, 4");
        confirm($q);
        if($q->num_rows > 0) {
            $i = 0;
            while($row = fetch_array($q)) {
                $d = $row['post_data'];
                setlocale(LC_TIME, 'it_IT');
                $date = strftime("%d %B %Y", strtotime($d));
                $posts[$i] = new Post($row['id'], $row['titolo'], $date, $row['cat_id'], $row['testo']);
                $i++;
            }
        }
    }
    elseif (isset($_GET['anno'])) {
        $q = query("SELECT * FROM post WHERE YEAR(post_data) = {$_GET['anno']} ORDER BY post_data DESC LIMIT 0, 4");
        confirm($q);
        if($q->num_rows > 0) {
            $i = 0;
            while($row = fetch_array($q)) {
                $d = $row['post_data'];
                setlocale(LC_TIME, 'it_IT');
                $date = strftime("%d %B %Y", strtotime($d));
                $posts[$i] = new Post($row['id'], $row['titolo'], $date, $row['cat_id'], $row['testo']);
                $i++;
            }
        }
    }
    else {

        if(isset($_POST['selectCat'])) {

            $cat = escape_string($_POST['cat']);
            if($cat == 0) {
                $q = query("SELECT * FROM post ORDER BY post_data DESC LIMIT $start, 4");
                confirm($q);
                $i = 0;
                while($row = fetch_array($q)) {
                    $d = $row['post_data'];
                    setlocale(LC_TIME, 'it_IT');
                    $date = strftime("%d %B %Y", strtotime($d));
                    $posts[$i] = new Post($row['id'], $row['titolo'], $date, $row['cat_id'], $row['testo']);
                    $i++;
                }
            }
            else {
                $q = query("SELECT * FROM post WHERE cat_id = $cat ORDER BY post_data DESC LIMIT 0, 4");
                confirm($q);
                $i = 0;
                while($row = fetch_array($q)) {
                    $d = $row['post_data'];
                    setlocale(LC_TIME, 'it_IT');
                    $date = strftime("%d %B %Y", strtotime($d));
                    $posts[$i] = new Post($row['id'], $row['titolo'], $date, $row['cat_id'], $row['testo']);
                    $i++;
                }
            }
    
        }
        else {
    
            $q = query("SELECT * FROM post ORDER BY post_data DESC LIMIT $start, 4");
            confirm($q);
            $i = 0;
            while($row = fetch_array($q)) {
                $d = $row['post_data'];
                setlocale(LC_TIME, 'it_IT');
                $date = strftime("%d %B %Y", strtotime($d));
                $posts[$i] = new Post($row['id'], $row['titolo'], $date, $row['cat_id'], $row['testo']);
                $i++;
            }
    
        }

    }

    return $posts;

}

// show post page title
function get_page_title() {

    $title = "";

    if(isset($_POST['selectCat'])) {

        $cat = escape_string($_POST['cat']);
        
        if($cat == "0") {
            $title = "Tutti i post";
        }

        if($cat == "1") {
            $title = "News";
        }
        if($cat == "2") {
            $title = "Eventi";
        }
        if($cat == "3") {
            $title = "Pubblicazioni";
        }

    }
    else if(isset($_POST['search'])) {
        $title = "Risultati della ricerca";
    }
    else if(isset($_GET['anno'])) {
        $title = "Post del {$_GET['anno']}";
    }
    else {

        $title = "Tutti i post";

    }

    return $title;

}

// show pagination
function show_pagination($page) {

$tot_post = 0;
if(isset($_POST['selectCat'])) {
$cat = escape_string($_POST['cat']);
if($cat == 0) {
$tot_query = query("SELECT COUNT(*) as tot FROM post");
confirm($tot_query);
$tot_row = fetch_array($tot_query);
$tot_post = $tot_row['tot'];
}
else {
$tot_query = query("SELECT COUNT(*) as tot FROM post WHERE cat_id = $cat");
confirm($tot_query);
$tot_row = fetch_array($tot_query);
$tot_post = $tot_row['tot'];
}
}
else if(isset($_POST['search'])) {
$str = escape_string($_POST['cerca']);
$tot_query = query("SELECT COUNT(*) as tot FROM post WHERE titolo LIKE '%$str%'");
confirm($tot_query);
$tot_row = fetch_array($tot_query);
$tot_post = $tot_row['tot'];
}
else if(isset($_GET['anno'])) {
$tot_query = query("SELECT COUNT(*) as tot FROM post WHERE YEAR(post_data) = {$_GET['anno']}");
confirm($tot_query);
$tot_row = fetch_array($tot_query);
$tot_post = $tot_row['tot'];
}
else {
$tot_query = query("SELECT COUNT(*) as tot FROM post");
confirm($tot_query);
$tot_row = fetch_array($tot_query);
$tot_post = $tot_row['tot'];
}

if($tot_post > 4) {

$tot_pages = ceil($tot_post / 4);
$pagination_start = ($page - 1) * 4;
$prev = $page - 1;
$next = $page + 1;
if($page <= 1) {
$dis = " disabled";
$plink = "#";
}
else {
$dis = "";
$plink = "?page=" . $prev;
}

$pag = <<<DELIMETER

<nav aria-label="Navigazione pagine">
    <ul class="pagination">
        <li class="page-item{$dis}">
            <a class="page-link" href="{$plink}" aria-label="Indietro">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
DELIMETER;

for($i = 1; $i <= $tot_pages; $i++) {
if($page == $i) {
$act = " active";
}
else {
$act = "";
}
$pag .= <<<DELIMETER
<li class="page-item{$act}">
    <a class="page-link" href="pubblicazioni.php?page={$i}">{$i}</a>
</li>
DELIMETER;
}

if($page >= $tot_pages) {
$d = " disabled";
$alink = "#";
}
else {
$d = "";
$alink = "?page=" . $next;
}
$pag .= <<<DELIMETER
        <li class="page-item{$d}">
            <a class="page-link" href="{$alink}" aria-label="Avanti">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
DELIMETER;

echo $pag;

}


}

//*************************** BACK FUNCTIONS ****************************

// show admin dashboard content dynamically
function show_admin_content() {

    if($_SERVER['REQUEST_URI'] == "/costacurta/admin/" || $_SERVER['REQUEST_URI'] == "/costacurta/admin/index.php" ) {
        include(TEMPLATE_BACK . "/dashboard.php");
    }

    if(isset($_GET['account'])) {
        include(TEMPLATE_BACK . "/account.php");
    }

    if(isset($_GET['profile'])) {
        include(TEMPLATE_BACK . "/profile.php");
    }

    if(isset($_GET['quotes'])) {
        include(TEMPLATE_BACK . "/quotes.php");
    }

    if(isset($_GET['pubs'])) {
        include(TEMPLATE_BACK . "/pubs.php");
    }

    if(isset($_GET['gallery'])) {
        include(TEMPLATE_BACK . "/gallery.php");
    }

    if(isset($_GET['video'])) {
        include(TEMPLATE_BACK . "/video.php");
    }

    if(isset($_GET['articles'])) {
        include(TEMPLATE_BACK . "/articles.php");
    }

    if(isset($_GET['aff'])) {
        include(TEMPLATE_BACK . "/aff.php");
    }

    if(isset($_GET['contatti'])) {
        include(TEMPLATE_BACK . "/contatti.php");
    }

    if(isset($_GET['edit-quote'])) {
        include(TEMPLATE_BACK . "/edit-quote.php");
    }

    if(isset($_GET['edit_profile'])) {
        include(TEMPLATE_BACK . "/edit_profile.php");
    }

    if(isset($_GET['edit_pub'])) {
        include(TEMPLATE_BACK . "/edit_pub.php");
    }

    if(isset($_GET['edit_art'])) {
        include(TEMPLATE_BACK . "/edit_art.php");
    }

    if(isset($_GET['delete_dist'])) {
        include(TEMPLATE_BACK . "/delete_dist.php");
    }

    if(isset($_GET['delete_serv'])) {
        include(TEMPLATE_BACK . "/delete_serv.php");
    }

    if(isset($_GET['delete_pub'])) {
        include(TEMPLATE_BACK . "/delete_pub.php");
    }

    if(isset($_GET['delete_foto'])) {
        include(TEMPLATE_BACK . "/delete_foto.php");
    }

    if(isset($_GET['delete_video'])) {
        include(TEMPLATE_BACK . "/delete_video.php");
    }

    if(isset($_GET['delete_art'])) {
        include(TEMPLATE_BACK . "/delete_art.php");
    }

    if(isset($_GET['delete_aff'])) {
        include(TEMPLATE_BACK . "/delete_aff.php");
    }

    if(isset($_GET['delete_link'])) {
        include(TEMPLATE_BACK . "/delete_link.php");
    }

    if(isset($_GET['logout'])) {
        include(TEMPLATE_BACK . "/logout.php");
    }

}

// set the admin page title dynamically
function get_admin_h1() {

    $title = "";

    if($_SERVER['REQUEST_URI'] == "/costacurta/admin/" || $_SERVER['REQUEST_URI'] == "/costacurta/admin/index.php" ) {
        $title = "Dashboard";
    }

    if(isset($_GET['account'])) {
        $title = "Impostazioni account";
    }

    if(isset($_GET['quotes'])) {
        $title = "Citazioni";
    }

    if(isset($_GET['profile'])) {
        $title = "Profilo";
    }

    if(isset($_GET['pubs'])) {
        $title = "Pubblicazioni";
    }

    if(isset($_GET['gallery'])) {
        $title = "Gallery foto";
    }

    if(isset($_GET['video'])) {
        $title = "Video e multimedia";
    }

    if(isset($_GET['articles'])) {
        $title = "News, eventi e libri";
    }

    if(isset($_GET['aff'])) {
        $title = "Affiliazioni e link utili";
    }

    if(isset($_GET['edit-quote'])) {
        $title = "Modifica citazione";
    }

    if(isset($_GET['edit_profile'])) {
        $title = "Modifica profilo";
    }

    if(isset($_GET['edit_pub'])) {
        $title = "Modifica pubblicazione";
    }

    if(isset($_GET['edit_art'])) {
        $title = "Modifica news";
    }

    echo $title;

}


?>