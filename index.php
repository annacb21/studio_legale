<?php require_once("resources/config.php"); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Studio Legale Turlon</title>
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
        <div class="position-absolute top-50">
            <h1>Studio Legale Turlon</h1>
            <h2>Professionalità al servizio della famiglia e dei minori</h2>
        </div>
    </div>

    <!-- SEZIONE STUDIO -->
    <section id="studio">
        <div>
            <h3 class="d-inline">Lo Studio</h3>
            <a href="#" role="button" class="btn btn-lg" aria-label="Approfondisci">
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
        <p>
            Lo <strong>Studio Legale Turlon</strong> è diretto dall’Avvocato Federica Turlon, iscritta all’Albo degli Avvocati di Roma.
            Il legale svolge la propria attività negli studi di <a href="#">Roma</a> e <a href="#">Padova</a>.
            Vanta una specifica competenza in tema di tutela della persona, dei <strong>minori</strong> e della <strong>famiglia</strong> in tutte le sue articolazioni, con riferimento agli aspetti personali, relazionali, economici e successori. 
        </p>
    </section>

    <!-- SEZIONE AREE -->
    <section>
        <div>
            <h3 class="d-inline">Le Aree di Attività</h3>
            <a href="#" role="button" class="btn btn-lg" aria-label="Approfondisci">
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
        <ul class="list-group">
<!-- get areas list via PHP -->
<?php
foreach($aree as $a) {
$area = <<<DELIMETER

<li class="list-group-item">
    <a href="#" class="list-group-item-action">{$a->get_name()}</a>
    <i class="fas fa-caret-right"></i>
</li>

DELIMETER;
echo $area;
}
?>
<!-- -->
        </ul>
    </section>

    <!-- SEZIONE PROFILO -->
    <section>
        <div>
            <h3 class="d-inline">Avv. Federica Turlon</h3>
            <a href="#" role="button" class="btn btn-lg" aria-label="Approfondisci">
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
        <div>
            <p>
                L’Avv. <strong>Federica Turlon</strong> si è laureata con lode in Giurisprudenza presso l’Università degli Studi di Padova. 
                Ha conseguito il titolo di dottore di ricerca in "Studi Giuridici Comparati ed Europei” presso l’Università degli Studi di Trento. 
                Attualmente è professore a contratto di ‘diritto penale’ e di ‘diritto pubblico del welfare’ presso l’Università degli Studi di Padova. 
                E’ autrice di diverse pubblicazioni in ambito giuridico penale, minorile e familiare.
            </p>
            <img src="images/turlon.jpg" alt="foto Federica Turlon">
        </div>
    </section>

    <!-- UP BUTTON -->
    <button type="button" class="btn rounded-circle shadow btn-lg" id="upBtn" onclick="backToTop()"><i class="fas fa-chevron-up"></i></button>

    <!-- FOOTER -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    <script src="js/active.js"></script>
    <script src="js/scrollToTop.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>