<?php 
require_once("resources/config.php"); 

$cat_query = query("SELECT * FROM categorie");
confirm($cat_query);

$page = get_page();
$pagination_start = ($page - 1) * 4;

$curr_posts = show_post($pagination_start);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Lo Studio | Studio Legale Turlon</title>
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

    <div class="row">
        <h1><?php echo get_page_title(); ?></h1>
        <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status" id="loader">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <!-- POST -->
        <div class="col-lg-7">
            <ul id="posts">
<!-- post via PHP -->
<?php 
foreach($curr_posts as $post) {
$p = <<<DELIMETER
<li class="{$post->get_cat()}">
    <p>{$post->get_title()}</p>
    <p>{$post->get_data()} / in {$post->get_cat_name()}</p>
    <p>{$post->get_text_ant()}</p>
    <a href="#">Leggi di più ...</a>
</li>
DELIMETER;
echo $p;
}
?>
<!-- -->
            </ul>
            <!-- pagination -->
            <?php show_pagination($page); ?>
        </div>
        <!-- FILTERS -->
        <div class="col-lg-5">
            <div>
                <h2>POST RECENTI</h2>
                <ul>
<!-- recent post via PHP -->
<?php 
foreach($recent_post as $r) {
$rec = <<<DELIMETER
<li>
    <a href="">{$r->get_title()}</a>
</li>
DELIMETER;
echo $rec;
}
?>
<!-- -->   
                </ul> 
            </div>
            <div>
                <h2>CATEGORIE</h2>
                <form action="" method="POST" class="needs-validation" novalidate>
<!-- categories via PHP -->
<?php 
while($row = fetch_array($cat_query)) {
$cat = <<<DELIMETER
<div class="form-check">
    <input class="form-check-input" type="radio" name="cat" value="{$row['id']}" id="{$row['id']}" aria-label="{$row['nome']}" required>
    <label class="form-check-label" for="{$row['id']}">{$row['nome']}</label>
</div>
DELIMETER;
echo $cat;
}
?>
<!-- --> 
                    <button name="selectCat" type="submit" class="btn btn-primary mr-3">Filtra</button> 
                </form>
            </div>
            <div>
                <h2>CERCA POST</h2>
                <form action="" method="POST" class="needs-validation d-flex" novalidate>
                    <input class="form-control me-2" type="text" placeholder="Cerca..." aria-label="Cerca" name="cerca">
                    <button class="btn btn-outline-primary" type="submit" name="search">Cerca</button>
                </form>
            </div>        
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