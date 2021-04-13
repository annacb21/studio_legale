<?php 
require_once("../resources/config.php");
if(!isset($_SESSION['user'])) {
    redirect("../index.php");
}
$query = query("SELECT * FROM utenti WHERE username = '{$_SESSION['user']}' LIMIT 1");
confirm($query);
$row = fetch_array($query);
$user = new User($row['id'], $row['username'], $row['password'], $row['nome'], $row['cognome']);

$post_query = query("SELECT COUNT(*) as tot FROM post");
confirm($post_query);
$tot_row1 = fetch_array($post_query);
$tot_post = $tot_row1['tot'];

$cons_query = query("SELECT COUNT(*) as tot FROM consulenze");
confirm($cons_query);
$tot_row2 = fetch_array($cons_query);
$tot_cons = $tot_row2['tot'];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Admin | Studio Legale Turlon</title>
    <meta charset="utf-8">
    <meta name="description" content="Lo Studio Legale Turlon è diretto dall'Avv. Federica Turlon, con sede a Roma e Padova. Competenza nella tutela della persona, dei minori e della famiglia."/>
    <meta name="keywords" content="studio legale turlon, studio legale, avv, avvocato, Federica Turlon, famiglia, minori, Roma, Padova, consulenza, consulenza online"/>
    <meta name="author" content="Anna Cisotto Bertocco"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="icon" href="../images/favicon.ico">
</head>
<body>
    
    <!-- SIDEBAR -->
    <?php include(TEMPLATE_BACK . DS . "sidebar.php"); ?>

    <!-- MAIN CONTENT -->
    <div class="main-admin">
        <header>
            <h2><i class="fas fa-chart-line"></i>Dashboard</h2>
            <div class="user-wrapper">
                <img src="../images/user1.png" alt="Icona profilo utente">
                <div>
                    <p class="h4"><?php echo $user->get_name() . " " . $user->get_surname(); ?></p>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">
                <div class="card">
                    <div class="card-header">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-body">
                        <p class="h1"><?php echo $tot_post; ?></p>
                        <p>post pubblicati</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="card-body">
                        <p class="h1"><?php echo $tot_cons; ?></p>
                        <p>consulenze richieste</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- FOOTER -->

    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>