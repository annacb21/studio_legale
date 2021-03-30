<?php 
require_once("resources/config.php"); 
$page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
$pagination_start = ($page - 1) * 4;
$prev = $page - 1;
$next = $page + 1;
$q = query("SELECT * FROM post LIMIT $pagination_start, 4");
confirm($q);
$curr_posts = array();
$i = 0;
while($row = fetch_array($q)) {
    $d = $row['post_data'];
    setlocale(LC_TIME, 'it_IT');
    $date = strftime("%d %B %Y", strtotime($d));
    $curr_posts[$i] = new Post($row['id'], $row['titolo'], $date, $row['cat_id'], $row['testo']);
    $i++;
}
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
        <!-- POST -->
        <div class="col-lg-7">
            <ul>
<!-- post via PHP -->
<?php 
foreach($curr_posts as $post) {
$p = <<<DELIMETER
<li>
    <p>{$post->get_title()}</p>
    <p>{$post->get_data()} / in <a href="#">{$post->get_cat_name()}</a></p>
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
            <nav aria-label="Navigazione pagine">
                <ul class="pagination">
                    <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>" aria-label="Indietro">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for($i = 1; $i <= $tot_pages; $i++ ): ?>
                    <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                        <a class="page-link" href="pubblicazioni.php?page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($page >= $tot_pages) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($page >= $tot_pages){ echo '#'; } else {echo "?page=". $next; } ?>" aria-label="Avanti">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- FILTERS -->
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