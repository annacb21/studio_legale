<?php

require_once("classes/database.php");
require_once("classes/studio.php");
require_once("classes/area.php");
require_once("classes/prof.php");
require_once("classes/post.php");

ob_start();

session_start();

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);


defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");

defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

defined("IMAGES") ? null : define("IMAGES", __DIR__ . DS . "../images");


defined("DB_HOST") ? null : define("DB_HOST", "localhost");

defined("DB_USER") ? null : define("DB_USER", "root");

defined("DB_PASS") ? null : define("DB_PASS", "");

defined("DB_NAME") ? null : define("DB_NAME", "studio_legale_db");

require_once("functions.php");

 ?>