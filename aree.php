<?php require_once("resources/config.php"); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Aree di Attività | Studio Legale Turlon</title>
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

    <!-- AREE -->
    <div>
        <h1>Le Aree di Attività</h1>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi lacus sed viverra tellus in hac habitasse platea dictumst. Arcu risus quis varius quam quisque. Nunc vel risus commodo viverra maecenas accumsan lacus. Congue quisque egestas diam in arcu cursus euismod. Ut faucibus pulvinar elementum integer enim. Volutpat blandit aliquam etiam erat. Eu non diam phasellus vestibulum lorem sed risus. Sed blandit libero volutpat sed cras ornare arcu dui vivamus. Non curabitur gravida arcu ac tortor dignissim convallis. Imperdiet proin fermentum leo vel. Cras pulvinar mattis nunc sed blandit libero. Diam in arcu cursus euismod. Eu sem integer vitae justo eget magna fermentum iaculis eu. Malesuada proin libero nunc consequat interdum. Dui vivamus arcu felis bibendum ut. Non quam lacus suspendisse faucibus interdum posuere lorem. 
        </p>
        <div class="row">
<!-- aree via php -->
<?php
foreach($aree as $a) {
$area = <<<DELIMETER

<div class="col-lg-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{$a->get_name()}</h5>
            <p class="card-text">{$a->get_desc()}</p>
            <a href="areaDetail.php?id={$a->get_id()}" class="btn btn-primary">Approfondisci</a>
        </div>
    </div>
</div>

DELIMETER;
echo $area;
}
?>
<!-- -->
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