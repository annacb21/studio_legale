<?php require_once("resources/config.php"); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Contatti | Studio Legale Turlon</title>
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

    <!-- CONTATTI -->
    <div>
        <h1>Contatti</h1>
        <div class="row">
            <div class="col-lg-4">
                <h2>Sedi</h2>
<!-- studi via PHP -->
<?php
foreach($studi as $s) {
$sede = <<<DELIMETER
<div>
    <p>{$s->get_adress()}</p>
    <p>{$s->get_cap()}</p>
</div>
DELIMETER;
echo $sede;
}
?>
<!-- --->
            </div>
            <div class="col-lg-4">
                <h2>Telefono</h2>
<!-- telefoni via PHP -->
<?php
foreach($studi as $s) {
echo "<p>{$s->get_phone()} {$s->get_city()}</p>";
}
?>
<!-- --->
            </div>
            <div class="col-lg-4">
                <h2>Email</h2>
                <p>federica.turlon@studiolegaleturlon.it</p>
                <p>federica.turlon@servicepec.it</p>
            </div>
        </div>
        <div id="segreteria">
            <h2>Contatta la segreteria</h2>
            <?php display_message(); ?>
            <form action="" method="POST" class="row g-3 needs-validation" novalidate>
                <?php send_email(); ?>
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
                    <textarea class="form-control" id="messaggio" name="messaggio" rows="5" placeholder="Scrivi qui il tuo messaggio" required></textarea>
                    <div class="invalid-feedback">Inserire un messaggio</div>
                </div>
                <div class="col-lg-12 form-check">
                    <input class="form-check-input" type="checkbox" value="" id="checkPrivacy" name="checkPrivacy" required>
                    <label class="form-check-label" for="checkPrivacy">Dichiaro di aver letto la Privacy Policy dello Studio Legale Bongiorno e di acconsentire, ai soli fini del servizio richiesto, al trattamento dei miei dati personali.</label>
                    <div class="invalid-feedback">Devi accettare le condizioni di privacy per poter procedere con il pagamento</div>
                </div>
                <button type="submit" name="sendEmail" class="btn btn-primary">Invia</button>
            </form>
        </div>
        <div id="lavora">
            <h2>Lavora con noi</h2>
            <?php display_message(); ?>
            <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                <?php send_cv(); ?>
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
                    <label for="cv" class="form-label">Curriculum Vitae</label>
                    <input class="form-control" type="file" id="cv" name="cv" required>
                    <div class="invalid-feedback">Caricare il proprio Curriculum</div>
                </div>
                <div class="col-lg-12 form-check">
                    <input class="form-check-input" type="checkbox" value="" id="checkPrivacy" name="checkPrivacy" required>
                    <label class="form-check-label" for="checkPrivacy">Dichiaro di aver letto la Privacy Policy dello Studio Legale Bongiorno e di acconsentire, ai soli fini del servizio richiesto, al trattamento dei miei dati personali.</label>
                    <div class="invalid-feedback">Devi accettare le condizioni di privacy per poter procedere con il pagamento</div>
                </div>
                <button type="submit" name="sendCv" class="btn btn-primary">Invia Candidatura</button>
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