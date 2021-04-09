<?php require_once("resources/config.php"); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Consulenza online | Studio Legale Turlon</title>
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
        <h1>Consulenza Online</h1>
        <div>
            <h2>Quando è utile richiederla …</h2>
            <ul>
                <li>Si può richiedere una consulenza legale online per avere in tempi brevi un parere legale scritto su questioni di diritto di famiglia, quali ad esempio separazioni, divorzi, affidamento, tutela dei minori, riconoscimento della paternità, questioni ereditarie etc.</li>
                <li>Parimenti forniamo assistenza legale online per problematiche connesse al condominio, rapporti di vicinato, contratti (ad es. un contratto di affitto o un preliminare di compravendita), o in materia di responsabilità civile come ad esempio il risarcimento danni e l’infortunistica stradale.</li>
                <li>Condizioni del servizio Il parere legale è sempre motivato con precisi richiami ad articoli di legge ed alla giurisprudenza di merito (giudice di pace, tribunale, corte d’appello) e di legittimità (corte di cassazione).</li>
                <li>La consulenza legale può consistere anche nella redazione di lettere, diffide, solleciti di pagamento che spesso consentono di evitare cause lunghe ed onerose per il Cliente</li>
                <li>A volte una ‘semplice’ lettera di intervento inviata ad una assicurazione oppure un sollecito di pagamento a un debitore risolvono situazioni che potrebbero complicarsi col passare del tempo.</li>
                <li>Ugualmente un parere legale può aiutare il Cliente a decidere la strategia migliore o a valutare l’opportunità e la convenienza ad iniziare una controversia davanti al Giudice.</li>
                <li>Infine la consulenza si può concretizzare anche nella stesura di accordi tra le parti (es: la separazione consensuale), atti giudiziari o documenti in genere che richiedono cognizioni tecnico-giuridiche specifiche.</li>
            </ul>
        </div>
        <div>
            <h2>Come richiedere la consulenza :</h2>
            <ol>
                <li>Compila il modulo sottostante per richiedere una consulenza online</li>
                <li>Procedi con il pagamento della consulenza, che ha un costo di 50 €</li>
                <li>Avvenuto il pagamento riceverai dopo pochi giorni la consulenza che hai richiesto</li>
            </ol>
            <form action="" method="POST" class="row g-3 needs-validation" novalidate>
                <?php checkout(); ?>
                <div class="col-lg-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                    <div class="invalid-feedback">Inserire il proprio nome</div>
                </div>
                <div class="col-lg-6">
                    <label for="cognome" class="form-label">Cognome</label>
                    <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome" required>
                    <div class="invalid-feedback">Inserire il proprio cognome</div>
                </div>
                <div class="col-lg-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <div class="invalid-feedback">Inserire una email valida</div>
                </div>
                <div class="col-lg-6">
                    <label for="telefono" class="form-label">Telefono</label>
                    <small class="form-text text-muted px-1 py-1">(Opzionale)</small>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                </div>
                <div class="col-lg-12">
                    <label for="messaggio" class="form-label">Messaggio</label>
                    <textarea class="form-control" id="messaggio" name="messaggio" rows="10" placeholder="Scrivi qui il tuo messaggio" required></textarea>
                    <div class="invalid-feedback">Inserire un messaggio</div>
                </div>
                <div class="col-lg-12 form-check">
                    <input class="form-check-input" type="checkbox" value="" id="checkPrivacy" name="checkPrivacy" required>
                    <label class="form-check-label" for="checkPrivacy">Dichiaro di aver letto la Privacy Policy dello Studio Legale Bongiorno e di acconsentire, ai soli fini del servizio richiesto, al trattamento dei miei dati personali.</label>
                    <div class="invalid-feedback">Devi accettare le condizioni di privacy per poter procedere con il pagamento</div>
                </div>
                <button type="submit" name="pay" class="btn btn-primary">Procedi al pagamento</button>
            </form>
        </div>
    </div>

    <!-- UP BUTTON -->
    <button type="button" class="btn rounded-circle shadow btn-lg" id="upBtn" onclick="backToTop()"><i class="fas fa-chevron-up"></i></button>

    <!-- FOOTER -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="js/scrollToTop.js"></script>
    <script src="js/validate.js"></script>
</body>
</html>