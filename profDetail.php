<?php
require_once("resources/config.php"); 
if(isset($_GET['id'])) {
    $prof = $profs[$_GET['id']-1];
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title><?php echo $prof->get_name(); ?> | Studio Legale Turlon</title>
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

    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="professionisti.php">I Professionisti</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $prof->get_name(); ?></li>
        </ol>
    </nav>

    <!-- PROFESSIONISTA -->
    <div>
        <h1><?php echo $prof->get_name(); ?></h1>
        <div class="row">
            <div class="col-lg-4">
                <img src="<?php echo display_file($prof->get_foto()); ?>" alt="Foto <?php echo $prof->get_name(); ?>">
            </div>
            <div class="col-lg-6">
                <p><?php echo $prof->get_role(); ?></p>
                <p><?php echo $prof->get_desc(); ?></p>
                <button type="button" class="btn btn-primary">Curriculum Vitae [PDF]</button>
            </div>
        </div>
        <div>
            <h2>Aree di Attività Specifiche:</h2>
            <ul class="list-group list-group-flush">
<!-- aree via PHP -->
<?php
$aree = $prof->get_aree();
foreach($aree as $a) {
$area = <<<DELIMETER

<li class="list-group-item">{$a->get_name()}</li>

DELIMETER;
echo $area;
}
?>
<!-- -->
            </ul>
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
</body>
</html>