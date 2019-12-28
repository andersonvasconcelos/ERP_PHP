<?php 
session_start();
require_once __DIR__ . ('/vendor/autoload.php');
require_once 'config/db_Config.php';

$c = new \Core\Core();
$c->run();