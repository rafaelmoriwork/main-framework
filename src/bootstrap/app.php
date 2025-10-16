<?php
// Carrega o autoload do Composer
require __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Sao_Paulo');

use App\Controllers\HomeController;
 
$home = new HomeController();
$home->index();