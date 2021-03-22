<?php require_once("resources/config.php"); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>I Professionisti | Studio Legale Turlon</title>
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

    <!-- PROFESSIONISTI -->
    <div>
        <h1>I Professionisti</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi lacus sed viverra tellus in hac habitasse platea dictumst.</p>
        <div class="row">
<!-- professionisti via php -->
<?php
foreach($profs as $p) {
$foto = display_file($p->get_foto());
$prof = <<<DELIMETER

<div class="col-lg-3">
    <div class="card">
        <img src="{$foto}" class="card-img-top" alt="Foto {$p->get_name()}">
        <div class="card-body">
            <h5 class="card-title">{$p->get_name()}</h5>
            <p class="card-text">{$p->get_role()}</p>
            <a href="" class="btn btn-primary">
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

DELIMETER;
echo $prof;
}
?>
<!-- -->
        </div>
        <div>
            <h2>I Nostri Collaboratori</h2>
            <ul>
                <li>Commercialisti e revisori contabili</li>
                <li>Consulenti per verifiche dati contabili e di bilancio</li>
                <li>Periti Informatici</li>
                <li>Periti Calligrafici</li>
                <li>Architetti esperti in sanatorie ed abusi edilizi</li>
                <li>Medici, Psicologi e Medici Legali altamente specializzati nella valutazione dei danni e nell’accertamento dei casi di malasanità</li>
                <li>Periti specializzati nella ricostruzione di sinistri stradali e nella valutazione dei danni</li>
                <li>Investigatori</li>
            </ul>
        </div>
    </div>

    <!-- UP BUTTON -->
    <button type="button" class="btn rounded-circle shadow btn-lg" id="upBtn" onclick="backToTop()"><i class="fas fa-chevron-up"></i></button>

    <!-- FOOTER -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="js/active.js"></script>
    <script src="js/scrollToTop.js"></script>
</body>
</html>