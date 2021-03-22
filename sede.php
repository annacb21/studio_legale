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
    <div class="row" id="gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
<!-- foto via php -->
<?php
for($i=0; $i<count($foto); $i++) {
$img = display_file($foto[$i]);
$f = <<<DELIMETER

<div class="col-lg-3">
    <img src="{$img}" alt="foto numero {$i}" class="w-100" data-bs-target="#galleryCarousel" data-bs-slide-to="{$i}">
</div>

DELIMETER;
echo $f;
}
?>
<!-- -->
    </div>
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Foto numero 0"></button>
<!-- carousel indicators via php -->
<?php
for($i=1; $i<count($foto); $i++) {
$ind = <<<DELIMETER

<button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="{$i}" aria-label="Foto numero {$i}"></button>

DELIMETER;
echo $ind;
}
?>
<!-- -->
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo display_file($foto[0]); ?>" class="d-block w-100" alt="foto numero 0">
                            </div>
<!-- foto carousel via php -->
<?php
for($i=1; $i<count($foto); $i++) {
$img = display_file($foto[$i]);
$f = <<<DELIMETER

<div class="carousel-item">
    <img src="{$img}" class="d-block w-100" alt="foto numero {$i}">
</div>

DELIMETER;
echo $f;
}
?>
<!-- -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel"  data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel"  data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
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