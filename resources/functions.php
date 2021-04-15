<?php

require_once("classes/studio.php");
require_once("classes/area.php");
require_once("classes/prof.php");
require_once("classes/post.php");
require_once("classes/consulenza.php");
require_once("classes/user.php");
require_once("database.php");

use PHPMailer\PHPMailer\PHPMailer;
date_default_timezone_set('Etc/UTC');


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
function send_consulenza($c) {

    require 'vendor/autoload.php';

    $toEmail = "annacb21@gmail.com"; 

    $mail = new PHPMailer();
    $mail->setFrom('anna.cisotto21@gmail.com', "Admin");
    $mail->addReplyTo($c->get_email(), $c->get_nome() . " " . $c->get_cognome());
    $mail->addAddress($toEmail, 'Admin'); 
    $mail->Subject = 'Richiesta consulenza da ' . $c->get_nome() . " " . $c->get_cognome();
    $mail->Body = "Recapito telefonico: " . $c->get_phone() . "\n";
    $mail->Body .= $c->get_msg();

    if($mail->send()) {
        set_message("La tua email è stata inviata con successo", "alert-success");
    } 
    else {
        set_message("Oops, qualcosa è andato storto: " . $mail->ErrorInfo, "alert-danger");  
    }

}

function send_email() {

    require 'vendor/autoload.php';

    if(isset($_POST['sendEmail'])) {

        $nome = escape_string($_POST['nome']);
        $cognome = escape_string($_POST['cognome']);
        $email = escape_string($_POST['email']);
        $phone = escape_string($_POST['telefono']);
        $message = escape_string($_POST['messaggio']);
        $toEmail = "annacb21@gmail.com"; 

        $mail = new PHPMailer();
        $mail->setFrom('postmaster@andreacostacurta.it', "Admin");
        $mail->addReplyTo($email, $nome . " " . $cognome);
        $mail->addAddress($toEmail, 'Admin'); 
        $mail->Subject = 'Messaggio da ' . $nome . " " . $cognome;
        $mail->Body = "Recapito telefonico: " . $phone . "\n";
        $mail->Body .= $message;

        if($mail->send()) {
            set_message("La tua email è stata inviata con successo", "alert-success");
        } 
        else {
            set_message("Oops, qualcosa è andato storto: " . $mail->ErrorInfo, "alert-danger");  
        }

        redirect("contatti.php#segreteria");
    }

}

function send_cv() {

    require 'vendor/autoload.php';

    if(isset($_POST['sendCv'])) {

        $nome = escape_string($_POST['nome']);
        $cognome = escape_string($_POST['cognome']);
        $email = escape_string($_POST['email']);
        $toEmail = "annacb21@gmail.com";

        $cv = escape_string($_FILES['cv']['name']);
        $cv_loc = escape_string($_FILES['cv']['tmp_name']);

        move_uploaded_file($cv_loc, UPLOADS . DS . $cv);
        
        $mail = new PHPMailer();
        $mail->setFrom('postmaster@andreacostacurta.it', "Admin");
        $mail->addReplyTo($email, $nome . " " . $cognome);
        $mail->addAddress($toEmail, 'Admin'); 
        $mail->Subject = 'Messaggio da ' . $nome . " " . $cognome;
        $mail->Body = "Invio candidatura di " . $nome . " " . $cognome;
        $mail->addAttachment(UPLOADS . DS . $cv);
        if (!$mail->addAttachment(UPLOADS . DS . $cv)) {
            set_message("Impossibile caricare il file: " . $cv, "alert-danger"); 
        }
        if($mail->send()) {
            set_message("La tua email è stata inviata con successo", "alert-success");
        } 
        else {
            set_message("Oops, qualcosa è andato storto: " . $mail->ErrorInfo, "alert-danger");  
        }
        unlink(UPLOADS . DS . $cv);
        redirect("contatti.php#lavora");
    }

}

// login the admin user
function login() {

    if(isset($_POST['login'])) {

        $username = escape_string($_POST['username']);
        $psw = escape_string($_POST['psw']);

        $query = query("SELECT * FROM utenti WHERE username = '{$username}' LIMIT 1");
        confirm($query);

        $row = fetch_array($query);

        if(mysqli_num_rows($query) == 0 || password_verify($psw, $row['password']) === false) {
            set_message("La tua password o il tuo username sono sbagliati", "alert-danger");
            redirect("login.php");
        }
        else {
            $_SESSION['user'] = $row['username'];
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

// go to the checkout page
function checkout() {

    if(isset($_POST['pay'])) {

        $nome = escape_string($_POST['nome']);
        $cognome = escape_string($_POST['cognome']);
        $email = escape_string($_POST['email']);
        $telefono = escape_string($_POST['telefono']);
        $messaggio = escape_string($_POST['messaggio']);
        $codice = bin2hex(random_bytes(20));
        $stato = "in attesa";
        $id = uniqid();

        $query = query("INSERT INTO consulenze(id,nome,cognome,email,telefono,messaggio,codice_tx,stato_tx,data_tx) VALUES ('{$id}', '{$nome}', '{$cognome}', '{$email}', '{$telefono}', '{$messaggio}', '{$codice}', '{$stato}', now())");
        confirm($query);

        redirect("checkout.php?id={$id}");
    }

}

//*************************** BACK FUNCTIONS ****************************

// show admin dashboard content dynamically
function show_admin_content() {

    if($_SERVER['REQUEST_URI'] == "/legale/admin/" || $_SERVER['REQUEST_URI'] == "/legale/admin/index.php" ) {
        include(TEMPLATE_BACK . "/dashboard.php");
    }

    if(isset($_GET['post'])) {
        include(TEMPLATE_BACK . "/post.php");
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
function get_admin_page() {

    $title = "";

    if($_SERVER['REQUEST_URI'] == "/legale/admin/" || $_SERVER['REQUEST_URI'] == "/legale/admin/index.php" ) {
        $title = "Dashboard";
    }

    if(isset($_GET['post'])) {
        $title = "Gestione post";
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

// add new post
function addPost() {
    if(isset($_POST['addPost'])) {
        $titolo = escape_string($_POST['titolo']);
        $cat = escape_string($_POST['categoria']);
        $testo = escape_string($_POST['testo']);

        $query = query("INSERT INTO post(titolo,post_data,cat_id,testo) VALUES ('{$titolo}', now(), '{$cat}', '{$testo}')");
        confirm($query);
        set_message("Post pubblicato con successo", "alert-success");
        redirect("index.php?post");

    }
}


?>