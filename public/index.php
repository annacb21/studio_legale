<?php require_once("../resources/config.php"); ?>
<!-- HEADER AND NAVBAR -->
<?php include(TEMPLATE_FRONT . DS . "intro.php"); ?>

    <!-- CAROUSEL -->
    <div id="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <img src="images/slide_padova.jpg">
            <div class="slide_text">Sede di Padova</div>
        </div>

        <div class="mySlides fade">
            <img src="images/slide_roma.jpg">
            <div class="slide_text">Sede di Roma</div>
        </div>

        <!-- Next and previous buttons -->
        <a id="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a id="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- CENTRAL 4-GRID CONTENT -->
    <div id="main-grid-container">
        <!-- Info about the studio -->
        <div id="studio-container">
            <h1 class="main-conatiner-title">Lo studio legale</h1>
            <p>Lo studio legale Turlon è diretto dall'Avvocato Federica Turlon, iscritta all'Albo degli Avvocati di Roma. Il legale svolge la propria attività negli studi di Roma e Padova. Vanta una specifica competenza in tema di tutela della persona, dei minori e della famiglia in tutte le sue articolazioni, con riferimento agli aspetti personali, relazionali, economici e successori. Lo studio inoltre ha maturato una solida esperienza nell'assistenza e nella consulenza di tutte le altre aree del diritto civile e del diritto penale, con particolare riferimento alla tutela del minore vittima e autore di reato e in generale all'assistenza legale degli autori e delle persone offese di maltrattamenti e abusi fisici, psicologici, sessuali ed economici.Una particolare attenzione è altresì dedicata ai soggetti vulnerabili, con disabilità e alla persona anziana, anche quali vittime di maltrattamenti e violenze domestiche. L’attività è volta ad individuare le migliori soluzioni in relazione al singolo caso concreto considerando tempi, costi e benefici di ogni singola proposta con particolare attenzione all’incidenza delle problematiche e della possibile soluzione sugli aspetti personali, familiari e patrimoniali del cliente.</p>
            <a href="#" class="info-link">Approfondisci<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <!-- info about the founder of the studio -->
        <div id="founder-container">
            <h1 class="main-conatiner-title">Federica Turlon</h1>
            <img src="images/turlon1.jpg" alt="Foto avv. Federica Turlon">
            <p>L'Avv. Federica Turlon si è laureata con lode in Giurisprudenza presso l'Università degli Studi di Padova. Ha conseguito il titolo di dottore di ricerca in ''Studi Giuridici Comparati ed Europei” presso l’Università degli Studi di Trento. Attualmente è professore a contratto di 'diritto penale' e di 'diritto pubblico del welfare' presso l'Università degli Studi di Padova. E' autrice di diverse pubblicazioni in ambito giuridico penale, minorile e familiare.</p>
            <a href="#" class="info-link">Approfondisci<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <!-- list of areas of activity -->
        <div id="activities-container">
            <h1 class="main-conatiner-title">Le aree di competenza</h1>
            <ul>
                <li><a href="#">Diritti della persona, tutela, amministrazione di sostegno e trust</a></li>
                <li><a href="#">Affidamento figli e protezione dei minori a rischio</a></li>
                <li><a href="#">Separazioni, divorzi, scioglimento unioni tra persone dello stesso sesso e convivenze</a></li>
                <li><a href="#">Successioni ed eredità</a></li>
                <li><a href="#">Adozioni e procreazione medicalmente assistita</a></li>
                <li><a href="#">Incidenti e omicidi stradali</a></li>
                <li><a href="#">Diritto penale della persona, dei minori e della famiglia</a></li>
                <li><a href="#">Violenza alle donne, stalking, strumenti di tutela e ordini di protezione a favore del soggetto vulnerabile</a></li>
                <li><a href="#">Locazioni, recupero crediti, vendita di beni dei debitori e piani di rientro</a></li>
                <li><a href="#">Diritto della navigazione</a></li>
            </ul>
        </div>
        <!-- list of the latest articles and publications -->
        <div id="articles-container">
            <h1 class="main-conatiner-title">Ultime pubblicazioni</h1>
            <ul>
                <li><a href="#">Pubblicazione 1</a></li>
                <li><a href="#">Pubblicazione 2</a></li>
                <li><a href="#">Pubblicazione 3</a></li>
                <li><a href="#">Pubblicazione 4</a></li>
            </ul>
        </div>
    </div>

    <script src="carousel.js"></script>

<!-- FOOTER -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
