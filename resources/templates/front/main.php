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

<!-- CENTRAL 4-GRID CONTENT -->
<div id="main-grid-container">
    <!-- Info about the studio -->
    <div class="grid-item">
        <div class="grid-title">
            <h1>Lo studio legale</h1>
        </div>
        <div class="grid-body">
            <p>Lo studio legale Turlon è diretto dall'Avvocato Federica Turlon, iscritta all'Albo degli Avvocati di Roma. Il legale svolge la propria attività negli studi di Roma e Padova. Vanta una specifica competenza in tema di tutela della persona, dei minori e della famiglia in tutte le sue articolazioni, con riferimento agli aspetti personali, relazionali, economici e successori. Lo studio inoltre ha maturato una solida esperienza nell'assistenza e nella consulenza di tutte le altre aree del diritto civile e del diritto penale, con particolare riferimento alla tutela del minore vittima e autore di reato e in generale all'assistenza legale degli autori e delle persone offese di maltrattamenti e abusi fisici, psicologici, sessuali ed economici.Una particolare attenzione è altresì dedicata ai soggetti vulnerabili, con disabilità e alla persona anziana, anche quali vittime di maltrattamenti e violenze domestiche. L’attività è volta ad individuare le migliori soluzioni in relazione al singolo caso concreto considerando tempi, costi e benefici di ogni singola proposta con particolare attenzione all’incidenza delle problematiche e della possibile soluzione sugli aspetti personali, familiari e patrimoniali del cliente.</p>
        </div>
        <div class="grid-footer">
            <a href="../public/index.php?sedi&id=1">Approfondisci<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- info about the founder of the studio -->
    <div class="grid-item">
        <div class="grid-title">
            <h1>Federica Turlon</h1>
        </div>
        <div class="grid-body">
            <img src="images/turlon1.jpg" alt="Foto avv. Federica Turlon">
            <p>L'Avv. Federica Turlon si è laureata con lode in Giurisprudenza presso l'Università degli Studi di Padova. Ha conseguito il titolo di dottore di ricerca in ''Studi Giuridici Comparati ed Europei” presso l’Università degli Studi di Trento. Attualmente è professore a contratto di 'diritto penale' e di 'diritto pubblico del welfare' presso l'Università degli Studi di Padova. E' autrice di diverse pubblicazioni in ambito giuridico penale, minorile e familiare.</p>
        </div>
        <div class="grid-footer">
            <a href="#">Approfondisci<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- list of areas of activity -->
    <div class="grid-item">
        <div class="grid-title">
            <h1>Le aree di competenza</h1>
        </div>
        <div class="grid-body">
            <ul>
                <?php get_activities_list(); ?>
            </ul>
        </div>
        <div class="grid-footer">
            <a href="#">Approfondisci<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- list of the latest articles and publications -->
    <div class="grid-item">
        <div class="grid-title">
            <h1>Ultime pubblicazioni</h1>
        </div>
        <div class="grid-body">
            <ul>
                <li><a href="#">Pubblicazione 1</a></li>
                <li><a href="#">Pubblicazione 2</a></li>
                <li><a href="#">Pubblicazione 3</a></li>
                <li><a href="#">Pubblicazione 4</a></li>
            </ul>
        </div>
        <div class="grid-footer">
            <a href="#">Approfondisci<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<script src="javascript/carousel.js"></script>