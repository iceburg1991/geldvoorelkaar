<?php

include '../../install/Twig.php';
$twig = new Twig();
$twig = $twig->getTwig(true);

echo $twig->render('project.twig',array());

?>