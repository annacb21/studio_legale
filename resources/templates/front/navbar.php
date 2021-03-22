<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.svg" alt="logo studio legale">
        </a>
        <a class="visually-hidden-focusable" href="#studio">Vai al contenuto principale</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks" aria-expanded="false" aria-label="Riduci navigazione">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarLinks">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="studioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Lo Studio</a>
                    <ul class="dropdown-menu" aria-labelledby="studioDropdown">
<!-- dropdown studio list via PHP -->
<?php 
foreach($studi as $s) {
$link = <<<DELIMETER
<li><a class="dropdown-item" href="sede.php?id={$s->get_id()}">Sede di {$s->get_city()}</a></li>
DELIMETER;
echo $link;
}
?>
<!-- -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aree.php">Le Aree di Attività</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">I professionisti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pubblicazioni ed eventi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Consulenza Online</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contatti</a>
                </li>
                <?php
                    if(isset($_SESSION['user'])) {
                        echo "<li class='nav-item'><a href='#' class='nav-link'>Admin</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>