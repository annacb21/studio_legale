<div id="navbar">

  <a href="../public/index.php" id="logo"><img src="../public/images/logo.png" alt="logo studio legale Turlon"></a>
  <div id="navbar-items">
    <a class="active" href="../public/index.php">Home</a>
    <div id="dropdown">
      <button>Sedi <i class="fa fa-caret-down"></i></button>
      <div id="dropdown-content">
        <?php 
          for($i = 0; $i < count($sedi); $i++) {
            echo "<a href='../public/index.php?sedi&id={$sedi[$i]->get_id()}'>{$sedi[$i]->get_city()}</a>";
          }
         ?>
      </div>
    </div>
    <a href="../public/index.php?activities">Aree di attività</a>
    <a href="../public/index.php?team">Team</a>
    <a href="../public/index.php?pub">Pubblicazioni ed eventi</a>
    <a href="../public/index.php?contacts">Contatti</a>
  </div>

</div>

<script src="../public/javascript/navbar.js"></script>