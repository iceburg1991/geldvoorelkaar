<?php
require_once './install/init_twig.php';

//Check if required dependencies are installed. To verify, the folder vendor is searched.
$filename = 'vendor';
if (!file_exists($filename)) {
    echo $twig->render('./app/template/home.twig',array());
} else {
   // echo "The file $filename does not exist";
    include_once 'install/install.php';


}


?>