<?php require_once("../resources/config.php"); ?>
<!-- HEADER AND NAVBAR -->
<?php include(TEMPLATE_FRONT . DS . "intro.php"); ?>

    <!-- CAROUSEL -->
    <div id="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="slide_number">1 / 2</div>
            <img src="images/slide_padova.jpg">
            <div class="slide_text">Sede di Padova</div>
        </div>

        <div class="mySlides fade">
            <div class="slide_number">2 / 2</div>
            <img src="images/slide_roma.jpg">
            <div class="slide_text">Sede di Roma</div>
        </div>

        <!-- Next and previous buttons -->
        <a id="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a id="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div id="dot-container">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
    </div>

    <!-- DESCRIPTION -->
    <div id="desc-container">
        <h1>Lo studio legale</h1>
        <p>Lo studio legale Turlon è diretto dall'Avvocato Federica Turlon, iscritta all'Albo degli Avvocati di Roma. Il legale svolge la propria attività negli studi di Roma e Padova. Vanta una specifica competenza in tema di tutela della persona, dei minori e della famiglia in tutte le sue articolazioni, con riferimento agli aspetti personali, relazionali, economici e successori. Lo studio inoltre ha maturato una solida esperienza nell'assistenza e nella consulenza di tutte le altre aree del diritto civile e del diritto penale, con particolare riferimento alla tutela del minore vittima e autore di reato e in generale all'assistenza legale degli autori e delle persone offese di maltrattamenti e abusi fisici, psicologici, sessuali ed economici.Una particolare attenzione è altresì dedicata ai soggetti vulnerabili, con disabilità e alla persona anziana, anche quali vittime di maltrattamenti e violenze domestiche. L’attività è volta ad individuare le migliori soluzioni in relazione al singolo caso concreto considerando tempi, costi e benefici di ogni singola proposta con particolare attenzione all’incidenza delle problematiche e della possibile soluzione sugli aspetti personali, familiari e patrimoniali del cliente.</p>
    </div>

    <script src="carousel.js"></script>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
