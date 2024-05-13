<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';

//conectarnos a DB
$db = conectarDB();

use App\Infante;
use App\Usuario;

Infante::setDB($db);
Usuario::setDB($db);

