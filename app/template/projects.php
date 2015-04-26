<?php

include '../../install/Twig.php';
include '../../database/Database.php';

$twig = new Twig();
$twig = $twig->getTwig(true);

$db = new Database();
$projects = $db->query("SELECT * FROM project");

// $project = new Project();
// $project->getCollection();
setlocale(LC_ALL, 'nld_nld');
echo strftime("%d %b, %Y", mktime(0, 0, 0, 03, 22, 2015));
echo $twig->render('projects.twig',array('projects' => $projects));
?>