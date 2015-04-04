<?php
require_once dirname(__DIR__) . '/vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(dirname(__DIR__));
$twig = new Twig_Environment($loader, array(
'cache' => dirname(__DIR__) . '/cache',
));
?>