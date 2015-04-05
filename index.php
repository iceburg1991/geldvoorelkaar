<?php
//Check if required dependencies are installed. To verify, the folder vendor is searched.
$filename = 'vendor';
if (file_exists($filename)) {
    require_once './install/init_twig.php';
    echo $twig->render('./app/template/home.twig',array());
} else {
    header("Location: install/install.php");
}
?>