<?php
require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./view');
$twig = new \Twig\Environment($loader);

//pour faire fonctionner twig
