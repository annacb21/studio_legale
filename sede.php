<?php 
require_once("resources/config.php"); 

// controllo id sede studio
if(isset($_GET['id'])) {
    if($_GET['id'] == "1") {
        $sede = $padova;
        $title = "Padova";
    } 
    else {
        $title = "Roma";
        $sede = $roma;
    }
    $foto = $sede->get_foto();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sede di <?php echo $title ?> | Studio Legale Turlon</title>
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

    <!-- LA SEDE -->
    <div>
        <h1>Sede di <?php echo $sede->get_city(); ?></h1>
        <div class="row">
            <div class="col-lg-6">
                <div>
                    <p>Indirizzo</p>
                    <p><?php echo $sede->get_adress(); ?></p>
                    <p><?php echo $sede->get_cap(); ?></p>
                </div>
                <div>
                    <p>Contatti</p>
                    <p>Tel e fax <?php echo $sede->get_phone(); ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <iframe src='<?php echo $sede->get_map(); ?>' width='800' height='300' style='border:0;' allowfullscreen='' loading='lazy'></iframe>
            </div>
        </div>
    </div>

    <!-- GALLERY FOTO -->
    <div class="row">
<?php
for($i=0; $i<count($foto); $i++) {
$img = display_file($foto[$i]);
$f = <<<DELIMETER

<div class="col-lg-3">
    <img src="{$img}" alt="foto numero {$i}" class="w-100">
</div>

DELIMETER;
echo $f;
}
?>
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