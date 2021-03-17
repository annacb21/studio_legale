<?php require_once("resources/config.php"); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Lo Studio | Studio Legale Turlon</title>
    <meta charset="utf-8">
    <meta name="description" content="Lo Studio Legale Turlon è diretto dall'Avv. Federica Turlon, con sede a Roma e Padova. Competenza nella tutela della persona, dei minori e della famiglia."/>
    <meta name="keywords" content="studio legale turlon, studio legale, avv, avvocato, Federica Turlon, famiglia, minori, Roma, Padova, consulenza, consulenza online"/>
    <meta name="author" content="Anna Cisotto Bertocco"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="icon" href="images/favicon.ico">
    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <!-- NAVBAR -->
    <?php include(TEMPLATE_FRONT . DS . "navbar.php"); ?>

    <!-- HEADER FOTO -->
    <div class="position-relative">
        <img src="images/foto.jpg" alt="">
    </div>

    <!-- LO STUDIO -->
    <div>
        <h1>Lo Studio Legale</h1>
        <p>Lo Studio Legale Turlon è diretto dall’<em>Avvocato Federica Turlon</em>, iscritta all’Albo degli Avvocati di Roma.</p>
        <p>Il legale svolge la propria attività negli studi di Roma e Padova. 
        Vanta una specifica competenza in tema di tutela della persona, dei minori e della famiglia in tutte le sue articolazioni, con riferimento agli aspetti personali, 
        relazionali, economici e successori. Lo studio inoltre ha maturato una solida esperienza nell’assistenza e nella consulenza di tutte le altre aree del diritto civile 
        e del diritto penale, con particolare riferimento alla tutela del minore vittima e autore di reato e in generale all’assistenza legale degli autori e delle persone 
        offese di maltrattamenti e abusi fisici, psicologici, sessuali ed economici.Una particolare attenzione è altresì dedicata ai soggetti vulnerabili, con disabilità e 
        alla persona anziana, anche quali vittime di maltrattamenti e violenze domestiche. L’attività è volta ad individuare le migliori soluzioni in relazione al singolo 
        caso concreto considerando tempi, costi e benefici di ogni singola proposta con particolare attenzione all’incidenza delle problematiche e della possibile soluzione 
        sugli aspetti personali, familiari e patrimoniali del cliente.
        </p>

        <div class="row">
<!-- studio card link via php -->
<?php
foreach($studi as $s) {
$studio = <<<DELIMETER

<div class="col-lg-3">
    <a href="sede.php?id={$s->get_studio_id()}">
        <div class="card bg-dark text-white">
            <img src="https://via.placeholder.com/100" class="card-img" alt="">
            <div class="card-img-overlay">
                <p class="card-title">{$s->get_city()}</p>
            </div>
        </div>
    </a>
</div>

DELIMETER;
echo $studio;
}
?>
<!-- -->
        </div>
    </div>

    <!-- UP BUTTON -->
    <button type="button" class="btn rounded-circle shadow btn-lg" id="upBtn" onclick="backToTop()"><i class="fas fa-chevron-up"></i></button>

    <!-- FOOTER -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    <script src="js/active.js"></script>
    <script src="js/scrollToTop.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>