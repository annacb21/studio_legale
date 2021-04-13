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

$users_query = query("SELECT COUNT(*) as tot FROM utenti");
confirm($users_query);
$tot_row3 = fetch_array($users_query);
$tot_users = $tot_row3['tot'];

$recent_post_query = query("SELECT * FROM post ORDER BY post_data DESC LIMIT 4");
confirm($recent_post_query);
$recent_post = array();
$j = 0;
while($row = fetch_array($recent_post_query)) {
    $pd = $row['post_data'];
    setlocale(LC_TIME, 'it_IT');
    $pdate = strftime("%d %B %Y", strtotime($pd));
    $recent_post[$j] = new Post($row['id'], $row['titolo'], $pdate, $row['cat_id'], $row['testo']);
    $j++;
}

$rec_cons_query = query("SELECT * FROM consulenze ORDER BY data_tx DESC LIMIT 10");
confirm($rec_cons_query);
$recent_cons = array();
$i = 0;
while($row = fetch_array($rec_cons_query)) {
    $recent_cons[$i] = new Consulenza($row['id'], $row['nome'], $row['cognome'], $row['email'], $row['telefono'], $row['messaggio'], $row['codice_tx'], $row['stato_tx'], $row['data_tx']);
    $i++;
}
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
        <header class="d-flex justify-content-between">
            <h2><i class="fas fa-bars"></i>Dashboard</h2>
            <div class="user-wrapper d-flex align-items-center">
                <img src="../images/user1.png" alt="Icona profilo utente">
                <div>
                    <p class="mb-0"><?php echo $user->get_name(); ?></p>
                    <small class="d-inline-block text-muted">Super admin</small>
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
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-body">
                        <p class="h1"><?php echo $tot_users; ?></p>
                        <p>utenti</p>
                    </div>
                </div>
            </div>
            <div class="recent">
                <div class="rec-posts mb-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Post recenti</h3>
                            <button type="button" class="btn">Vedi tutti<i class="fas fa-arrow-right"></i></button>
                        </div>
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Titolo post</td>
                                        <td>Categoria post</td>
                                        <td>Data post</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($recent_post as $p): ?>
                                    <tr>
                                        <td><?php echo $p->get_title_ant(); ?></td>
                                        <td><?php echo $p->get_cat_name(); ?></td>
                                        <td><?php echo $p->get_data(); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="rec-cons mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Ultime consulenze richieste</h3>
                            <button type="button" class="btn">Vedi tutti<i class="fas fa-arrow-right"></i></button>
                        </div>
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Nome richiedente</td>
                                        <td>Cognome richiedente</td>
                                        <td>Email richiedente</td>
                                        <td>Recapito telefonico</td>
                                        <td>Data transazione</td>
                                        <td>Stato transazione</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($recent_cons as $c): ?>
                                    <tr>
                                        <td><?php echo $c->get_id(); ?></td>
                                        <td><?php echo $c->get_nome(); ?></td>
                                        <td><?php echo $c->get_cognome(); ?></td>
                                        <td><?php echo $c->get_email(); ?></td>
                                        <td><?php echo $c->get_phone(); ?></td>
                                        <td><?php echo $c->get_data(); ?></td>
                                        <td class="<?php if($c->get_state() == 'completato'){echo 'state-succ';} else {echo 'state-no';} ?>"><?php echo $c->get_state(); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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