<?php
//Check if required dependencies are installed. To verify, the folder vendor is searched.


$filename = 'vendor';
if (file_exists($filename)) {
    include 'install/Twig.php';
    $twig = new Twig();
    $twig = $twig->getTwig(true);

    echo $twig->render('dashboard.twig',array());
} else {
    header("Location: install/install.php");
}
?>