<?php
require_once("resources/config.php"); 
if(isset($_GET['c'])) {
    $query = query("SELECT * FROM consulenze WHERE codice_tx = '{$_GET['c']}'");
    confirm($query);
    if(mysqli_num_rows($query) > 0) {
        $row = fetch_array($query);
        $update = query("UPDATE consulenze SET stato_tx = 'completato' WHERE codice_tx = '{$_GET['c']}'");
        confirm($update);
        $c = new Consulenza($row['id'], $row['nome'], $row['cognome'], $row['email'], $row['telefono'], $row['messaggio'], $row['codice_tx'], $row['stato_tx'], $row['data_tx']);
        send_consulenza($c);
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Conferma pagamento | Studio Legale Turlon</title>
    <meta charset="utf-8">
    <meta name="description" content="Lo Studio Legale Turlon è diretto dall'Avv. Federica Turlon, con sede a Roma e Padova. Competenza nella tutela della persona, dei minori e della famiglia."/>
    <meta name="keywords" content="studio legale turlon, studio legale, avv, avvocato, Federica Turlon, famiglia, minori, Roma, Padova, consulenza, consulenza online"/>
    <meta name="author" content="Anna Cisotto Bertocco"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="icon" href="images/favicon.ico">
</head>
<body>
    
    <!-- NAVBAR -->
    <?php include(TEMPLATE_FRONT . DS . "navbar.php"); ?>

    <!-- HEADER FOTO -->
    <div class="position-relative">
        <img src="images/foto.jpg" alt="">
    </div>

    <!-- CONSULENZA ONLINE -->
    <div>
        <h1>Grazie per aver effettuato l'acquisto!</h1>
        <?php display_message(); ?>
        <p>Grazie per aver effettuato il pagamento. La transazione è stata completata e una ricevuta dell'acquisto è stata inviata al tuo indirizzo email. Accedi al tuo conto PayPal per vedere i dettagli della transazione</p>
    </div>

    <!-- UP BUTTON -->
    <button type="button" class="btn rounded-circle shadow btn-lg" id="upBtn" onclick="backToTop()"><i class="fas fa-chevron-up"></i></button>

    <!-- FOOTER -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="js/scrollToTop.js"></script>
</body>
</html>