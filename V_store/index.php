<?php

use views\App;

require_once "app/App.php";
require_once "app/controllers/BaseController.php";
require_once "app/config/Database.php";
$app = new App($conn);
?>