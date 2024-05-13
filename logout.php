<?php
require 'includes/app.php';

session_start();

$_SESSION = [];

header('Location: '.CARPETA_ROOT.'/index.php');