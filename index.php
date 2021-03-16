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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.svg" alt="logo studio legale">
            </a>
            <a class="visually-hidden-focusable" href="#studio">Vai al contenuto principale</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks" aria-controls="navbarLinks" aria-expanded="false" aria-label="Riduci navigazione">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarLinks">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="studioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Lo Studio</a>
                        <ul class="dropdown-menu" aria-labelledby="studioDropdown">
                            <li><a class="dropdown-item" href="#">Sede di Padova</a></li>
                            <li><a class="dropdown-item" href="#">Sede di Roma</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Le Aree di Attività</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">I professionisti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pubblicazioni ed eventi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Consulenza Online</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contatti</a>
                    </li>
                    <?php
                        if(isset($_SESSION['user'])) {
                            echo "<li class='nav-item'><a href='#' class='nav-link'>Admin</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

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
            <li class="list-group-item">
                <a href="#" class="list-group-item-action">Diritti della persona, tutela, amministrazione di sostegno e trust</a>
                <i class="fas fa-caret-right"></i>
            </li>
            <li class="list-group-item">
                <a href="#" class="list-group-item-action">Affidamento figli e protezione dei minori a rischio</a>
                <i class="fas fa-caret-right"></i>
            </li>
            <li class="list-group-item">
                <a href="#" class="list-group-item-action">Separazioni, divorzi, scioglimento unioni tra persone dello stesso sesso e convivenze</a>
                <i class="fas fa-caret-right"></i>
            </li>
            <li class="list-group-item">
                <a href="#" class="list-group-item-action">Successioni ed eredità</a>
                <i class="fas fa-caret-right"></i>
            </li>
            <li class="list-group-item">
                <a href="#" class="list-group-item-action">Adozioni e procreazione medicalmente assistita</a>
                <i class="fas fa-caret-right"></i>
            </li>
            <li class="list-group-item">
                <a href="#" class="list-group-item-action">Incidenti e omicidi stradali</a>
                <i class="fas fa-caret-right"></i>
            </li>
            <li class="list-group-item">
                <a href="#" class="list-group-item-action">Diritto penale della persona, dei minori e della famiglia</a>
                <i class="fas fa-caret-right"></i>
            </li>
            <li class="list-group-item">
                <a href="#" class="list-group-item-action">Violenza alle donne, stalking, strumenti di tutela e ordini di protezione a favore del soggetto vulnerabile</a>
                <i class="fas fa-caret-right"></i>
            </li>
            <li class="list-group-item">
                <a href="#" class="list-group-item-action">Locazioni, recupero crediti, vendita di beni dei debitori e piani di rientro</a>
                <i class="fas fa-caret-right"></i>
            </li>
            <li class="list-group-item">
                <a href="#" class="list-group-item-action">Diritto della navigazione</a>
                <i class="fas fa-caret-right"></i>
            </li>
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

    <!-- FOOTER -->
    <footer class="bg-dark text-white">
        <div class="row">
            <div class="col-lg-4">
                <div>
                    <img src="images/logo_light.svg" alt="logo bianco">
                    <h4 class="d-inline">Studio Legale Turlon</h4>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lo Studio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Le Aree di Attività</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">I Professionisti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pubblicazioni ed eventi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Consulenza Online</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contatti</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h4>Le nostre sedi</h4>
                <div>
                    <a href="#"><h5>Sede di Padova</h5></a>
                    <p>via Emanuele Filiberto 43</p>
                    <p>+39 049 654313</p>
                </div>
                <div>
                    <a href="#"><h5>Sede di Roma</h5></a>
                    <p>via Alessandria 88</p>
                    <p>+39 0644 4254637</p>
                </div>
            </div>
            <div class="col-lg-4">
                <h5>Contatti</h5>
                <p>federica.turlon@studiolegaleturlon.it</p>
                <p>federica.turlon@servicepec.it</p>
            </div>
        </div>
        <p>P.IVA 09304481006 <span>Privacy Policy</span> <span>Cookie Policy</span></p>
    </footer>

    <script src="js/active.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>